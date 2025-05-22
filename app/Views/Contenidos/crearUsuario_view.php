<body>
  <main>
    <link rel="stylesheet" href="./assets/css/iniciarSesion.css">
    <form class="formulario">
      <?= validation_list_errors() ?>
      <?= form_open('form') ?>
      <h1>Registrar Usuario</h1>
      <div class="mb-3">
        <label for="exampleInput" class="form-label">Nombre</label><br>
        <input type="text" name="nombre" value="<?= set_value('nombre') ?>" size="25">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">apellido</label><br>
        <input type="text" name="apellido" value="<?= set_value('apellido') ?>" size="25">
      </div>
        <label for="exampleInput" class="form-label">Correo Electronico</label><br>
        <input type="mail" name="mail" value="<?= set_value('mail') ?>" size="30">
      <div class="mb-3">
        <label for="exampleInput" class="form-label">Contraseña</label><br>
        <input type="text" name="password" value="<?= set_value('password') ?>" size="10">
      </div>
      <div class="mb-3">
        <label for="exampleInput" class="form-label">Confirmar Contraseña</label><br>
        <input type="text" name="password" value="<?= set_value('password') ?>" size="10">
      </div>
      <button type="submit" class="btn btn-primary"><a href=<?php echo base_url('registrarUsuario')?>>summit</a></button>
      <?= form_close() ?>
    </form>
  </main>
</body>