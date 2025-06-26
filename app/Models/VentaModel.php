<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaModel extends Model
{
    protected $table            = 'ventas';
    protected $primaryKey       = 'id_venta';
    protected $allowedFields    = [
        'persona_id',
        'metodo_pago',
        'total',
        'estado_pago',
        'fecha_estimada'
    ];
    protected $useTimestamps    = false; 
}