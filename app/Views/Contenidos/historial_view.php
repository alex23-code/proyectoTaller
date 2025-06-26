<h2 class="text-center my-4"><?= esc($titulo) ?></h2>
<link rel="stylesheet" href="<?= base_url('assets/css/miEstiloHistorial.css') ?>">
<div class="container-fluid">
  <?php if (empty($ventas)): ?>
    <div class="alert alert-info text-center">
      Aún no tenés compras registradas. ¡Explorá nuestros productos y hacé tu primera compra! 🛒
      <a href="<?= base_url('ver_catalogo') ?>" class="btn btn-success">Ver Catalogo</a>
    </div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle">
        <thead class="thead-dark text-center">
          <tr>
            <th>ID</th>
            <th>Método de Pago</th>
            <th>Total</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Detalle</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ventas as $venta): ?>
            <tr>
              <td class="text-center"><?= esc($venta['id_venta']) ?></td>
              <td class="text-center"><?= ucfirst(esc($venta['metodo_pago'])) ?></td>
              <td>$<?= number_format($venta['total'], 2, ',', '.') ?></td>
              <td><?= date('d/m/Y', strtotime($venta['fecha'])) ?></td>
              <td class="text-center"><?= ucfirst($venta['estado_pago']) ?></td>
              <td class="text-center">
                <a href="<?= base_url('cliente/ver_venta/' . $venta['id_venta']) ?>" class="btn btn-sm btn-primary">
                  Ver
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>