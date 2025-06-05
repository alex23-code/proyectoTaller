<body>
  <main>
    <link rel="stylesheet" href="./assets/css/iniciarSesion.css">
    <form class="formulario">
      <?= validation_list_errors() ?>
    <?php var_dump(session()->get()); ?>

      <?php echo form_open('iniciar_sesion') ?>
      <h1>Iniciar Sesión</h1>
      <div class="mb-3">
        <label for="email" class="form-label">Correo Electronico</label>
        <input class="input" type="email" name="email" value="<?= old('email')?>">
        <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electrónico con nadie más.</div>
       <p class="help is-danger"><?= session('errors.email')?></p> 
      </div>
      <?php if (isset($validation) && $validation->hasError('email')): ?>
    <small class="text-danger"><?= $validation->getError('email') ?></small>
<?php endif; ?>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label><br>
        <input type="text" name="password" value="<?= set_value('password') ?>" size="10" value="<?= old('password')?>">
      <?php if (isset($validation) && $validation->hasError('password')): ?>
        <small class="text-danger"><?= $validation->getError('password') ?></small>
    <?php endif; ?>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Recordame</label>
      </div>
      <?php echo form_submit('submit', 'Iniciar Sesion',"class= btn btn-primary"); ?>
      <!--<button type="submit" class="btn btn-primary">Iniciar Sesion</button> -->
      <div class="recordar">¿Olvidó su contraseña?</div>
      <div class="registrar"> Si no tienes tu cuenta <a href="<?php echo base_url('CrearUsuario'); ?>"> Registrate </a> </div>
      <?php echo form_close()?>
    </form>
  </main>
      </body>