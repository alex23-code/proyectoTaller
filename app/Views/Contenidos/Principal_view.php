<!DOCTYPE html> 
<html>  
    <body> 
        <link href="assets/css/EstiloPrincipal.css" rel="stylesheet">
        <!-- carrousel -->
        <section class="Container-fluid">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover">
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
                <img style="margin: 10px 0px; width: 100%;" src="assets/img/imagen1_principal.png" alt="">
            </a>
        </div>
        <!-- categorias y productos -->
        <section class="container-fluid" style="">
            <div class="Category-title ">
            <h2 class="text-center mb-4">Catálogo de Productos</h2>
            </div>
            <!-- Catalogo para remeras de hombre -->
            <img style="margin: 10px 0px; width: 100%;" src="assets/img/banner_hombre.png" alt="">
            <div class="Category-title mb-4">
                <h2 class="text-center">Remeras</h2>
            </div>
            <div id="carouselRemerasHombre" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- producto 1 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre1.png" alt="...">
                                    <p>$59.999</p>
                                    <h6>Camiseta Musculosa River Plate adidas Hombre</h6>
                                    <span>6 cuotas sin interés de $9.999,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 2 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre2.png" alt="...">
                                    <p>$119.999</p>
                                    <h6>Camiseta adidas Selección Argentina Titular De Hombre</h6>
                                    <span>6 cuotas sin interés de $19.999,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 3 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre3.png" alt="...">
                                    <p>$84.999</p>
                                    <h6>Camiseta adidas Inter Miami Titular Messi De Hombre</h6>
                                    <span>6 cuotas sin interés de $14.166,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: L</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 4 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre4.png" alt="...">
                                    <p>$84.999</p>
                                    <h6>Camiseta Puma Manchester City Pre-Match De Hombre</h6>
                                    <span>6 cuotas sin interés de $14.166,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Puma</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <!-- producto 5 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre5.png" alt="...">
                                    <p>$55.999</p>
                                    <h6>Musculosa adidas Heat.Rdy Workout De Hombre</h6>
                                    <span>6 cuotas sin interés de $9.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 6 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre6.png" alt="...">
                                    <p>$39.999</p>
                                    <h6>Musculosa Under Armour HeatGear Armour De Hombre</h6>
                                    <span>6 cuotas sin interés de $6.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Under Armour</li>
                                            <li>Talle: L</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 7 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre7.png" alt="...">
                                    <p>$29.999</p>
                                    <h6>Musculosa Under Armour Left Chest Cut-Off De Hombre</h6>
                                    <span>6 cuotas sin interés de $4.999,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Under Armour</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 8 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre8.png" alt="...">
                                    <p>$39.999</p>
                                    <h6>Musculosa Under Armour HeatGear De Hombre</h6>
                                    <span>6 cuotas sin interés de $6.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Under Armour</li>
                                            <li>Talle: S</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <!-- producto 9 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre9.png" alt="...">
                                    <p>$25.999</p>
                                    <h6>Remera Puma Essentials Small Logo De Hombre</h6>
                                    <span>6 cuotas sin interés de $4.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Puma</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 10 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre10.png" alt="...">
                                    <p>$40.999</p>
                                    <h6>Remera adidas Adizero Essentials De Hombre</h6>
                                    <span>6 cuotas sin interés de $6.833,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 11 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre11.png" alt="...">
                                    <p>$25.999</p>
                                    <h6>Remera Topper Basic De Hombre</h6>
                                    <span>6 cuotas sin interés de $4.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Topper</li>
                                            <li>Talle: L</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 12 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraHombre12.png" alt="...">
                                    <p>$27.399</p>
                                    <h6>Remera Puma Essentials Small Logo De Hombre</h6>
                                    <span>6 cuotas sin interés de $4.566,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Puma</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselRemerasHombre" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselRemerasHombre" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
            <!-- Catalogo shorts de hombre -->
            <div class="Category-title mb-4">
            <h2 class="text-center mt-3">Shorts</h2>
            </div>
            <div id="carouselShortsHombre" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- producto 1 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre1.png" alt="...">
                                    <p>$74.999</p>
                                    <h6>Shorts de Entrenamiento Boca Juniors adidas Hombre</h6>
                                    <span>6 cuotas sin interés de $12.499,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 2 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre2.png" alt="...">
                                    <p>$49.999</p>
                                    <h6>Short adidas Train Essentials De Hombre</h6>
                                    <span>6 cuotas sin interés de $8.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: L</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 3 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre3.png" alt="...">
                                    <p>28.999</p>
                                    <h6>Short Topper Line II De Hombre</h6>
                                    <span>6 cuotas sin interés de $4.833,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Topper</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 4 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre4.png" alt="...">
                                    <p>$39.999</p>
                                    <h6>Short Under Armour Tech De Hombre</h6>
                                    <span>6 cuotas sin interés de $6.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Under Armours</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <!-- producto 5 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre5.png" alt="...">
                                    <p>$40.999</p>
                                    <h6>Short adidas Adizero Essentials De Hombre</h6>
                                    <span>6 cuotas sin interés de $6.833,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 6 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre6.png" alt="...">
                                    <p>$57.499</p>
                                    <h6>Short Puma Run Favorite Velocity 7" De Hombre</h6>
                                    <span>6 cuotas sin interés de $9.583,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Puma</li>
                                            <li>Talle: L</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 7 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre7.png" alt="...">
                                    <p>$45.999</p>
                                    <h6>Short De Rugby Gilbert</h6>
                                    <span>6 cuotas sin interés de $7.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Gilbert</li>
                                            <li>Talle: S</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 8 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre8.png" alt="...">
                                    <p>$90.999</p>
                                    <h6>Short adidas Designed For Training De Hombre</h6>
                                    <span>6 cuotas sin interés de $15.166,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <!-- producto 9 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre9.png" alt="...">
                                    <p>$87.499</p>
                                    <h6>Short Puma Ultraweave Velocity 3 Split De Hombre</h6>
                                    <span>6 cuotas sin interés de $14.583,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Puma</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 10 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre10.png" alt="...">
                                    <p>$79.999</p>
                                    <h6>Short Under Armour Project Rock De Hombre</h6>
                                    <span>6 cuotas sin interés de $13.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 11 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre11.png" alt="...">
                                    <p>$99.999</p>
                                    <h6>Short adidas Adicolor Argentina De Hombre</h6>
                                    <span>6 cuotas sin interés de $16.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Topper</li>
                                            <li>Talle: L</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 12 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortHombre12.png" alt="...">
                                    <p>$39.999</p>
                                    <h6>Short De Baño Atlét Estampado De Hombre</h6>
                                    <span>6 cuotas sin interés de $6.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Atlét</li>
                                            <li>Talle: M</li>
                                            <li>Género: Hombre</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselShortsHombre" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselShortsHombre" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
            <!-- Catalogo remeras de mujer -->
            <img style="margin: 10px 0px; width: 100%;" src="assets/img/banner_mujer.png" alt="">
            <div class="Category-title mb-4">
                <h2 class="text-center mt-3">Remeras</h2>
            </div>
            <div id="carouselRemerasMujer" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- producto 1 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer1.png" alt="...">
                                    <p>$49.999</p>
                                    <h6>Camiseta de Arquero Squadra Manga Larga adidas Mujer</h6>
                                    <span>6 cuotas sin interés de $8.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: S</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 2 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer2.png" alt="...">
                                    <p>$69.999</p>
                                    <h6>Camiseta Under Armour Leonas Alternativa De Mujer</h6>
                                    <span>6 cuotas sin interés de $11.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Under Armour</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 3 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer3.png" alt="...">
                                    <p>$119.999</p>
                                    <h6>Camiseta Alternativa Messi Inter Miami CF adidas Mujer</h6>
                                    <span>6 cuotas sin interés de $19.999,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 4 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer4.png" alt="...">
                                    <p>$49.999</p>
                                    <h6>Camiseta de Arquero Squadra Manga Larga adidas Mujer</h6>
                                    <span>6 cuotas sin interés de $8.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: S</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <!-- producto 5 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer5.png" alt="...">
                                    <p>$35.999</p>
                                    <h6>Musculosa adidas Train Essentials De Mujer</h6>
                                    <span>6 cuotas sin interés de $5.999,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 6 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer6.png" alt="...">
                                    <p>$29.999</p>
                                    <h6>Musculosa Under Armour Tech Solid De Mujer</h6>
                                    <span>6 cuotas sin interés de $4.999,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Under Armour</li>
                                            <li>Talle: L</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 7 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer7.png" alt="...">
                                    <p>$34.999</p>
                                    <h6>Remera W LIN SJ TK adidas Mujer</h6>
                                    <span>6 cuotas sin interés de $5.833,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 8 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer8.png" alt="...">
                                    <p>$54.999</p>
                                    <h6>Musculosa Future Icons 3 Tiras adidas Mujer</h6>
                                    <span>6 cuotas sin interés de $9.166,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <!-- producto 9 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer9.png" alt="...">
                                    <p>$32.999</p>
                                    <h6>Chomba Atlét Tenis De Mujer</h6>
                                    <span>6 cuotas sin interés de $5.499,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Atlét</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 10 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer10.png" alt="...">
                                    <p>$67.999</p>
                                    <h6>Chomba adidas Club De Mujer</h6>
                                    <span>6 cuotas sin interés de $11.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: L</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 11 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer11.png" alt="...">
                                    <p>$34.999</p>
                                    <h6>Remera W LIN SJ TK adidas Mujer</h6>
                                    <span>6 cuotas sin interés de $5.833,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 12 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/RemeraMujer12.png" alt="...">
                                    <p>$28.999</p>
                                    <h6>Remera Topper Training Light II De Mujer</h6>
                                    <span>6 cuotas sin interés de $4.833,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Topper</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselRemerasMujer" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselRemerasMujer" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
            <!-- Catalogo shorts de mujer -->
            <div class="Category-title mb-4">
                <h2 class="text-center mt-3">Shorts</h2>
            </div>
            <div id="carouselShortsMujer" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- producto 1 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer1.png" alt="...">
                                    <p>$39.999</p>
                                    <h6>Short adidas Adizero Essentials Split De Mujer</h6>
                                    <span>6 cuotas sin interés de $6.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: L</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 2 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer2.png" alt="...">
                                    <p>$39.999</p>
                                    <h6>Short adidas Adizero Essentials De Mujer</h6>
                                    <span>6 cuotas sin interés de $6.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: S</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 3 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer3.png" alt="...">
                                    <p>$31.999</p>
                                    <h6>Short Salomon 4 Way De Mujer</h6>
                                    <span>6 cuotas sin interés de $5.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Salomon</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 4 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer4.png" alt="...">
                                    <p>$97.499</p>
                                    <h6>Short Puma Run Ultraweave 3" De Mujer</h6>
                                    <span>6 cuotas sin interés de $16.249,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Puma</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <!-- producto 5 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer5.png" alt="...">
                                    <p>$24.999</p>
                                    <h6>Short Topper Rtc De Mujer</h6>
                                    <span>6 cuotas sin interés de $4.166,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Topper</li>
                                            <li>Talle: S</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 6 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer6.png" alt="...">
                                    <p>$49.999</p>
                                    <h6>Short Under Armour Rival Terry De Mujer</h6>
                                    <span>6 cuotas sin interés de $8.333,16</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Under Armour</li>
                                            <li>Talle: L</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 7 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer7.png" alt="...">
                                    <p>$40.499</p>
                                    <h6>Short Puma Essentials De Mujer</h6>
                                    <span>6 cuotas sin interés de $6.749,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Puma</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 8 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer8.png" alt="...">
                                    <p>$54.999</p>
                                    <h6>Shorts W CB SKORT adidas Mujer</h6>
                                    <span>6 cuotas sin interés de $9.166,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <!-- producto 9 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer9.png" alt="...">
                                    <p>$71.999</p>
                                    <h6>Short Nike Uno De Mujer</h6>
                                    <span>6 cuotas sin interés de $11.999,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 10 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer10.png" alt="...">
                                    <p>$27.999</p>
                                    <h6>Short Topper Training Basic De Mujer</h6>
                                    <span>6 cuotas sin interés de $4.666,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: Under Armour</li>
                                            <li>Talle: L</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 11 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer11.png" alt="...">
                                    <p>$60.999</p>
                                    <h6>Shorts for Training AEROREADY Minimal adidas Mujer</h6>
                                    <span>6 cuotas sin interés de $10.166,5</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- producto 12 -->
                            <div class="col-md-3">
                                <div class="product-card">
                                    <img src="assets/img/ShortMujer12.png" alt="...">
                                    <p>$46.499</p>
                                    <h6>Short Puma Better Essentials De Mujer</h6>
                                    <span>6 cuotas sin interés de $7.749,83</span>
                                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                                    <div class="caracteristicas">
                                        <ul>
                                            <li>Marca: adidas</li>
                                            <li>Talle: M</li>
                                            <li>Género: Mujer</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselShortsMujer" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselShortsMujer" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>   
            </div>
            <a href="<?php echo base_url('Comercializacion'); ?>">
                <img style="margin: 10px 0px; width: 100%;" src="assets/img/banner_cuotas.png" alt="">
            </a>
        </section>   
    </body>
</html>  