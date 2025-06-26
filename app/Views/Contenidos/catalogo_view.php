<!DOCTYPE html>
<html lang="es">
<head>
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="assets/css/miEstiloCatalogo.css">
    
</head>
<body>
    <div class="container-fluid mt-5">
        <h2 class="text-center mb-4">Catálogo de Productos</h2>
        <div class="catalogo-grid">
            <?php foreach ($productos as $producto): ?>
                <?php
                    $talles = array_map(fn($t) => $t['descripcion'], $producto['talles'] ?? []);
                    $tallesStr = implode(',', $talles);
                ?>
                <div class="product-card"
                    data-id="<?= $producto['producto_id']; ?>"
                    data-talles="<?= esc($tallesStr); ?>">

                    <img src="<?= base_url('assets/uploads/' . $producto['producto_imagen']); ?>"
                        alt="<?= esc($producto['descripcion']); ?>"
                        class="img-fluid">

                    <p class="mt-2">$<?= number_format($producto['precio'], 2, ',', '.'); ?></p>

                    <h6><?= esc($producto['descripcion']); ?></h6>

                    <span>
                        6 cuotas sin interés de $<?= number_format($producto['precio'] / 6, 2, ',', '.'); ?>
                    </span>

                    <button class="btn btn-primary mt-2 w-100"  data-bs-toggle="modal" data-bs-target="#modalProducto<?= $producto['producto_id'] ?>">
                        <i class="fa-solid fa-cart-shopping"></i> Agregar
                    </button>

                    <div class="caracteristicas mt-2">
                        <ul class="list-unstyled">
                            <li><strong>Marca:</strong> <?= esc($marcas[$producto['id_marca']] ?? '—'); ?></li>
                            <li><strong>Género:</strong> <?= esc($categorias[$producto['id_categoria']] ?? '—'); ?></li>
                            <li><strong>Talles:</strong> <?= !empty($talles) ? esc(implode(', ', $talles)) : '—'; ?></li>
                        </ul>
                    </div>
                </div>

                <div class="modal fade" id="modalProducto<?= $producto['producto_id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $producto['producto_id'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form method="post" action="<?= base_url('carrito/agregar') ?>">
                            <?= csrf_field() ?>
                            <input type="hidden" name="producto_id" value="<?= $producto['producto_id'] ?>">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel<?= $producto['producto_id'] ?>"><?= esc($producto['descripcion']) ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <label>Talle:</label>
                                    <select name="talle" class="form-select" required>
                                        <?php foreach ($producto['talles'] as $talle): 
                                            $disponible = intval($talle['cantidad'] ?? 0);
                                            $label = esc($talle['descripcion']) . ($disponible > 0 ? " ({$disponible} disponibles)" : " (sin stock)");
                                            ?>
                                            <option value="<?= $talle['id_talle'] ?>" <?= $disponible > 0 ? '' : 'disabled' ?>>
                                                <?= $label ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <label for="cantidad" class="mt-3">Cantidad:</label>
                                    <input type="number" name="cantidad" value="1" min="1" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Agregar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>