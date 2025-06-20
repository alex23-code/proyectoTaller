<!DOCTYPE html> 
<html>  
    <body> 
<!-- muestra errores de configuracion del usuario -->
        <?php if(session()->get('error')): ?>
            <div id="alerta" class="alerta">
                <h6>Hubo un error</h6>
                <span><?= implode('<br>', session('error')); ?></span>
                <button onclick="cerrarAlerta()" class="cerrar-alerta">&times;</button>
            </div>
        <?php endif; ?>
        <link href="assets/css/EstiloPrincipal.css" rel="stylesheet">
        <!-- carrousel -->
        <main class="Container-fluid">
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
            <section class="product-category-section">
            <div class="Category-title ">
            <h2 class="text-center mb-4">Catálogo de Productos</h2>
            </div>
            <!-- Catalogo para remeras de hombre -->
            <img style="margin: 10px 0px; width: 100%;" src="assets/img/banner_hombre.png" alt="">
            <?php
        function generate_product_carousel($id_carousel, $title, $products, $products_per_slide, $base_url) {
            $total_products = count($products);
            $num_slides = ceil($total_products / $products_per_slide);
            ?>
            <div class="Category-title mb-4">
                <h2 class="text-center mb-4 mt-5"><?php echo $title; ?></h2>
            </div>
            <div id="<?php echo $id_carousel; ?>" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    for ($i = 0; $i < $num_slides; $i++) {
                        $start_index = $i * $products_per_slide;
                        $end_index = min($start_index + $products_per_slide, $total_products);
                        $is_active = ($i === 0) ? 'active' : '';
                    ?>
                        <div class="carousel-item <?php echo $is_active; ?>">
                            <div class="row"> <?php
                                for ($j = $start_index; $j < $end_index; $j++) {
                                    $producto = $products[$j];
                                ?>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="product-card"
                                            data-id="<?= $producto['producto_id']; ?>"
                                            data-talles="<?= esc($producto['talles'] ?? ''); ?>">
                                            
                                            <img src="<?= base_url('assets/uploads/' . $producto['producto_imagen']); ?>"
                                                alt="<?= esc($producto['descripcion']); ?>"
                                                class="img-fluid">

                                            <p class="mt-2">$<?= number_format($producto['precio'], 2, ',', '.'); ?></p>
                                            
                                            <h6><?= esc($producto['descripcion']); ?></h6>

                                            <span>
                                                6 cuotas sin interés de $<?= number_format($producto['precio'] / 6, 2, ',', '.'); ?>
                                            </span>

                                            <form method="post" action="<?= base_url('carrito/agregar') ?>">
                                                <input type="hidden" name="id" value="<?= $producto['producto_id'] ?>">
                                                <button class="btn btn-primary mt-2" type="submit">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            </form>
                                            <div class="caracteristicas mt-2">
                                                <ul class="list-unstyled">
                                                    <li><strong>Talles:</strong>
                                                        <?php
                                                        $current_product_talles = json_decode($producto['talles'] ?? '[]', true);
                                                        echo !empty($current_product_talles) ? esc(implode(', ', $current_product_talles)) : '—';
                                                        ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div> 
                        </div> 
                    <?php
                    }
                    if ($total_products == 0) {
                        echo '<div class="carousel-item active"><p class="text-center w-100 p-5">No hay productos disponibles en esta categoría.</p></div>';
                    }
                    ?>
                </div>

                <?php if ($num_slides > 1): ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $id_carousel; ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $id_carousel; ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
                <?php endif; ?>
            </div>
            <?php
            }
            ?>

            <?php generate_product_carousel('remerasHombreCarousel', 'Remeras de Hombre', $remeras_hombre, 4, base_url()); ?>
            <?php generate_product_carousel('shortsHombreCarousel', 'Shorts de Hombre', $shorts_hombre, 4, base_url()); ?>
            <img style="margin: 10px 0px; width: 100%;" src="assets/img/banner_mujer.png" alt="">
            <?php generate_product_carousel('remerasMujerCarousel', 'Remeras de Mujer', $remeras_mujer, 4, base_url()); ?>
            <?php generate_product_carousel('shortsMujerCarousel', 'Shorts de Mujer', $shorts_mujer, 4, base_url()); ?>
            
            
            <a href="<?php echo base_url('Comercializacion'); ?>">
                <img style="margin: 10px 0px; width: 100%;" src="assets/img/banner_cuotas.png" alt="">
            </a>
        </main>   
    </body>
</html>  