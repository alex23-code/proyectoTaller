<!DOCTYPE html>
<html>
<head>
    <title>Lista de Consultas</title>
    
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h1 class="mb-4" style="text-align:center">Lista de Consultas</h1>
        <form method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar consulta..." value="<?= esc($_GET['q'] ?? '') ?>">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
        </form>
        <?php if (empty($consulta)): ?>
            <div class="alert alert-warning">No se encontraron resultados.</div>
        <?php else: ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Número de Teléfono</th>
                        <th>Consulta</th>
                        <th>Leído</th>
                    </tr>
                </thead>
                    <?php foreach ($consulta as $item): ?>
                        <tr>
                            <td><?= esc($item['idMensaje']); ?></td>
                            <td><?= esc($item['Nombre']); ?></td>
                            <td><?= esc($item['Apellido']); ?></td>
                            <td><?= esc($item['Correo']); ?></td>
                            <td><?= esc($item['NumTelefono']); ?></td>
                            <td><?= esc($item['Consulta']); ?></td>
                            <td class="text-center">
                            <?php if (isset($item['leido']) && $item['leido'] == 1): ?>
                                <span class="badge bg-success">Leída</span>
                            <?php else: ?>
                                <a href="<?= base_url('marcar_leido/' . $item['idMensaje']) ?>" class="btn btn-sm btn-outline-secondary">
                                Marcar como Leída
                                </a>
                            <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

    </div>
</body>
</html>
