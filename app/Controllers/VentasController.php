<?php 
namespace App\Controllers;
use App\Models\VentaModel;
use App\Models\ProductosModel;

class VentasController extends BaseController {
    public function listarVentas(){
        $venta = new VentaModel();
        $producto = new ProductosModel();

    $data['ventas'] = $venta->join('productos', 'venta.id_producto = productos.producto_id')->findAll();
    $data['titulo'] = "Listado de Ventas";
        return view('plantillas/header_view', $data).
            view('Backend/form_compra', $data);
    }
}


