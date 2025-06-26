<h2 class="text-center my-4"><?= esc($titulo) ?></h2>

<div class="container-fluid">
  <form method="get" class="mb-3">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Buscar venta..." value="<?= esc($_GET['q'] ?? '') ?>">
      <button class="btn btn-primary" type="submit">Buscar</button>
    </div>
  </form>
  <?php if (empty($ventas)): ?>
    <div class="alert alert-warning text-center">No se encontraron ventas.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
        <thead class=" text-center table-dark">
          <tr>
            <th>ID Venta</th>
            <th>Cliente</th>
            <th>Método de Pago</th>
            <th>Total</th>
            <th>Fecha de entrega</th>
            <th>Estado</th>
            <th>detalles</th>
            <th>cambiar estado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ventas as $venta): ?>
            <tr>
              <td class="text-center"><?= esc($venta['id_venta']) ?></td>
              <td><?= esc($venta['cliente_nombre']) ?> (ID <?= esc($venta['id_cliente']) ?>)</td>
              <td class="text-center"><?= ucfirst(esc($venta['metodo_pago'])) ?></td>
              <td>$<?= number_format($venta['total'], 2, ',', '.') ?></td>
              <td><?= date('d/m/Y', strtotime($venta['venta_fecha'])) ?></td>
              <td class="text-center">
                <span class="<?= $venta['estado_pago'] === 'pendiente' ? 'warning' : 'success' ?>">
                  <?= ucfirst($venta['estado_pago']) ?>
                </span>
              </td>
              <td class="text-center">
                <a href="<?= base_url('admin/ver_venta/' . $venta['id_venta']) ?>" class="btn btn-sm btn-primary">
                  Ver Detalle
                </a>
              </td>
              <td class="text-center">
                  <a href="<?= base_url('admin/cambiar_estado_pago/' . $venta['id_venta']) ?>"
                      class="btn btn-sm <?= $venta['estado_pago'] === 'pendiente' ? 'btn-success' : 'btn-warning' ?>">
                      <?= $venta['estado_pago'] === 'pendiente' ? 'Marcar como Pagado' : 'Marcar como Pendiente' ?>
                  </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
