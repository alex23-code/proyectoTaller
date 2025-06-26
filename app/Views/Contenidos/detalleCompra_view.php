<h2 class="text-center my-4"><?= esc($titulo) ?></h2>

<div class="container">
  <div class="mb-4">
    <p><strong>Nº de Venta:</strong> <?= esc($venta['id_venta']) ?></p>
    <p><strong>Fecha de entrega:</strong> <?= date('d/m/Y', strtotime($venta['fecha_estimada'])) ?></p>
    <p><strong>Método de Pago:</strong> <?= esc(ucfirst($venta['metodo_pago'])) ?></p>
    <p><strong>Estado de Pago:</strong> <?= esc(ucfirst($venta['estado_pago'])) ?></p>
    <p><strong>Total:</strong> $<?= number_format($venta['total'], 2, ',', '.') ?></p>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered align-middle">
      <thead class="text-center bg-light">
        <tr>
          <th>Producto</th>
          <th>Talle</th>
          <th>Cantidad</th>
          <th>Precio Unitario</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($detalle as $item): ?>
          <tr>
            <td><?= esc($item['producto_nombre']) ?></td>
            <td class="text-center"><?= esc($item['talle']) ?></td>
            <td class="text-center"><?= esc($item['cantidad']) ?></td>
            <td class="text-end">$<?= number_format($item['precio_unitario'], 2, ',', '.') ?></td>
            <td class="text-end">
              $<?= number_format($item['precio_unitario'] * $item['cantidad'], 2, ',', '.') ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <a href="<?= base_url('cliente/historial') ?>" class="btn btn-outline-secondary mt-3">
    ⬅ Volver al Historial
  </a><br><br><br>
</div>