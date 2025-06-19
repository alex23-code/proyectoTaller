
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset = "utf-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <!--<link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity=" " crossorigin="">-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> 
        <!--<link href="assets/css/miEstilo.css" rel="stylesheet">-->
        <link rel="stylesheet" href="<?= base_url('assets/css/miEstilo.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
        <title>Forsport</title>
        <section> 
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid"> 
                    <a class="navbar-brand"><img style="width: 60px" src=<?= base_url('assets/img/icono_principal.png') ?> alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="mx-auto">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Ver_consultas'); ?>"><h5>Ver consultas</h5></a> </il>
                                <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Listar_productos'); ?>"><h5>Listar productos</h5></a></il>
                                <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Listar_ventas'); ?>"><h5>Listar Ventas</h5></a></il>
                                <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Registrar_productos'); ?>"><h5>Registrar productos</h5></a></il>
                                <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Gestionar_productos'); ?>"><h5>Gestionar productos</h5></a></il>
                            </ul>
                        </div>
                        <div>
                            <button id="menuButton1" class="menu-button"><i class="fa-solid fa-user"></i> Perfil</button>
                            <div id="overlay" class="hidden"></div>
                                <div id="profileMenu" class="menu hidden">
                                    <h2>Perfil</h2>
                                    <?php if(session('login')){ ?>
                                        <div class="usuario-container">
                                            <h5>Usuario: <?= session()->get('nombre') . " " . session()->get('apellido'); ?></h5> 
                                            <button class="cerrarSesion" onclick="window.location.href='<?= base_url('Cerrar') ?>'">Cerrar sesión</button>
                                        </div>
                                        <div class="config">
                                            <h3 class="configuracion-titulo">⚙️ Configuración</h3>
                                            <div class="submenu">
                                                <!-- Botón modal Nombre-->
                                                <button type="button" class="boton mb-2" data-bs-toggle="modal" data-bs-target="#modalNombre" data-bs-backdrop="false">
                                                    Cambiar usuario
                                                </button>
                                                <!-- Modal Usuario -->
                                                <?php echo form_open('cambiar_usuario') ?>
                                                <div class="modal fade" id="modalNombre" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Cambiar usuario</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="nuevoNombre">Nombre:</label>
                                                                <input type="text" class="form-control" name="nuevoNombre" value="<?= set_value('nuevoNombre') ?>" placeholder="Ingresar un nombre">

                                                                <label for="nuevoApellido">Apellido:</label>
                                                                <input type="text" class="form-control" name="nuevoApellido" value="<?= set_value('nuevoApellido') ?>" placeholder="Ingresar un apellido">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php echo form_close()?>
                                                <!-- Botón modal Correo-->
                                                <button type="button" class="boton mb-2" data-bs-toggle="modal" data-bs-target="#modalCorreo" data-bs-backdrop="false">
                                                    Cambiar correo
                                                </button>
                                                <!-- Modal Correo -->
                                                <?php echo form_open('cambiar_correo') ?>
                                                <div class="modal fade" id="modalCorreo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Cambiar correo electrónico</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="nuevoCorreo">Correo electrónico nuevo:</label>
                                                                <input type="email" class="form-control" name="nuevoCorreo" value="<?= set_value('nuevoCorreo')?>" placeholder="Ej:nombre@gmail.com">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php echo form_close()?>
                                                <!-- Botón modal Contraseña -->
                                                <button type="button" class="boton mb-2" data-bs-toggle="modal" data-bs-target="#modalContraseña" data-bs-backdrop="false">
                                                    Cambiar contraseña
                                                </button>
                                                <!-- Modal Contraseña -->
                                                <?php echo form_open('cambiar_contrasena') ?>
                                                <div class="modal fade" id="modalContraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Cambiar Contraseña</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="nuevaContraseña">Contraseña nueva:</label>
                                                                <input type="text" class="form-control" name="nuevaContraseña" value="<?= set_value('nuevaContraseña')?>" placeholder="Ingresar una contraseña">
                                                                <label for="contraseñaConf">Confirmar contraseña:</label>
                                                                <input type="text" class="form-control" name="contraseñaConf" value="<?= set_value('contraseñaConf')?>" placeholder="Repetir contraseña">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php echo form_close()?>
                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <button class="btn btn-outline-success botonIniciarSesion" type="submit" onclick="location.href='<?= base_url('Iniciar_Sesion') ?>';">Iniciar Sesion</button>
                                    <?php } ?>
                                    <button id="closeButton1" class="close-button">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <script>
                        const overlay = document.getElementById('overlay');
                        function toggleMenu(buttonId, menuId, closeButtonId) {
                            const button = document.getElementById(buttonId);
                            const menu = document.getElementById(menuId);
                            const closeButton = document.getElementById(closeButtonId);
                            if (!button || !menu || !closeButton) {
                                console.error(`No se encontraron los elementos: ${buttonId}, ${menuId}, ${closeButtonId}`);
                                return;
                            }
                            button.addEventListener('click', () => {
                                menu.classList.remove('hidden');
                                overlay.classList.remove('hidden');
                            });
                            closeButton.addEventListener('click', () => {
                                menu.classList.add('hidden');
                                overlay.classList.add('hidden');
                            });
                            overlay.addEventListener('click', () => {
                                menu.classList.add('hidden');
                                overlay.classList.add('hidden');
                            });
                        }
                        toggleMenu('menuButton1', 'profileMenu', 'closeButton1'); // Menú de Perfil
                    </script>
                </div>
            </nav>
            <!-- muestra errores de configuracion del usuario -->
            <?php if(session()->get('error')): ?>
                <div id="alerta" class="alerta">
                    <h6>Hubo un error</h6>
                    <span><?= implode('<br>', session('error')); ?></span>
                    <button onclick="cerrarAlerta()" class="cerrar-alerta">&times;</button>
                </div>
            <?php endif; ?>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- script para mostrar errores de configuracion -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var alerta = document.getElementById("alerta");
                if (alerta && alerta.innerText.trim() !== "") {
                    alerta.style.display = "block"; // Forzar que se muestre
                }
            });

            function cerrarAlerta() {
                document.getElementById("alerta").style.display = "none";
            }

            document.addEventListener("click", function (event) {
            var alerta = document.getElementById("alerta");
            
            if (alerta && alerta.style.display === "block" && !alerta.contains(event.target)) {
                alerta.style.display = "none";
            }
            });
        </script>
    </head>  
</html>