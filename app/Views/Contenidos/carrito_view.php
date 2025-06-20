<!DOCTYPE html>
<html>
    <head>
        <title>Carrito de compras</title>
        <link href="<?= base_url('assets/css/miEstiloCarrito.css') ?>" rel="stylesheet">
    </head>
    <body class="container-fluid">
        <main>
            <h2>🛒 Tu carrito</h2>
            <?php if (empty($carrito)): ?>
                <div class="alert alert-info">Tu carrito está vacío.</div>
            <?php else: ?>
                <form id="formCheckout" method="post" action="<?= base_url('checkout') ?>">
                    <?= csrf_field() ?> <?php foreach ($carrito as $index => $producto): ?>
                        <div class="card mb-3 p-3">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img src="<?= base_url('assets/uploads/' . esc($producto['imagen'])) ?>" width="60" alt="Imagen">
                                </div>
                                <div class="col">
                                    <strong><?= esc($producto['nombre']) ?></strong><br>
                                    <span>$<?= esc($producto['precio']) ?></span><br>

                                    <div class="mt-2">
                                        <label for="talle-<?= esc($producto['id']) ?>"><small>Selecciona Talle:</small></label>
                                        <select
                                            name="talles_seleccionados[<?= esc($producto['id']) ?>]"
                                            id="talle-<?= esc($producto['id']) ?>"
                                            class="form-select form-select-sm d-inline w-auto"
                                            <?php if (empty($producto['talles'])): ?>disabled<?php endif; ?>
                                        >
                                            <?php if (empty($producto['talles'])): ?>
                                                <option value="" selected disabled>Sin talles disponibles</option>
                                            <?php else: ?>
                                                <?php foreach ($producto['talles'] as $talle): ?>
                                                    <option
                                                        value="<?= esc($talle['id_talle']) ?>"
                                                        <?= (isset($producto['talleSeleccionado']) && $producto['talleSeleccionado'] == $talle['id_talle']) ? 'selected' : '' ?>
                                                    >
                                                        <?= esc($talle['descripcion']) ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <div class="col-auto">
                                <form method="post" action="<?= base_url('eliminar') ?>">
                                    <?= csrf_field() ?> <input type="hidden" name="id" value="<?= esc($producto['id']) ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-success mt-3">Finalizar compra</button>
            <?php endif; ?>
        </main>
    </body>
</html>