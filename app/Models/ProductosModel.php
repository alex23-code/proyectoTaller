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


    public function get_all_products_with_details() {
        return $this->select('productos.*, c.descripcion as categoria_descripcion, t.descripcion as tipo_descripcion')
                    ->join('categoria c', 'c.id_categoria = productos.id_categoria')
                    ->join('tipo t', 't.id_tipo = productos.id_tipo')
                    ->findAll();
    }

}