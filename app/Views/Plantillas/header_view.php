<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset = "utf-8">  
        <meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no"> 
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity=" " crossorigin="">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link href="assets/css/miEstilo.css" rel="stylesheet">
        <link href="assets/css/EstiloPrincipal.css" rel="stylesheet">
        <title>Forsport</title>
        <section> 
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid"> 
                    <a class="navbar-brand" href="<?php echo base_url('/'); ?>"><img style="width: 50px" src="assets/img/icono_principal.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <il class="nav-item"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('/'); ?>">Inicio</a> </il>
                            <il class="nav-item"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Nosotros'); ?>">Sobre Nosotros</a></il>
                            <il class="nav-item"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Comercializacion'); ?>">Comercialización</a></il>
                            <il class="nav-item"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Contacto'); ?>">Contacto</a></il>
                            <il class="nav-item"><a aria-current="page"  class="nav-link active" href="<?php echo base_url('Terminos'); ?>">Términos y Usos</a></il>
                        </ul>
                        
                        <button class="btn btn-outline-success botonIniciarSesion" type="submit" onclick="location.href='<?= base_url('IniciarSesion') ?>';">Iniciar Sesion</button>
                        

                        
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>    
                    </div>
                </div>
            </nav>
        </section>
    </head>  
</html>