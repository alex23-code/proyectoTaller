<head>
  <meta charset="UTF-8">
  <title>Formulario - Datos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/miEstiloCompra.css">
</head>

<body class="bg-light py-4">
  <div class="container-fluid">
    <div class="row">
      <!-- Columna izquierda: formulario -->
      <div class="col-lg-7 mb-4">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Datos Personales</h2>
          </div>
          <div class="card-body">
          <form action="<?= base_url('procesar_datos') ?>" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="nombre">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo"
                  required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,50}" title="Solo letras y al menos 2 caracteres">
              </div>
              <div class="form-group col-md-6">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido"
                  required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,50}" title="Solo letras y al menos 2 caracteres">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Correo Electrónico</label>
                <input type="email" class="form-control" id="inputEmail4" name="correo" placeholder="Correo electrónico"
                  required>
              </div>
              <div class="form-group col-md-6">
                <label for="passportNumber">Número de DNI</label>
                <input type="text" class="form-control" id="passportNumber" name="dni" placeholder="Ingrese su DNI"
                  maxlength="8" pattern="\d{8}" required title="Debe ser un número de 8 dígitos">
                <small class="form-text text-muted">Debe ser de 8 dígitos</small>
              </div>
            </div>

            <div class="form-group">
              <label for="inputAddress">Dirección</label>
              <input type="text" class="form-control" id="inputAddress" name="direccion"
                placeholder="Ej: Salta 442" required minlength="5" maxlength="100">
            </div>

            <div class="form-group">
              <label for="metodo_pago">Método de Pago</label>
              <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                <option value="">Selecciona una opción</option>
                <option value="tarjeta">Tarjeta de crédito</option>
                <option value="mercado_pago">Mercado Pago</option>
                <option value="efectivo">Efectivo</option>
              </select>
            </div>

            <div id="tarjeta-info" style="display: none;">
              <div class="form-group">
                <label for="nombre_tarjeta">Titular de la Tarjeta</label>
                <input type="text" class="form-control" name="nombre_tarjeta" id="nombre_tarjeta"
                      placeholder="Nombre como aparece en la tarjeta" required>
              </div>
              <div class="form-group">
                <label for="numero_tarjeta">Número de Tarjeta</label>
                <input type="text" class="form-control" name="numero_tarjeta" id="numero_tarjeta"
                      placeholder="XXXX-XXXX-XXXX-XXXX" pattern="\d{16}" maxlength="16" required>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="vencimiento">Fecha de Vencimiento</label>
                  <input type="date" class="form-control" name="vencimiento" id="vencimiento" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="cvv">CVV</label>
                  <input type="text" class="form-control" name="cvv" id="cvv" maxlength="4" pattern="\d{3,4}" required>
                </div>
              </div>
          </div>
          <script src="https://sdk.mercadopago.com/js/v2"></script>
                <div id="wallet_container"></div>

                <script src="https://sdk.mercadopago.com/js/v2"></script>
                <script>
                  const mp = new MercadoPago("<?= getenv('MP_PUBLIC_KEY') ?>", { locale: 'es-AR' });

                  const campos = ["nombre", "apellido", "inputEmail4", "passportNumber", "inputAddress", "metodo_pago"];
                  const botonContainer = document.getElementById('wallet_container');
                  let botonRenderizado = false;

                  function validarCampos() {
                    const completos = campos.every(id => {
                      const campo = document.getElementById(id);
                      return campo && campo.value.trim() !== "";
                    });

                    const metodo = document.getElementById("metodo_pago").value;
                    return completos && metodo === "mercado_pago";
                  }

                  function renderizarBoton() {
                    if (validarCampos() && !botonRenderizado) {
                      mp.checkout({
                        preference: {
                          id: "<?= $preference->id ?>"
                        },
                        render: {
                          container: '#wallet_container',
                          label: 'Pagar con Mercado Pago'
                        }
                      });
                      botonRenderizado = true;
                    }

                    if (!validarCampos() && botonRenderizado) {
                      botonContainer.innerHTML = "";
                      botonRenderizado = false;
                    }
                  }

                  // Escuchar cambios en los campos del formulario
                  campos.forEach(id => {
                    const campo = document.getElementById(id);
                    if (campo) {
                      campo.addEventListener('input', renderizarBoton);
                      campo.addEventListener('change', renderizarBoton);
                    }
                  });

                  // Validación inicial
                  document.addEventListener('DOMContentLoaded', renderizarBoton);
                </script>
        </div>
      </div>
    </div>
    <!-- Columna derecha -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow-sm">
          <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Resumen del Carrito</h5>
          </div>
          <div class="card-body">
            <?php $carrito = session()->get('carrito') ?? []; ?>
            <?php if (!empty($carrito)): ?>
              <ul class="list-group">
                <?php $total = 0; ?>
                <?php foreach ($carrito as $item): 
                  $subtotal = $item['precio'] * $item['cantidad'];
                  $total += $subtotal;
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <div>
                    <strong><?= esc($item['nombre']) ?></strong><br>
                    <small>Talle: <?= esc($item['talle']) ?> | Cant: <?= $item['cantidad'] ?></small>
                  </div>
                  <span>$<?= number_format($subtotal, 2, ',', '.') ?></span>
                </li>
                <?php endforeach; ?>
                <li class="list-group-item text-end">
                  <strong>Total: $<?= number_format($total, 2, ',', '.') ?></strong>
                </li>
              </ul>
             
             <button type="submit" class="btn btn-primary btn-lg w-100" id="btn_finalizar">Finalizar compra</button>

              </form>
            <?php else: ?>
              <div class="alert alert-warning mb-0">Tu carrito está vacío.</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


<script>
document.getElementById('metodo_pago').addEventListener('change', function () {
  const seleccion = this.value;
  const tarjetaInfo = document.getElementById('tarjeta-info');
  tarjetaInfo.style.display = (seleccion === 'tarjeta') ? 'block' : 'none';
});
</script>

<script>
  const metodoPagoSelect = document.getElementById("metodo_pago");
  const btnFinalizar = document.getElementById("btn_finalizar");

  function camposCompletos() {
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const email = document.getElementById("inputEmail4").value.trim();
    const dni = document.getElementById("passportNumber").value.trim();
    const direccion = document.getElementById("inputAddress").value.trim();
    const metodo = metodoPagoSelect.value;

    return nombre && apellido && email && dni && direccion && metodo;
  }

  function actualizarEstadoBotonFinalizar() {
    const metodo = metodoPagoSelect.value;

    // Si es mercado pago: se maneja con el wallet, no activamos el botón
    if (metodo === "mercado_pago") {
      btnFinalizar.disabled = true;
      return;
    }

    // Si es efectivo o tarjeta, habilitá solo si los campos están completos
    btnFinalizar.disabled = !camposCompletos();
  }

  // Eventos
  metodoPagoSelect.addEventListener("change", actualizarEstadoBotonFinalizar);
  document.addEventListener('DOMContentLoaded', actualizarEstadoBotonFinalizar);

  ["nombre", "apellido", "inputEmail4", "passportNumber", "inputAddress"].forEach(id => {
    const campo = document.getElementById(id);
    if (campo) {
      campo.addEventListener('input', actualizarEstadoBotonFinalizar);
    }
  });
</script>
<script>
  const metodoPago = document.getElementById("metodo_pago");
  const camposTarjeta = [
    "nombre_tarjeta",
    "numero_tarjeta",
    "vencimiento",
    "cvv"
  ];

  function toggleCamposTarjeta() {
    const metodo = metodoPago.value;

    const mostrarTarjeta = metodo === "tarjeta";
    document.getElementById("tarjeta-info").style.display = mostrarTarjeta ? "block" : "none";

    camposTarjeta.forEach(id => {
      const campo = document.getElementById(id);
      if (campo) {
        if (mostrarTarjeta) {
          campo.setAttribute("required", "required");
        } else {
          campo.removeAttribute("required");
        }
      }
    });
  }

  metodoPago.addEventListener("change", toggleCamposTarjeta);
  document.addEventListener("DOMContentLoaded", toggleCamposTarjeta);
</script>
