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

    protected $allowedFields = ['id_marca', 'precio', 'producto_imagen', 
                                'estado', 'id_categoria', 'id_tipo', 'descripcion'];

    /**
     * Obtener talles y stock del producto
     */
    public function obtenerStockTalles($producto_id)
    {
        $db = \Config\Database::connect();
        $query = $db->table('stock_talles')
                    ->select('id_talle, stock')
                    ->where('producto_id', $producto_id)
                    ->get();

        return $query->getResultArray();
    }
}