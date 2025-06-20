<?php
namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\ProductosModel;
use App\Models\MarcaModel;
use App\Models\TalleModel;
use App\Models\Tipo_Model;
use App\Models\StockTallesModel;

class ProductosController extends BaseController{

    public function catalogo() {
        $productoModel = new ProductosModel();
        $marcaModel = new MarcaModel();
        $categoriaModel = new CategoriaModel(); 
        $talleModel = new TalleModel();
        $stockModel = new StockTallesModel();

        $data['productos'] = $productoModel->where('estado', 1)->findAll();
        $productos = $data['productos'];

        $marcas = $marcaModel->findAll();
        $marcasArray = [];
        foreach ($marcas as $m) {
            $marcasArray[$m['id_marca']] = $m['descripcion'];
        }

        $categorias = $categoriaModel->findAll();
        $categoriasArray = [];
        foreach ($categorias as $g) {
            $categoriasArray[$g['id_categoria']] = $g['descripcion'];
        }

        $talles = $talleModel->findAll();
        $mapaTalles = array_column($talles, 'descripcion', 'id_talle');

        $tallesPorProducto = [];

        foreach ($productos as $productos) {
            $producto_id = $productos['producto_id'];
            $stocks = $stockModel
                ->where('producto_id', $producto_id)
                ->findAll();

            foreach ($stocks as $s) {
                $idTalle = $s['id_talle'];
                if (isset($mapaTalles[$idTalle])) {
                    $tallesPorProducto[$producto_id][] = $mapaTalles[$idTalle];
                }
            }
        }
        $data['tallesPorProducto'] = $tallesPorProducto;

        $data['marcas'] = $marcasArray;
        $data['categorias'] = $categoriasArray;
        $data['tallesPorProducto'] = $tallesPorProducto;

        return view('Plantillas/header_view', $data)
            . view('Contenidos/catalogo_view')
            . view('Plantillas/footer_view');
    }



    public function agregarAlCarrito(){
        $carrito = session()->get('carrito') ?? [];
        $id_producto = $this->request->getPost('id');

        $productoModel = new ProductosModel();

        $producto = $productoModel->find($id_producto);

        if (!$producto) {
            return redirect()->back()->with('carro_ok', 'Producto no encontrado');
        }

        $productoCarrito = [
            'id' => $producto['producto_id'],
            'nombre' => $producto['descripcion'],
            'precio' => $producto['precio'],
            'imagen' => $producto['producto_imagen'],
            'cantidad' => 1,
            'talleSeleccionado' => null // Se seleccionará en la vista del carrito
        ];

        $encontrado = false;
        foreach ($carrito as &$item) {
            if ($item['id'] === $producto['producto_id']) {
                $item['cantidad']++;
                $encontrado = true;
                break;
            }
        }
        unset($item);

        if (!$encontrado) {
            $carrito[] = $productoCarrito;
        }

        session()->set('carrito', $carrito);

        return redirect()->back()->with('carro_ok', 'Producto agregado al carrito 🛒');
    }


    public function verCarrito(){
        $carrito = session()->get('carrito') ?? [];

        $stockTallesModel = new StockTallesModel();
        $talleModel = new TalleModel();

        $productosEnCarritoConDatosCompletos = []; 


        $todosLosTalles = $talleModel->findAll();
        $tallesMap = [];
        foreach ($todosLosTalles as $talle) {
            $tallesMap[$talle['id_talle']] = $talle['descripcion'];
        }

        foreach ($carrito as $productoEnSesion) {
            $id_producto = $productoEnSesion['id'];

            $stocksDelProducto = $stockTallesModel
                                    ->where('producto_id', $id_producto)
                                    ->where('stock >', 0) 
                                    ->findAll();

            $tallesDisponiblesParaSelect = [];
            $stocksPorIdTalle = [];

            foreach ($stocksDelProducto as $filaStock) {
                $id_talle = $filaStock['id_talle'];
                $stock = $filaStock['stock'];

                $descripcion = $tallesMap[$id_talle] ?? 'Talle Desconocido';


                $tallesDisponiblesParaSelect[] = [
                    'id_talle' => $id_talle,
                    'descripcion' => $descripcion
                ];
                $stocksPorIdTalle[$id_talle] = $stock;
            }

            $productoEnSesion['talles'] = $tallesDisponiblesParaSelect; 
            $productoEnSesion['stocks'] = $stocksPorIdTalle;          

            if (empty($tallesDisponiblesParaSelect)) {
                $productoEnSesion['talleSeleccionado'] = null;
            } elseif ($productoEnSesion['talleSeleccionado'] === null || !in_array($productoEnSesion['talleSeleccionado'], array_column($tallesDisponiblesParaSelect, 'id_talle'))) {
                $productoEnSesion['talleSeleccionado'] = $tallesDisponiblesParaSelect[0]['id_talle'] ?? null;
            }


            $productosEnCarritoConDatosCompletos[] = $productoEnSesion;
        }

        $data['carrito'] = $productosEnCarritoConDatosCompletos;

        return view('Plantillas/header_view', $data)
            . view('Contenidos/carrito_view') 
            . view('Plantillas/footer_view');
    }


    public function eliminarDelCarro(){
        $carrito = session()->get('carrito') ?? [];
        $idAEliminar = $this->request->getPost('id');

        $carritoActualizado = array_filter($carrito, function($producto) use ($idAEliminar) {
            return $producto['id'] !== $idAEliminar;
        });

        session()->set('carrito', array_values($carritoActualizado)); 

        return redirect()->back()->with('carro_ok', 'Producto eliminado del carrito 🗑️');
    }


    public function agregarProducto() {
    $categoria = new CategoriaModel();
    $data['categorias'] = $categoria->findAll();

    $tipo = new Tipo_Model();
    $data['tipo'] = $tipo->findAll();

    $marca = new MarcaModel();
    $data['marcas'] = $marca->findAll();

    $talle = new TalleModel();
    $data['talles'] = $talle->findAll(); 

    $data['titulo'] = 'Agregar producto';
    return view('Plantillas/adminNav_view', $data).view('Backend/agregar_productos_view');
}

    public function registrar_producto() {
    $validation = \Config\Services::validation();
    $request = \Config\Services::request();

    $validation->setRules([
        'form_precio' => [
            'rules' => 'required|greater_than[0]',
            'errors' => [
                'required' => 'El campo precio es obligatorio.',
                'greater_than' => 'El precio debe ser un valor mayor a 0.'
            ]
        ],
        'form_descripcion' => [
            'rules' => 'required|max_length[500]',
            'errors' => [
                'required' => 'El campo descripción es obligatorio.',
                'max_length' => 'La descripción debe contener un máximo de 500 caracteres.'
            ]
        ],
        'categoria' => [
            'rules' => 'is_not_unique[categoria.id_categoria]',
            'errors' => [
                'is_not_unique' => 'Debe seleccionar una categoría válida.'
            ]
        ],
        'tipo' => [
            'rules' => 'is_not_unique[tipo.id_tipo]',
            'errors' => [
                'is_not_unique' => 'Debe seleccionar un tipo válido.'
            ]
        ],
        'marca' => [
            'rules' => 'is_not_unique[marca.id_marca]',
            'errors' => [
                'is_not_unique' => 'Debe seleccionar una marca válida.'
            ]
        ],
        'imagen' => [
            'rules' => 'uploaded[imagen]|max_size[imagen,4096]|is_image[imagen]',
            'errors' => [
                'uploaded' => 'Debe seleccionar una imagen.',
                'max_size' => 'La imagen debe tener un tamaño máximo de 4MB.',
                'is_image' => 'Debe ser una imagen válida en formato JPG, PNG o GIF.'
            ]
        ]
    ]);

    if ($validation->withRequest($request)->run()) {
        // Procesar imagen
        $img = $this->request->getFile('imagen');
        $nombre_aleatorio = $img->getRandomName();
        $img->move(ROOTPATH.'public/assets/uploads', $nombre_aleatorio);

        // Procesar precio
        $precioRaw = $request->getPost('form_precio');
        $precio = str_replace('.', '', $precioRaw);
        $precio = floatval($precio);

        $productoData = [
            'id_marca' => $request->getPost('marca'),
            'precio' => $precio,
            'producto_imagen' => $nombre_aleatorio,
            'id_categoria' => $request->getPost('categoria'),
            'id_tipo' => $request->getPost('tipo'),
            'estado' => 1,
            'descripcion' => $request->getPost('form_descripcion'),
        ];

        $productoModel = new ProductosModel();
        $productoModel->insert($productoData);

        $producto_id = $productoModel->insertID();

        $talles = $request->getPost('stocks'); 

        // convertir no numéricos o vacíos a 0
        $tallesNormalizados = array_map(fn($stock) => is_numeric($stock) ? (int)$stock : 0, $talles);

        $tallesConStock = array_filter($tallesNormalizados, fn($stock) => $stock > 0);


        $stockModel = new StockTallesModel();
        foreach ($tallesConStock as $talle_id => $stock) {
            $stockModel->insert([
                'producto_id' => $producto_id,
                'id_talle' => $talle_id,
                'stock' => $stock
            ]);
        }


        return redirect()->route('Registrar_productos')->with('mensaje', 'El producto se registró correctamente!');
        } else {
            $categoria = new CategoriaModel();
            $marca = new MarcaModel();
            $tipo = new Tipo_Model();
            $talle = new TalleModel();
            $data['talles'] = $talle->findAll(); 
            $data['validation'] = $validation->getErrors();
            $data['categorias'] = $categoria->findAll();
            $data['tipo'] = $tipo->findAll();
            $data['marcas'] = $marca->findAll();
            $data['titulo'] = 'Agregar producto';
            return view('plantillas/adminNav_view', $data).view('Backend/agregar_productos_view');
        }
    }


    public function listarProductos() {
        $marcaModel = new MarcaModel();
        $categoriaModel = new CategoriaModel();
        $talleModel = new TalleModel();
        $tipoModel = new Tipo_Model();
        $productoModel = new ProductosModel();
        $stockModel = new StockTallesModel();

        $productos = $productoModel->findAll();
        $stocksPorProducto = [];

        
        foreach ($productos as $producto) {
            $producto_id = $producto['producto_id'];
            $stocks = $stockModel
                ->where('producto_id', $producto_id)
                ->findAll();

            foreach ($stocks as $s) {
                $stocksPorProducto[$producto_id][$s['id_talle']] = $s['stock'];
            }
        }


        $marcas = [];
        foreach ($marcaModel->findAll() as $marca) {
            $marcas[$marca['id_marca']] = $marca['descripcion'];
        }

        $categorias = [];
        foreach ($categoriaModel->findAll() as $categoria) {
            $categorias[$categoria['id_categoria']] = $categoria['descripcion'];
        }

        $tipos = [];
        foreach ($tipoModel->findAll() as $tipo) {
            $tipos[$tipo['id_tipo']] = $tipo['descripcion'];
        }

        $talles = $talleModel->findAll();

        $data = [
            'productos' => $productos,
            'marcas' => $marcas,
            'categorias' => $categorias,
            'tipos' => $tipos,
            'talles' => $talles,
            'stocksPorProducto' => $stocksPorProducto,
        ];

        return view('Plantillas/adminNav_view', $data)
            . view('Backend/listarProductos_view');
    }



    public function editarProducto($id) {
        $productoModel = new ProductosModel();
        $stockModel = new StockTallesModel();
        
        // Obtener datos del producto
        $data['producto'] = $productoModel->find($id);
        
        // Obtener talles y stock asociados al producto
        $data['talles_stock'] = $stockModel->where('producto_id', $id)->findAll();

        $categoriaModel = new CategoriaModel();
        $marcaModel = new MarcaModel();
        $tipoModel = new Tipo_Model();
        $talleModel = new TalleModel();

        $data['categorias'] = $categoriaModel->findAll();
        $data['marcas'] = $marcaModel->findAll();
        $data['tipo'] = $tipoModel->findAll();
        $data['talles'] = $talleModel->findAll();  

        return view('plantillas/adminNav_view', $data).view('Backend/gestionarProductos_view');
    }

    public function actualizarProducto($id) {
        $productoModel = new ProductosModel();
        $stockModel = new StockTallesModel();
        $request = \Config\Services::request();

        $productoActual = $productoModel->find($id);
        if (!$productoActual) {
            return redirect()->back()->with('error', 'Producto no encontrado.');
        }

        // Usa los datos existentes si no se enviaron nuevos valores
        $data = [
            'descripcion' => $request->getPost('form_descripcion') ?: $productoActual['descripcion'],
            'id_marca' => $request->getPost('id_marca') ?: $productoActual['id_marca'],
            'id_categoria' => $request->getPost('id_categoria') ?: $productoActual['id_categoria'],
            'id_tipo' => $request->getPost('id_tipo') ?: $productoActual['id_tipo'],
            'precio' => $request->getPost('form_precio') !== null && $request->getPost('form_precio') !== ''
                ? floatval($request->getPost('form_precio')): $productoActual['precio'],
            'estado' => null
        ];


        $imagen = $request->getFile('imagen');
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombre_aleatorio = $imagen->getRandomName();
            $imagen->move(ROOTPATH.'public/assets/uploads', $nombre_aleatorio);
            $data['producto_imagen'] = $nombre_aleatorio;
        }

        // Actualizar producto
        if (!$productoModel->update($id, $data)) {
            return redirect()->back()->with('error', 'Error al actualizar el producto.');
        }

        // Actualiza stock 
        $stocks = $request->getPost('stocks');
        if (is_array($stocks)) {
            $stocks = array_filter($stocks, fn($stock) => is_numeric($stock) && $stock >= 0);
            $stockModel->where('producto_id', $id)->delete();
            foreach ($stocks as $talle_id => $stock) {
                $stockModel->insert([
                    'producto_id' => $id,
                    'id_talle' => $talle_id,
                    'stock' => $stock
                ]);
            }
        }

        return redirect()->to('Listar_productos')->with('success', 'Producto actualizado correctamente.');
    }



   public function desactivarProducto($id) {
    $productoModel = new ProductosModel();
    $productoModel->update($id, ['estado' => 0]);

    return redirect()->to('Listar_productos')->with('success', 'Producto desactivado correctamente.');
}

public function activarProducto($id) {
    $productoModel = new ProductosModel();
    $productoModel->update($id, ['estado' => 1]);

    return redirect()->to('Listar_productos')->with('success', 'Producto activado correctamente.');
}


    public function guardar(){
        $carritoData = $this->request->getJSON(true);
        session()->set('carrito', $carritoData);
        return $this->response->setJSON([
            'success' => true,
            'items' => count($carritoData)
        ]);
    }

    public function obtenerTalles($idProducto){
        $db = \Config\Database::connect();
        $builder = $db->table('talles_productos');
        $builder->select('talle');
        $builder->where('producto_id', $idProducto);
        $query = $builder->get();
        $talles = array_column($query->getResultArray(), 'talle');

        return $this->response->setJSON($talles);
}

    
}