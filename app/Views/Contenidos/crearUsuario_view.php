<body>
  <main>
    <link rel="stylesheet" href="./assets/css/iniciarSesion.css">
      <?php echo form_open('registro', 'class=formulario') ?>
      <h1>Registrar Usuario</h1>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label><br>
        <div class="alert <?= empty(validation_show_error('nombre')) ? 'd-none' : ''; ?>">
          <?= validation_show_error('nombre'); ?>
        </div>
        <input type="nombre" name="nombre" value="<?= set_value('nombre') ?>" class="form-control w-75" placeholder="ingresar nombre">
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label><br>
        <div class="alert <?= empty(validation_show_error('apellido')) ? 'd-none' : ''; ?>">
          <?= validation_show_error('apellido'); ?>
        </div>
        <input type="apellido" name="apellido" value="<?= set_value('apellido') ?>" class="form-control w-75" placeholder="ingresar apellido">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo Electronico</label><br>
        <div class="alert <?= empty(validation_show_error('email')) ? 'd-none' : ''; ?>">
          <?= validation_show_error('email'); ?>
        </div>
        <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control w-75" placeholder="nombre@gmail.com">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label><br>
        <div class="alert <?= empty(validation_show_error('password')) ? 'd-none' : ''; ?>">
          <?= validation_show_error('password'); ?>
        </div>
        <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control w-75" placeholder="ingresar contraseña">
      </div>
      <div class="mb-3">
        <label for="passwordConfirm" class="form-label">Confirmar Contraseña</label><br>
        <div class="alert <?= empty(validation_show_error('passwordConfirm')) ? 'd-none' : ''; ?>">
          <?= validation_show_error('passwordConfirm'); ?>
        </div>
        <input type="password" name="passwordConfirm" value="<?= set_value('passwordConfirm') ?>" class="form-control w-75" placeholder="repetir contraseña">
      </div>
      <?php echo form_submit('submit', 'Registrarme', 'class= btn-registro mt-3'); ?>
      <?php echo form_close() ?>
  </main>
</body>