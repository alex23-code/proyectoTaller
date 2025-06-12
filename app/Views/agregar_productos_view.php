<h1 class="text-center">Registro de Productos</h1>
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

    <?php echo form_open_multipart('insertar_producto') ?>

    <div class="form-group">
        <label for="titulo">Descripcion:</label>
        <?php echo form_input(['name' => 'form_descripcion', 'id' => 'form_descripcion', 'class' => 'form-control','placeholder' => 'Ingrese la descripcion del producto', 'value'=>set_value('form_descripcion')]); ?>
    </div>

    <div class="form-group">
        <label for="titulo">Precio</label>
        <?php echo form_input(['name' => 'form_precio', 'id' => 'form_precio', 'class' => 'form-control','placeholder' => 'Ingrese el precio', 'value'=>set_value('form_precio')]); ?>
    </div>

    <div class="form-group">
        <label for="titulo">Stock</label>
        <?php echo form_input(['name' => 'form_stock', 'id' => 'form_stock', 'class' => 'form-control','placeholder' => 'Ingrese el stock', 'value'=>set_value('form_stock')]); ?>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen</label>
        <?php echo form_input(['name' => 'form_imagen', 'id' => 'form_imagen', 'type'=>'file', 'class' => 'form-control']); ?>
    </div>

<div class="form-group">
    <label for="categoria">Categoría</label>
    <?php
        $lista['0'] = 'Seleccione categoría';
        foreach ($categorias as $row) {
            $categoria_id = $row['id_categoria'];
            $categoria_desc = $row['descripcion'];
            $lista[$categoria_id] = $categoria_desc;
        }
        echo form_dropdown('categoria', $lista, '0', 'class="form-control"');
    ?>
</div>

<div class="form-group">
    <label for="marca">Marca</label>
    <?php
        $lista['1'] = 'Seleccione marca';
        foreach ($marcas as $row) {
            $id_marca = $row['id_marca'];
            $marca_desc = $row['descripcion'];
            $lista[$id_marca] = $marca_desc;
        }
        echo form_dropdown('marca', $lista, '1', 'class="form-control"');
    ?>
</div>

<div class="form-group">
    <label for="talle">Talle</label>
    <?php
        $lista['2'] = 'Seleccione el talle';
        foreach ($talles as $row) {
            $id_talle = $row['id_talle'];
            $talle_desc = $row['descripcion'];
            $lista[$id_talle] = $talle_desc;
        }
        echo form_dropdown('talle', $lista, '2', 'class="form-control"');
    ?>
</div>

<div class="form-group mt-3">
    <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-success'"); ?>
</div>

<?php echo form_close(); ?>
