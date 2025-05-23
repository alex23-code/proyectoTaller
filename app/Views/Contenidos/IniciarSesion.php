<body>
  <main>
    <link rel="stylesheet" href="./assets/css/iniciarSesion.css">
    <form class="formulario">
      <?= validation_list_errors() ?>
      <?= form_open('form') ?>
      <h1>Iniciar Sesión</h1>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
        <input type="mail" name="username" value="<?= set_value('mail') ?>" size="30">
        <div id="emailHelp" class="form-text">Nunca compartiremos tu correo electrónico con nadie más.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label><br>
        <input type="text" name="password" value="<?= set_value('password') ?>" size="10">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Recordame</label>
      </div>
      <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
      <div class="recordar">¿Olvidó su contraseña?</div>
      <div class="registrar"> Si no tienes tu cuenta <a href="<?php echo base_url('CrearUsuario'); ?>"> Registrate </a> </div>
    </form>
  </main>
</body>