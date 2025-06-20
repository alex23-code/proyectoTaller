<head>
  <meta charset="UTF-8">
  <title>Formulario - Datos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
</head>




<body class="bg-light py-4">
  <div class="container">
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
  </select>
</div>

<div id="tarjeta-info" style="display: none;">
  <div class="form-group">
    <label for="numero_tarjeta">Número de Tarjeta</label>
    <input type="text" class="form-control" name="numero_tarjeta" id="numero_tarjeta" placeholder="XXXX-XXXX-XXXX-XXXX" pattern="\d{16}" maxlength="16">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="vencimiento">Fecha de Vencimiento</label>
      <input type="month" class="form-control" name="vencimiento" id="vencimiento">
    </div>
    <div class="form-group col-md-6">
      <label for="cvv">CVV</label>
      <input type="text" class="form-control" name="cvv" id="cvv" maxlength="4" pattern="\d{3,4}">
    </div>
  </div>
</div>





          <div class="text-right">
            <button type="submit" class="btn btn-primary">Continuar con la compra</button>
          </div>
        </form>
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
