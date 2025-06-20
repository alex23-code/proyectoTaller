<?php

namespace App\Models;

use CodeIgniter\Model;

class Detalle_Venta_Model extends Model
{
    protected $table      = 'detalle_venta';
    protected $primaryKey = 'id_producto';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
    'id_venta','detalle_cantidad',
    'detalle_precio', 'Nombre', 'Apellido', 'Dni', 'Correo', 'Direccion'
];
}