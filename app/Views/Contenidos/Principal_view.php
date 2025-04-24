<!DOCTYPE html> 
<html>  
    <body> 
        <!-- carrousel -->
    <section class="Container">
            <div id="carouselExample" class="carousel slide">
        <!-- Indicadores -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
                </div>

        <!-- Contenido del carrousel -->
                <div class="carousel-inner" style="margin: 0 auto;">
                    <div class="carousel-item active">
                        <img src="assets/img/imagen_1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/imagen_2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/imagen_3.png" class="d-block w-100" alt="...">
                    </div>
                </div>

            <!-- Controles de navegación -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </section>
        <div>
            <a href="<?php echo base_url('Comercializacion'); ?>">
                <img style="margin: 10px 0px; width: 100%; text-align: left" src="assets/img/imagen1_principal.png" alt="">
            </a>
        </div>
        <!-- categorias y productos -->
        <section class= "container-fluid" style="display: flex;">
            <div>
                <div class="Category-title">
                    <h2>Categorías</h2>
                </div>
                <aside class="sidebar">
                    <ul>
                        <li><a href="#">Hombres</a></li>
                        <li><a href="#">Mujeres</a></li>
                        <li><a href="#">ACCESORIOS</a></li>
                        <li><a href="#">Outlet</a></li>
                    </ul>
                </aside>
            </div>
            <div class="row">
                <div class="Category-title">
                    <h2 style="text-align:center;">Productos disponibles</h2>
                </div>
                <!-- Producto 1 -->
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="assets/img/RemeraHombre1.png" alt="...">
                        <p>$60.000</p>
                        <h6>Camiseta Musculosa River Plate 24/25 adidas Hombre</h6>
                        <span>6 cuotas de $10.000 sin interés</span>
                        <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>

                <!-- Producto 2 -->
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="assets/img/RemeraHombre2.png" alt="...">
                        <p>$55.000</p>
                        <h6>Camiseta adidas Selección Argentina Titular 24/25 De Hombre</h6>
                        <span>6 cuotas de $10.000 sin interés</span>
                        <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>

                <!-- Producto 3 -->
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="assets/img/RemeraHombre3.png" alt="...">
                        <p>$40.000</p>
                        <h6>Camiseta adidas Inter Miami Titular 22/23 Messi De Hombre</h6>
                        <span>6 cuotas de $6.666,67 sin interés</span>
                        <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i> </button>
                    </div>
                </div>

                <!-- Producto 4 -->
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="assets/img/RemeraHombre4.png" alt="...">
                        <p>$50.000</p>
                        <h6>Camiseta Puma Manchester City Pre-Match De Hombre</h6>
                        <span>6 cuotas de $8.333,33 sin interés</span>
                        <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
                <!-- siguiente fila -->
                <div class="row">
                    <!-- Producto 1 -->
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="assets/img/RemeraHombre1.png" alt="...">
                            <p>$60.000</p>
                            <h6>Camiseta Musculosa River Plate 24/25 adidas Hombre</h6>
                            <span>6 cuotas de $10.000 sin interés</span>
                            <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                    </div>
                    <!-- Producto 2 -->
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="assets/img/RemeraHombre2.png" alt="...">
                            <p>$55.000</p>
                            <h6>Camiseta adidas Selección Argentina Titular 24/25 De Hombre</h6>
                            <span>6 cuotas de $10.000 sin interés</span>
                            <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                    </div>
                    <!-- Producto 3 -->
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="assets/img/RemeraHombre3.png" alt="...">
                            <p>$40.000</p>
                            <h6>Camiseta adidas Inter Miami Titular 22/23 Messi De Hombre</h6>
                            <span>6 cuotas de $6.666,67 sin interés</span>
                            <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i> </button>
                        </div>
                    </div>
                    <!-- Producto 4 -->
                    <div class="col-md-3">
                        <div class="product-card">
                            <img src="assets/img/RemeraHombre4.png" alt="...">
                            <p>$50.000</p>
                            <h6>Camiseta Puma Manchester City Pre-Match De Hombre</h6>
                            <span>6 cuotas de $8.333,33 sin interés</span>
                            <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    </body>
</html>  