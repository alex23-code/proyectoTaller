<body>
    <link rel="stylesheet" href="<?= base_url('assets/css/miEstiloExito.css') ?>">
    <main>

        <div class="container-exito">
            <h2 class="text-success">¡Gracias por tu compra! 🎉</h2>
            <p>Tu número de compra: <strong>#<?= $venta['id_venta'] ?></strong></p>
            <p>Fecha estimada de entrega: <strong><?= date('d/m/Y', strtotime($venta['fecha_estimada'])) ?></strong></p>

            <table class="table mt-4">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($detalles as $item): ?>
                    <tr>
                    <td><?= esc($item['producto_nombre']) ?></td>
                    <td><?= esc($item['cantidad']) ?></td>
                    <td>$<?= number_format($item['precio_unitario'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <p class="text-end"><strong>Total pagado: $<?= number_format($venta['total'], 2, ',', '.') ?></strong></p>
            <a href="<?= base_url('/') ?>" class="btn-volver">Volver al inicio</a>
            </div>
    </main>
</body>
