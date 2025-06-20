<!DOCTYPE html>
<html>
<head>
    <title>Lista de Consultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h1 class="mb-4" style="text-align:center">Lista de Consultas</h1>

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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consulta as $item): ?>
                        <tr>
                            <td><?= esc($item['idMensaje']); ?></td>
                            <td><?= esc($item['Nombre']); ?></td>
                            <td><?= esc($item['Apellido']); ?></td>
                            <td><?= esc($item['Correo']); ?></td>
                            <td><?= esc($item['NumTelefono']); ?></td>
                            <td><?= esc($item['Consulta']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
