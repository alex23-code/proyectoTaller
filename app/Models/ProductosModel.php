<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'producto_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_marca', 'precio', 'stock', 'producto_imagen',
    'estado', 'id_categoria', 'id_tipo','id_talle', 'descripcion'];
}