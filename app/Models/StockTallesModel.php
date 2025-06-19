<?php

namespace App\Models;

use CodeIgniter\Model;

class StockTallesModel extends Model
{
    protected $table = 'stock_talles';
    protected $primaryKey       = 'id_stock';

    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['producto_id', 'id_talle', 'stock'];
}
