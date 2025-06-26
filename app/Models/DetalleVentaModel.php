<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleVentaModel extends Model
{
    protected $table         = 'detalle_venta';
    protected $primaryKey    = 'id';
    protected $allowedFields = [
        'venta_id',
        'producto_nombre',
        'id_talle',  
        'cantidad',
        'precio_unitario'
    ];
    protected $useTimestamps = false;
}