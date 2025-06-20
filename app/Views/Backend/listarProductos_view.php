<body>
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
<?php endif; ?>
    <h1 class="text-center">Listado de productos</h1>
    <div class="container">
        <table id="mytable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Talle</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Editar</th>
                    <th>Activar/Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $row) { ?>
                    <?php
                        $producto_id = $row['producto_id'];
                        $stocks = $stocksPorProducto[$producto_id] ?? [];
                    ?>

                    <tr>
                        <td><?= $row['descripcion']; ?></td>
                        <td><?= $marcas[$row['id_marca']] ?? '—'; ?></td>
                        <td><?= $categorias[$row['id_categoria']] ?? '—'; ?></td>
                        <td>
                            <?php
                                $tallesConStock = [];

                                foreach ($talles as $talle) {
                                    $stock = $stocks[$talle['id_talle']] ?? 0;
                                    if ($stock > 0) {
                                        $tallesConStock[] = $talle['descripcion'];
                                    }
                                }

                                echo implode(', ', $tallesConStock) ?: '—';
                            ?>
                        </td>
                        <td><?= $tipos[$row['id_tipo']] ?? '—'; ?></td>
                        <td><?= number_format($row['precio'], 2, ',', '.'); ?></td>
                        <td class="<?= array_sum($stocks) > 0 ? 'text-success' : 'text-danger'; ?>">
                        <?= array_sum($stocks); ?>
                    </td>
                        <td><?= ($row['estado'] == 1) ? 'Activo' : 'Inactivo'; ?></td>
                        <td>
                            <img src="<?= base_url('assets/uploads/' . $row['producto_imagen']); ?>" alt="Imagen producto" height="50" width="50">
                        </td>
                        <td>
                            <a class="btn btn-success" href="<?= base_url('Gestionar_productos/editar/' . $row['producto_id']); ?>">Editar</a>
                        </td>
                        <td>
                            <?php if ($row['estado'] == 1) { ?>
                                <a class="btn btn-danger" href="<?= base_url('productosController/desactivar_producto/' . $row['producto_id']); ?>">Desactivar</a>
                            <?php } else { ?>
                                <a class="btn btn-warning" href="<?= base_url('productosController/activar_producto/' . $row['producto_id']); ?>">Activar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
