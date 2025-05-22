
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid"> 
        <a class="navbar-brand" href="<?php echo base_url('/'); ?>"><img style="width: 60px" src="assets/img/icono_principal.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="mx-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('/'); ?>"><h5>Inicio</h5></a> </il>
                    <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('administrar productos'); ?>"><h5>Nosotros</h5></a></il>
                    <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Consultas'); ?>"><h5>Comercialización</h5></a></il>
                    <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Administrar usuarios'); ?>"><h5>Contacto</h5></a></il>
                    <il class="nav-item me-3"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('...'); ?>"><h5>Términos y Usos</h5></a></il>
                </ul>
            </div>
                <div>
                <button id="menuButton1" class="menu-button"><i class="fa-solid fa-user"></i> Perfil</button>
                <button id="menuButton2" class="menu-button"><i class="fa-solid fa-cart-shopping"></i> Carrito</button>
                <div id="overlay" class="hidden"></div>
                <div id="profileMenu" class="menu hidden">
                    <h2>Perfil</h2>
                    <button class="btn btn-outline-success botonIniciarSesion" type="submit" onclick="location.href='<?= base_url('IniciarSesion') ?>';">Iniciar Sesion</button>
                    <button id="closeButton1" class="close-button">Cerrar</button>
                </div>
                <div id="cartMenu" class="menu hidden">
                    <h2 id="cartTitle">Carrito de Compras</h2>
                    <div id="cartItems">
                    </div>
                    <button id="closeButton2" class="close-button">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</nav>