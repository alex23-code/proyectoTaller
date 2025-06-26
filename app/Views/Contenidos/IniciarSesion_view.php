<body>
  <?php if (session()->getFlashdata('msg')): ?>
      <div class="alert alert-warning text-center">
        <?= esc(session()->getFlashdata('msg')) ?>
      </div>
    <?php endif; ?>
  <main>
    <link rel="stylesheet" href="./assets/css/iniciarSesion.css">
    

      <?php echo form_open('iniciar', 'class=formulario') ?>
      <h1>Iniciar Sesión</h1>
      <div class="alert <?= empty(validation_show_error('log')) ? 'd-none' : ''; ?>">
          <?= validation_show_error('log'); ?>
        </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo Electronico</label><br>
        <div class="alert <?= empty(validation_show_error('email')) ? 'd-none' : ''; ?>">
          <?= validation_show_error('email'); ?>
        </div>
        <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control w-75" placeholder="nombre@gmail.com">
        <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electrónico con nadie más.</div> 
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label><br>
        <div class="alert <?= empty(validation_show_error('password')) ? 'd-none' : ''; ?>">
          <?= validation_show_error('password'); ?>
        </div>
        <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control w-75" placeholder="ingresar contraseña">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Recordame</label>
      </div>
      <?php echo form_submit('iniciar', 'Iniciar sesion','class= btn btn-primary'); ?>
      <!--<button type="submit" class="btn btn-primary">Iniciar Sesion</button> -->
      <div class="recordar">¿Olvidó su contraseña?</div>
      <div class="registrar"> Si no tienes tu cuenta <a href="<?php echo base_url('CrearUsuario'); ?>"> Registrate </a> </div>
      <?php echo form_close()?>
  </main>
</body>