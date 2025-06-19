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
        <label for="imagen">Imagen</label>
        <?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'class' => 'form-control']); ?>
    </div>

    <div class="form-group">
        <label for="categoria">Categoría</label>
        <?php
            $lista['0'] = 'Seleccione categoría';
            foreach ($categorias as $row) {
                $lista[$row['id_categoria']] = $row['descripcion'];
            }
            echo form_dropdown('categoria', $lista, '0', 'class="form-control"');
        ?>
    </div>

    <div class="form-group">
        <label for="tipo">Tipo</label>
        <?php
            $lista['0'] = 'Seleccione tipo';
            foreach ($tipo as $row) {
                $lista[$row['id_tipo']] = $row['descripcion'];
            }
            echo form_dropdown('tipo', $lista, '0', 'class="form-control"');
        ?>
    </div>

    <div class="form-group">
        <label for="marca">Marca</label>
        <?php
            $lista['0'] = 'Seleccione marca';
            foreach ($marcas as $row) {
                $lista[$row['id_marca']] = $row['descripcion'];
            }
            echo form_dropdown('marca', $lista, '0', 'class="form-control"');
        ?>
    </div>

    <div class="form-group">
        <label for="stocks">Stock por talle</label>
        <?php foreach ($talles as $row): ?>
            <div class="d-flex align-items-center">
                <span><?= esc($row['descripcion']) ?>:</span>
                <input type="number" name="stocks[<?= $row['id_talle'] ?>]" class="form-control ms-2" min="0" placeholder="Ingrese stock">
            </div>
        <?php endforeach; ?>
    </div>

    <div class="form-group mt-3">
        <?php echo form_submit('insertar_producto', 'Agregar', "class='btn btn-success'"); ?>
    </div>

    <?php echo form_close(); ?>
