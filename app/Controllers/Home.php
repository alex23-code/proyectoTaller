<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string {
        $data['titulo'] = "Index";

        $productoModel = new \App\Models\ProductosModel(); 
        $marcaModel = new \App\Models\MarcaModel();
        $categoriaModel = new \App\Models\CategoriaModel();
        $stockModel = new \App\Models\StockTallesModel();
        $talleModel = new \App\Models\TalleModel();

        $idRemeras = 1;
        $idShorts  = 2;
        $idHombre  = 1;
        $idMujer   = 2;

        $talles = $talleModel->findAll();
        $mapaTalles = [];
        foreach ($talles as $t) {
            $mapaTalles[$t['id_talle']] = $t['descripcion'];
        }

        $allProducts = $productoModel
            ->where('estado', 1)
            ->findAll();

        // Agregamos talles a cada producto en forma estructurada
        foreach ($allProducts as &$producto) {
            $stocks = $stockModel
                ->where('producto_id', $producto['producto_id'])
                ->where('stock >', 0)
                ->findAll();

            $tallesProducto = [];
            foreach ($stocks as $s) {
                $idTalle = $s['id_talle'];
                if (isset($mapaTalles[$idTalle])) {
                    $tallesProducto[] = [
                        'id_talle' => $idTalle,
                        'descripcion' => $mapaTalles[$idTalle],
                        'cantidad' => $s['stock']
                    ];
                }
            }

            $producto['talles'] = $tallesProducto;
        }
        unset($producto);

        // Separar según categoría y tipo
        $remeras_hombre = [];
        $shorts_hombre = [];
        $remeras_mujer = [];
        $shorts_mujer = [];

        foreach ($allProducts as $product) {
            $categoria = $product['id_categoria'];
            $tipo      = $product['id_tipo'];

            if ($categoria == $idRemeras && $tipo == $idHombre) {
                $remeras_hombre[] = $product;
            } elseif ($categoria == $idRemeras && $tipo == $idMujer) {
                $shorts_hombre[] = $product;
            } elseif ($categoria == $idShorts && $tipo == $idHombre) {
                $remeras_mujer[] = $product;
            } elseif ($categoria == $idShorts && $tipo == $idMujer) {
                $shorts_mujer[] = $product;
            }
        }

        $marcas_raw = $marcaModel->findAll(); 
        $marcasArray = []; 
        foreach ($marcas_raw as $m) {
            $marcasArray[$m['id_marca']] = $m['descripcion'];
        }

        $categorias_raw = $categoriaModel->findAll(); 
        $categoriasArray = []; 
        foreach ($categorias_raw as $g) {
            $categoriasArray[$g['id_categoria']] = $g['descripcion'];
        }

        $data = [
            'remeras_hombre' => $remeras_hombre,
            'shorts_hombre'  => $shorts_hombre,
            'remeras_mujer'  => $remeras_mujer,
            'shorts_mujer'   => $shorts_mujer,
            'marcas'         => $marcasArray,
            'categorias'     => $categoriasArray,
            'base_url'       => base_url(),
        ];

        return view('plantillas/header_view', $data)
            . view('Contenidos/principal_view', $data)
            . view('plantillas/footer_view');
    }



    public function somos(){
        $data['titulo'] = "Quienes Somos";
        return view('plantillas/header_view', $data).
        view('Contenidos/nosotros_view').view('plantillas/footer_view');
    }
    public function comercializacion() {
        $data['titulo'] = "Comercializacion";
        return view('plantillas/header_view', $data).
        view('Contenidos/comercializacion_view').view('plantillas/footer_view');
    }
    public function contacto() {
        $data['titulo'] = "Contacto";
        return view('plantillas/header_view', $data).
        view('Contenidos/contacto_view').view('plantillas/footer_view');
    }
    public function iniciarSesion() {
        $data['titulo'] = "Iniciar Sesion";
        return view('plantillas/header_view', $data).
        view('Contenidos/iniciarSesion_view').view('plantillas/footer_view');
    }
    public function terminos() {
        $data['titulo'] = "Terminos";
        return view('plantillas/header_view', $data).
        view('Contenidos/terminos').view('plantillas/footer_view');
    }
    public function crearUsuario() {
        $data['titulo'] = "Terminos";
        return view('plantillas/header_view', $data).
        view('Contenidos/crearUsuario_view').view('plantillas/footer_view');
    }


    public function listarVentas() {
        $data['titulo'] = "Lista de ventas";
        return view('Plantillas/adminNav_view', $data).
        view('Backend/listarVentas_view').view('Plantillas/footer_view');
    }
    public function gestionarProductos() {
        $data['titulo'] = "Gestion de productos";
        return view('Plantillas/adminNav_view', $data).
        view('Backend/gestionarProductos_view').view('Plantillas/footer_view');
    }
}