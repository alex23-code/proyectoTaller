<!DOCTYPE html>
<html>
    <head>
        <title>Carrito de compras</title>
        <link href="<?= base_url('assets/css/miEstiloCarrito.css') ?>" rel="stylesheet">
    </head>

    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
        <div class="alert alert-danger">
            Ocurrió un problema con el pago. Por favor, intentá nuevamente.
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php endif; ?>

    <body class="container-fluid">
        <main>
            <h2 style="text-align:center">🛒 Tu carrito</h2>
            <?php if (empty($carrito)): ?>
                <div class="alert alert-info">Tu carrito está vacío.</div>
                <a href="<?= base_url('ver_catalogo') ?>" class="btn btn-success">Ver Catalogo</a>
            <?php else: ?>
               <?php foreach ($carrito as $clave => $producto): ?>
                <div class="card mb-3 p-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img src="<?= base_url('assets/uploads/' . esc($producto['imagen'] ?? 'sin-imagen.png')) ?>" width="60" alt="Imagen">
                        </div>
                        <div class="col">
                            <strong><?= esc($producto['nombre'] ?? 'Producto sin nombre') ?></strong><br>
                            <span>$<?= esc($producto['precio'] ?? 0) ?></span><br>
                            <small class="text-muted">Talle: <?= esc($producto['talleDescripcion'] ?? '—') ?></small><br>
                            <small class="text-muted">Cantidad: <?= esc($producto['cantidad'] ?? 1) ?></small>
                        </div>
                        <div class="col-auto">
                            <form method="post" action="<?= base_url('eliminar') ?>">
                                <?= csrf_field() ?>
                                <input type="hidden" name="clave" value="<?= esc($clave) ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <a href="<?= base_url('datos_cliente') ?>" class="btn btn-success">Ordenar compra</a>
            <?php endif; ?>
        </main>
    </body>
</html>