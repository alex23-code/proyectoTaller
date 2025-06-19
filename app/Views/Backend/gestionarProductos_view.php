<body>
    <h1 class="text-center">Actualizar Producto</h1>
    <div class="container">
        <div class="w-50 mx-auto">

        <?php if (!empty($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($validation as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <?php if(session('mensaje')) { ?>
            <div class="alert alert-success">
                <?= session('mensaje');?>
            </div>
        <?php } ?>

        <?php echo form_open_multipart("productosController/actualizarProducto/{$producto['producto_id']}") ?>

        <div class="form-group">
            <label for="titulo">Descripción:</label>
            <?php echo form_input([
                'name' => 'form_descripcion',
                'id' => 'form_descripcion',
                'class' => 'form-control',
                'placeholder' => 'Ingrese la descripción del producto',
                'value' => set_value('form_descripcion', $producto['descripcion'])
            ]); ?>
        </div>

        <div class="form-group">
            <label for="titulo">Precio</label>
            <?php echo form_input([
                'name' => 'form_precio',
                'id' => 'form_precio',
                'class' => 'form-control',
                'placeholder' => 'Ingrese el precio',
                'value' => set_value('form_precio', $producto['precio'])
            ]); ?>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
            <img src="<?= base_url('assets/uploads/' . $producto['producto_imagen']); ?>" alt="Imagen producto" height="50" width="50">
        </div>

        <div class="form-group">
            <label for="id_categoria">Categoría</label>
            <?php
                $lista['0'] = 'Seleccione categoría';
                foreach ($categorias as $row) {
                    $lista[$row['id_categoria']] = $row['descripcion'];
                }
                echo form_dropdown('id_categoria', $lista, $producto['id_categoria'], 'class="form-control"');
            ?>
        </div>

        <div class="form-group">
            <label for="id_tipo">Tipo</label>
            <?php
                $lista['0'] = 'Seleccione tipo';
                foreach ($tipo as $row) {
                    $lista[$row['id_tipo']] = $row['descripcion'];
                }
                echo form_dropdown('id_tipo', $lista, $producto['id_tipo'], 'class="form-control"');
            ?>
        </div>

        <div class="form-group">
            <label for="id_marca">Marca</label>
            <?php
                $lista['0'] = 'Seleccione marca';
                foreach ($marcas as $row) {
                    $lista[$row['id_marca']] = $row['descripcion'];
                }
                echo form_dropdown('id_marca', $lista, $producto['id_marca'], 'class="form-control"');
            ?>
        </div>

        <div class="form-group">
            <label for="stocks">Stock por talle</label>
            <?php foreach ($talles as $row): ?>
                <?php $stock = $stocksPorProducto[$producto['producto_id']][$row['id_talle']] ?? 0; ?>
                <div class="d-flex align-items-center">
                    <span><?= esc($row['descripcion']) ?>:</span>
                    <input type="number" name="stocks[<?= $row['id_talle'] ?>]" class="form-control ms-2" min="0" value="<?= set_value("stocks[{$row['id_talle']}]",$stock) ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-group mt-3">
            <?php echo form_submit('actualizar_producto', 'Guardar cambios', "class='btn btn-primary'"); ?>
        </div>

        <?php echo form_close(); ?>
    </div>
</body>