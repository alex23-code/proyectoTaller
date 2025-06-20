<head>
    <title>Lista de Usuarios</title>
</head>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Venta</th>
            <th scope="col">ID Producto</th>
            <th scope="col">Marca</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ventas as $venta) : ?>
        <tr>
            <td><?= $venta->id_venta; ?></td>
            <td><?= $venta->id_producto; ?></td>
            <td><?= $venta->marca; ?></td>
            <td><?= $venta->precio; ?></td>
            <td><?= $venta->descripcion; ?></td>
            <td>
                <!-- Botón para abrir modal -->
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalVenta<?= $venta->id_venta; ?>">
                    Ver detalles
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalVenta<?= $venta->id_venta; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $venta->id_venta; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel<?= $venta->id_venta; ?>">Detalles de la Venta #<?= $venta->id_venta; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>ID Venta:</strong> <?= $venta->id_venta; ?></p>
                                <p><strong>ID Producto:</strong> <?= $venta->id_producto; ?></p>
                                <p><strong>Marca:</strong> <?= $venta->marca; ?></p>
                                <p><strong>Precio:</strong> <?= $venta->precio; ?></p>
                                <p><strong>Descripción:</strong> <?= $venta->descripcion; ?></p>
                                <p><strong>Nombre:</strong> <?= $venta->descripcion; ?></p>
                                <p><strong>Apellido:</strong> <?= $venta->descripcion; ?></p>
                                <p><strong>DNI:</strong> <?= $venta->descripcion; ?></p>
                                <p><strong>Telefono:</strong> <?= $venta->descripcion; ?></p>
                                <p><strong>Domicilio:</strong> <?= $venta->descripcion; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
