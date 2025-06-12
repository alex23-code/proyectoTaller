<h1 class="text-center">Registro de libros</h1>
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

    <?php echo form_open_multipart('insertar_ropa') ?>

    <div class="form-group">
        <label for="titulo">Marca de ropa</label>
        <?php echo form_input(['name' => 'marca', 'id' => 'marca', 'class' => 'form-control','placeholder' => 'Ingrese la marca', 'value'=>set_value('marca')]); ?>
    </div>

    <div class="form-group">
        <label for="titulo">Precio</label>
        <?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder' => 'Ingrese el precio', 'value'=>set_value('precio')]); ?>
    </div>

    <div class="form-group">
        <label for="titulo">Stock</label>
        <?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control','placeholder' => 'Ingrese el stock', 'value'=>set_value('stock')]); ?>
    </div>

    <div class="form-group">
        <label for="titulo">Estado de ropa</label>
        <?php echo form_input(['name' => 'estado', 'id' => 'estado', 'class' => 'form-control','placeholder' => 'Ingrese el estado de la ropa', 'value'=>set_value('estado')]); ?>
    </div>

    <div class="form-group">
        <label for="titulo">Talla</label>
        <?php echo form_input(['name' => 'talla', 'id' => 'talla', 'class' => 'form-control','placeholder' => 'Ingrese la talla', 'value'=>set_value('talla')]); ?>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen</label>
        <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'class' => 'form-control']); ?>
    </div>

<div class="form-group">
    <label for="categoria">Categoría</label>
    <?php
        $lista['0'] = 'Seleccione categoría';
        foreach ($categorias as $row) {
            $categoria_id = $row['categoria_id'];
            $categoria_desc = $row['categoria_desc'];
            $lista[$categoria_id] = $categoria_desc;
        }
        echo form_dropdown('categoria', $lista, '0', 'class="form-control"');
    ?>
</div>

<div class="form-group mt-3">
    <?php echo form_submit('Agregar', 'Agregar', "class='btn btn-success'"); ?>
</div>

<?php echo form_close(); ?>
