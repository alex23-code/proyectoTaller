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
                            <div class="row">
                                <?php for ($j = $start_index; $j < $end_index; $j++): 
                                    $producto = $products[$j];
                                    $producto_id = $producto['producto_id'];
                                    ?>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="product-card">
                                            <img src="<?= base_url('assets/uploads/' . $producto['producto_imagen']) ?>"
                                                alt="<?= esc($producto['descripcion']) ?>"
                                                class="img-fluid">

                                            <p class="mt-2">$<?= number_format($producto['precio'], 2, ',', '.') ?></p>
                                            <h6><?= esc($producto['descripcion']) ?></h6>

                                            <span>
                                                6 cuotas sin interés de $<?= number_format($producto['precio'] / 6, 2, ',', '.') ?>
                                            </span>

                                            <!-- Botón para abrir el modal -->
                                            <button class="btn btn-primary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#modalProducto<?= $producto_id ?>">
                                                <i class="fa-solid fa-cart-shopping"></i> Agregar
                                            </button>

                                            <div class="caracteristicas mt-2">
                                                <ul class="list-unstyled">
                                                    <li><strong>Talles:</strong>
                                                        <?php
                                                        $talles = $producto['talles'] ?? [];
                                                        $nombresTalles = array_column($talles, 'descripcion');
                                                        echo !empty($nombresTalles) ? esc(implode(', ', $nombresTalles)) : '—';
                                                        ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal para elegir talle y cantidad -->
                                   <div class="modal fade" id="modalProducto<?= $producto_id ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <form method="post" action="<?= base_url('carrito/agregar') ?>">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="producto_id" value="<?= esc($producto_id) ?>">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title"><?= esc($producto['descripcion']) ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <div class="modal-body">
                                                <label>Talle:</label>
                                                <select name="talle" class="form-select" required>
                                                    <?php 
                                                    $talles = $producto['talles'] ?? [];
                                                    foreach ($talles as $talle): ?>
                                                        <option value="<?= $talle['id_talle'] ?>">
                                                            <?= esc($talle['descripcion']) ?> (<?= $talle['cantidad'] ?> disponibles)
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <label class="mt-2">Cantidad:</label>
                                                <input type="number" name="cantidad" min="1" value="1" class="form-control" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Agregar</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if ($total_products == 0): ?>
                            <div class="carousel-item active">
                                <p class="text-center w-100 p-5">No hay productos disponibles en esta categoría.</p>
                            </div>
                        <?php endif; ?>
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
            <?php } ?>

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