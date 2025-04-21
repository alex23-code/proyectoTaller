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
        <!-- categorias y productos -->
        <section class="Container" style="display: flex;">
            <div>
                <div class="Category-title">
                    <h2>Categorías</h2>
                </div>
                <aside class="sidebar">
                    <ul>
                        <li class="active"><a href="#">Hombres</a></li>
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
                        <img src="assets/img/RemeraHombre1.png" alt="Camisa Hammer Black">
                        <p>$55.000</p>
                        <h6>CAMISA HAMMER BLACK [PREVENTA 7/5]</h6>
                        <span>6 cuotas de $10.000 sin interés</span>
                        <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>

                <!-- Producto 3 -->
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="assets/img/RemeraHombre1.png" alt="Kit Sport Corto Black">
                        <p>$40.000</p>
                        <h6>KIT SPORT CORTO BLACK [PREVENTA 21/4]</h6>
                        <span>6 cuotas de $6.666,67 sin interés</span>
                        <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i> </button>
                    </div>
                </div>

                <!-- Producto 4 -->
                <div class="col-md-3">
                    <div class="product-card">
                        <img src="assets/img/RemeraHombre1.png" alt="Catsuit Fierce Pink">
                        <p>$50.000</p>
                        <h6>CATSUIT FIERCE PINK</h6>
                        <span>6 cuotas de $8.333,33 sin interés</span>
                        <button class="btn btn-primary mt-0"><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>
        </section> 
    </body>
</html>  