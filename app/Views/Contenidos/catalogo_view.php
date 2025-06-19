<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Catálogo de Productos</title>
        <link rel="stylesheet" href="assets/css/miEstiloCatalogo.css">
        <?php if (session()->getFlashdata('carro_ok')): ?>
        <div id="alerta" style="
            display: none;
            position: fixed;
            top: 120px;
            right: 20px;
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 12px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-size: 14px;
            z-index: 9999;
            cursor: pointer;
        " onclick="cerrarAlerta()">
        <?= esc(session('carro_ok')) ?>
        </div>
        <?php endif; ?>
    </head>
    <body>
        <div class="container-fluid mt-5">
            <h2 class="text-center mb-4">Catálogo de Productos</h2>
            <div class="catalogo-grid">
                <?php foreach ($productos as $producto): ?>
                    <?php
                        $talles = $tallesPorProducto[$producto['producto_id']] ?? [];
                        $tallesStr = implode(',', $talles);
                        $precioCuota = ($producto['precio'] / 6);
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

                            <form method="post" action="<?= base_url('carrito/agregar') ?>">
                                <input type="hidden" name="id" value="<?= $producto['producto_id'] ?>">
                                <button class="btn btn-primary mt-2" type="submit">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>

                            <div class="caracteristicas mt-2">
                                <ul class="list-unstyled">
                                    <li><strong>Marca:</strong> <?= esc($marcas[$producto['id_marca']] ?? '—'); ?></li>
                                    <li><strong>Género:</strong> <?= esc($categorias[$producto['id_categoria']] ?? '—'); ?></li>
                                    <li><strong>Talles:</strong> <?= !empty($talles) ? esc(implode(', ', $talles)) : '—'; ?></li>
                                </ul>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
</html>