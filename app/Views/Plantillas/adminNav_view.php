
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset = "utf-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity=" " crossorigin="">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> 
        <link href="assets/css/miEstilo.css" rel="stylesheet">
        <title>Forsport</title>
        <section> 
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid"> 
                    <a class="navbar-brand"><img style="width: 60px" src="assets/img/icono_principal.png" alt=""></a>
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
                                    <h6>Usuario: <?= session()->get('nombre') . " " . session()->get('apellido'); ?></h6>
                                    <button class="cerrarSesion" onclick="window.location.href='<?= base_url('Cerrar') ?>'">Cerrar sesión</button>
                                <?php }else{ ?>
                                    <button class="btn btn-outline-success botonIniciarSesion" type="submit" onclick="location.href='<?= base_url('Iniciar_Sesion') ?>';">Iniciar Sesion</button>
                                <?php } ?>
                                <button id="closeButton1" class="close-button">Cerrar</button>
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
        </section>
    </head>  
</html>