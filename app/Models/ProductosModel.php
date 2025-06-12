<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductosModel extends Model
{
    protected $table      = 'productos';
    protected $primaryKey = 'producto_id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = 'false';

    protected $allowedFields = ['id_marca', 'precio', 'stock', 
    'estado', 'id_categoria', 'talla', 'descripcion'];
}