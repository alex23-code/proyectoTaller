<?php
namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\ProductosModel;
use App\Models\MarcaModel;
use App\Models\TalleModel;
use App\Models\Usuarios_Model;
use App\Models\Tipo_Model;
use App\Models\StockTallesModel;
use App\Models\VentaModel;
use App\Models\Detalle_Venta_Model;
use App\Models\PagoTarjetaModel;

class ProductosController extends BaseController{

    public function catalogo() {
        $productoModel = new ProductosModel();
        $marcaModel = new MarcaModel();
        $categoriaModel = new CategoriaModel(); 
        $talleModel = new TalleModel();
        $stockModel = new StockTallesModel();

        $productos = $productoModel->where('estado', 1)->findAll();

        $marcas = $marcaModel->findAll();
        $marcasArray = [];
        foreach ($marcas as $m) {
            $marcasArray[$m['id_marca']] = $m['descripcion'];
        }

        $categorias = $categoriaModel->findAll();
        $categoriasArray = [];
        foreach ($categorias as $c) {
            $categoriasArray[$c['id_categoria']] = $c['descripcion'];
        }

        $talles = $talleModel->findAll();
        $mapaTalles = array_column($talles, 'descripcion', 'id_talle');

        foreach ($productos as &$p) {
            $producto_id = $p['producto_id'];
            $stocks = $stockModel->where('producto_id', $producto_id)->findAll();

            $p['talles'] = [];

            foreach ($stocks as $s) {
                $idTalle = $s['id_talle'];
                if (isset($mapaTalles[$idTalle])) {
                    $p['talles'][] = [
                        'id_talle' => $idTalle,
                        'descripcion' => $mapaTalles[$idTalle],
                        'cantidad' => $s['stock']
                    ];
                }
            }
        }

        $data['productos'] = $productos;
        $data['marcas'] = $marcasArray;
        $data['categorias'] = $categoriasArray;

        return view('Plantillas/header_view', $data)
            . view('Contenidos/catalogo_view')
            . view('Plantillas/footer_view');
    }



    public function agregarAlCarrito(){
        $activo = session()->has('login') && session()->get('login') === true;

        if (!$activo) {
            return redirect()->to(base_url('Iniciar_Sesion'))->with('msg', 'Debés iniciar sesión para agregar productos al carrito');
        }

        $request = $this->request->getPost();

        $productoId = $request['producto_id'] ?? null;
        $talle = $request['talle'] ?? null;
        $cantidad = isset($request['cantidad']) ? intval($request['cantidad']) : 1;

        if (!$productoId || !$talle) {
            return redirect()->back()->with('carro_ok', 'Faltan datos del producto o talle');
        }

        $productoModel = new ProductosModel();
        $stockModel = new StockTallesModel();

        $producto = $productoModel->find($productoId);
        $stock = $stockModel
            ->where('producto_id', $productoId)
            ->where('id_talle', $talle)
            ->first();

        if (!$producto || !$stock) {
            return redirect()->back()->with('carro_ok', 'Producto o stock inválido');
        }

        $stockDisponible = intval($stock['stock']);
        $clave = $productoId . '_' . $talle;

        $carrito = session()->get('carrito') ?? [];

        if (isset($carrito[$clave])) {
            $nuevaCantidad = $carrito[$clave]['cantidad'] + $cantidad;
            if ($nuevaCantidad > $stockDisponible) {
                $nuevaCantidad = $stockDisponible;
            }
            $carrito[$clave]['cantidad'] = $nuevaCantidad;
        } else {
            $carrito[$clave] = [
                'producto_id' => $productoId,
                'nombre' => $producto['descripcion'],
                'precio' => $producto['precio'],
                'imagen' => $producto['producto_imagen'],
                'talle' => $talle,
                'cantidad' => min($cantidad, $stockDisponible),
                'stock_disponible' => $stockDisponible
            ];
        }

        session()->set('carrito', $carrito);

        return redirect()->back()->with('carro_ok', 'Producto agregado al carrito 🛒');
    }



    public function verCarrito(){
        $carrito = session()->get('carrito') ?? [];

        $stockTallesModel = new StockTallesModel();
        $talleModel = new TalleModel();

        $todosLosTalles = $talleModel->findAll();
        $tallesMap = [];
        foreach ($todosLosTalles as $talle) {
            $tallesMap[$talle['id_talle']] = $talle['descripcion'];
        }

        $productosEnCarritoConDatosCompletos = [];

        foreach ($carrito as $clave => $productoEnSesion) {
            $producto_id = $productoEnSesion['producto_id'] ?? null;
            $id_talle = $productoEnSesion['talle'] ?? null;

            $stocksDelProducto = $stockTallesModel
                                    ->where('producto_id', $producto_id)
                                    ->where('stock >', 0)
                                    ->findAll();

            $tallesDisponiblesParaSelect = [];
            $stocksPorIdTalle = [];

            foreach ($stocksDelProducto as $filaStock) {
                $id_talle_stock = $filaStock['id_talle'];
                $stock = $filaStock['stock'];
                $descripcion = $tallesMap[$id_talle_stock] ?? 'Talle Desconocido';

                $tallesDisponiblesParaSelect[] = [
                    'id_talle' => $id_talle_stock,
                    'descripcion' => $descripcion
                ];
                $stocksPorIdTalle[$id_talle_stock] = $stock;
            }

            $productoEnSesion['talles'] = $tallesDisponiblesParaSelect;
            $productoEnSesion['stocks'] = $stocksPorIdTalle;
            $productoEnSesion['talleDescripcion'] = $tallesMap[$id_talle] ?? '—';

            $productosEnCarritoConDatosCompletos[$clave] = $productoEnSesion;
        }

        $data['carrito'] = $productosEnCarritoConDatosCompletos;

        return view('Plantillas/header_view', $data)
            . view('Contenidos/carrito_view')
            . view('Plantillas/footer_view');
    }


    public function eliminarDelCarro(){
        $clave = $this->request->getPost('clave');
        $carrito = session()->get('carrito');

        log_message('debug', 'Intentando eliminar clave: ' . $clave);
        log_message('debug', 'Claves del carrito: ' . implode(', ', array_keys($carrito ?? [])));

        if (!isset($carrito[$clave])) {
            return redirect()->back()->with('carro_ok', 'No se encontró ese producto en el carrito');
        }

        unset($carrito[$clave]);
        session()->set('carrito', $carrito);

        return redirect()->back()->with('carro_ok', 'Producto eliminado del carrito');
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
        
        'form_precio' => 'required|greater_than[0]',
        'form_stock' => 'required|greater_than[0]',
        'form_descripcion' => 'required|max_length[500]',

        // Completar las reglas de validación
        'categoria' => 'is_not_unique[categoria.id_categoria]',
        'marca' => 'is_not_unique[marca.id_marca]',
        'talle' => 'is_not_unique[talle.id_talle]',
        'imagen' => 'uploaded[imagen]|is_image[imagen]',
    ], 
       [
        // Mensajes de error

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
            'uploaded' => 'Debe seleccionar una imagen',
            'is_image' => 'Debe ser una imagen válida',
        ],
        
        'talle' => [
            'is_not_unique' => 'Debe seleccionar una categoría',
        ],
    ],
   );

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
            'precio' => $request->getPost('form_precio'),
            'stock' => $request->getPost('form_stock'),
            //'libro_descripcion' => $request->getPost('descripcion'),
            'producto_imagen' => $nombre_aleatorio,
            'id_categoria' => $request->getPost('categoria'),
            'id_talle' => $request->getPost('talle'),
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


    public function listarProductos()
{
    $marcaModel = new MarcaModel();
    $categoriaModel = new CategoriaModel();
    $talleModel = new TalleModel();
    $tipoModel = new Tipo_Model();
    $productoModel = new ProductosModel();
    $stockModel = new StockTallesModel();

    $termino = $this->request->getGet('buscar');
    
    $termino = $this->request->getGet('buscar');

if (!empty($termino)) {
    $productos = $productoModel
        ->select('productos.*, marca.descripcion AS nombre_marca')
        ->join('marca', 'marca.id_marca = productos.id_marca')
        ->groupStart()
            ->like('productos.descripcion', $termino)
            ->orLike('marca.descripcion', $termino)
        ->groupEnd()
        ->findAll();
} else {
    $productos = $productoModel
        ->select('productos.*, marca.descripcion AS nombre_marca')
        ->join('marca', 'marca.id_marca = productos.id_marca')
        ->findAll();
}


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
        'buscar' => $termino,
    ];

    return view('Plantillas/adminNav_view', $data)
         . view('Backend/listarProductos_view', $data);
}




    public function editarProducto($id) {
        $productoModel = new ProductosModel();
        $stockModel = new StockTallesModel();
        
        // Obtener datos del producto
        $data['producto'] = $productoModel->find($id);
        
        // Obtener talles y stock asociados al producto
        $talles_stock = $stockModel->where('producto_id', $id)->findAll();
        $stocksPorProducto = [];
        foreach ($talles_stock as $stock) {
            $stocksPorProducto[$stock['producto_id']][$stock['id_talle']] = $stock['stock'];
        }   


        $categoriaModel = new CategoriaModel();
        $marcaModel = new MarcaModel();
        $tipoModel = new Tipo_Model();
        $talleModel = new TalleModel();

        $data['stocksPorProducto'] = $stocksPorProducto;
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