<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Consultas</h1>
    <table border ="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Número de teléfono</th>
            <th>Consulta</th>
</tr>
        <?php foreach ($consulta as $item): ?>
        <tr>
            <td><?=  $item['idMensaje']; ?></td>
           <td><?=  $item['Nombre']; ?></td>
           <td><?=  $item['Apellido']; ?></td>
           <td><?=  $item['Correo']; ?></td>
           <td><?=  $item['NumTelefono']; ?></td>
           <td><?=  $item['Consulta']; ?></td>
        </tr>
           <?php endforeach; ?>


    </table>
</body>
</html>
