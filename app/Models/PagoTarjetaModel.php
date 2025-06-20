<?php

namespace App\Models;

use CodeIgniter\Model;

class PagoTarjetaModel extends Model
{
    protected $table      = 'pago_tarjeta';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_venta, numero_tarjeta, cvv, titular_nombre'];

}