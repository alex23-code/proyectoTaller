<h2 class="text-center my-4">Detalle de la Venta #<?= esc($venta['id_venta']) ?></h2>

<div class="container">
  <div class="card mb-4">
    <div class="card-header bg-dark text-white">
      <strong>Información del Cliente</strong>
    </div>
    <div class="card-body">
      <p><strong>Nombre:</strong> <?= esc($venta['cliente_nombre']) ?></p>
      <p><strong>ID Cliente:</strong> <?= esc($venta['id_cliente']) ?></p>
      <p><strong>Método de Pago:</strong> <?= ucfirst(esc($venta['metodo_pago'])) ?></p>
      <p><strong>Estado del Pago:</strong>
        <span class="<?= $venta['estado_pago'] === 'pendiente' ? 'warning' : 'success' ?>">
          <?= ucfirst(esc($venta['estado_pago'])) ?>
        </span>
      </p>
      <p><strong>Fecha estimada de entrega:</strong> <?= date('d/m/Y', strtotime($venta['fecha_estimada'])) ?></p>
      <p><strong>Total:</strong> $<?= number_format($venta['total'], 2, ',', '.') ?></p>
    </div>
  </div>

  <div class="card">
    <div class="card-header bg-primary text-white">
      <strong>Productos Comprados</strong>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-bordered">
        <thead class="thead-light">
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
              <td><?= esc($item['talle']) ?></td>
              <td><?= esc($item['cantidad']) ?></td>
              <td>$<?= number_format($item['precio_unitario'], 2, ',', '.') ?></td>
              <td>$<?= number_format($item['cantidad'] * $item['precio_unitario'], 2, ',', '.') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-4 text-end">
    <a href="<?= base_url('Listar_ventas') ?>" class="btn btn-secondary">← Volver al listado</a>
  </div>
</div>