<?php
namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\ProductosModel;
use App\Models\MarcaModel;
use App\Models\TalleModel;
use App\Models\Tipo_Model;

class ProductosController extends BaseController{

    public function agregarProducto() {
          $categoria = new CategoriaModel();
          $data['categorias'] = $categoria->findAll();

          $tipo = new Tipo_Model();
          $data['tipo'] = $tipo->findAll();

          $marca = new MarcaModel();
          $data['marcas'] = $marca->findAll();

          $talle = new TalleModel();
          $data['talles'] = $talle->findAll();

          $data['titulo'] = 'Agregar_producto';
          return view('Plantillas\adminNav_view', $data).view('Backend/agregar_productos_view');
    }

    public function registrar_producto() {
        // Procesa los datos del producto enviados por el formulario
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            
            'form_precio' => 'required|greater_than[0]',
            'form_stock' => 'required',
            'form_descripcion' => 'required|max_length[500]',

            // Completar las reglas de validación
            'categoria' => 'is_not_unique[categoria.id_categoria]',
            'tipo' => 'is_not_unique[tipo.id_tipo]',
            'marca' => 'is_not_unique[marca.id_marca]',
            'talle' => 'is_not_unique[talle.id_talle]',
            'imagen' => 'uploaded[imagen]|max_size[imagen, 4096]|is_image[imagen]',
        ], 
        [
            // Mensajes de error

            'form_precio' => [
                'required' => 'El campo precio es obligatorio',
                'greater_than' => 'Precio debe ser un valor mayor a 0',
            ],

            'form_stock' => [
                'required' => 'El campo stock es obligatorio',
            ],

            'form_descripcion' => [
                'required' => 'El campo marca es obligatorio',
                'max_length' => 'Marca debe contener 500 caracteres como maximo',
            ],

            'categoria' => [
                'is_not_unique' => 'Debe seleccionar una categoría',
            ],

            'tipo' => [
                'is_not_unique' => 'Debe seleccionar un tipo',
            ],

            'talle' => [
                'is_not_unique' => 'Debe seleccionar una talle',
            ],

            'marca' => [
                'is_not_unique' => 'Debe seleccionar una marca',
            ],

            'imagen' => [
                'uploaded' => 'Debe seleccionar una imagen',
                'is_image' => 'Debe ser una imagen válida',
            ],

        ],
        );

        if ($validation->withRequest($request)->run()) {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'public/assets/uploads', $nombre_aleatorio);

            $stock = $request->getPost('form_stock');
            $estado = ($stock > 0) ? 1 : 0;

            $data = [
                'id_marca' => $request->getPost('marca'),
                'precio' => $request->getPost('form_precio'),
                'stock' => $stock,
                'producto_imagen' => $nombre_aleatorio,
                'id_categoria' => $request->getPost('categoria'),
                'id_tipo' => $request->getPost('tipo'),
                'id_talle' => $request->getPost('talle'),
                'estado' => $estado,
                'descripcion' => $request->getPost('form_descripcion'),
            ];

            $producto = new ProductosModel();
            $producto->insert($data);

            return redirect()->route('Registrar_productos')->with('mensaje', 'El producto se registró correctamente!');
        } else {
            $categoria = new CategoriaModel();
            $marca = new MarcaModel();
            $talle = new TalleModel();
            $tipo = new Tipo_Model();
            $data['validation'] = $validation->getErrors();
            $data['categorias'] = $categoria->findAll();
            $data['tipo'] = $tipo->findAll();
            $data['marcas'] = $marca->findAll();
            $data['talles'] = $talle->findAll();
            $data['titulo'] = 'Agregar_producto';

            return view('plantillas/adminNav_view', $data).view('Backend/agregar_productos_view');
        }
    }



    public function listarProductos() {
        $marcas = [];
foreach ((new MarcaModel())->findAll() as $marca) {
    $marcas[$marca['id_marca']] = $marca['descripcion'];
}

$categorias = [];
foreach ((new CategoriaModel())->findAll() as $cat) {
    $categorias[$cat['id_categoria']] = $cat['descripcion'];
}

$talles = [];
foreach ((new TalleModel())->findAll() as $talle) {
    $talles[$talle['id_talle']] = $talle['descripcion'];
}

$tipos = [];
foreach ((new Tipo_Model())->findAll() as $tipo) {
    $tipos[$tipo['id_tipo']] = $tipo['descripcion'];
}

$data['marcas'] = $marcas;
$data['categorias'] = $categorias;
$data['talles'] = $talles;
$data['tipos'] = $tipos;
        $ProductoModel = new ProductosModel();
        $data['marcas'] = $marcas;
        $data['categorias'] = $categorias;
        $data['talles'] = $talles;
        $data['tipos'] = $tipos;
        $data['productos'] = $ProductoModel->findAll();
        return view('Plantillas/adminNav_view', $data) . view('Backend/listarProductos_view');
    }


    public function editarProducto($id) {
        $productoModel = new ProductosModel();
        $data['producto'] = $productoModel->find($id);
        return view('productos/editar', $data);
    }

    public function actualizarProducto($id) {
        $productoModel = new ProductosModel();
        $request = \Config\Services::request();

        // Datos modificados del formulario
        $data = [
            'descripcion' => $request->getPost('descripcion'),
            'id_marca' => $request->getPost('id_marca'),
            'id_categoria' => $request->getPost('id_categoria'),
            'id_talle' => $request->getPost('id_talle'),
            'precio' => $request->getPost('precio'),
            'stock' => $request->getPost('stock'),
            'estado' => $request->getPost('estado')
        ];

        // Actualizar el producto en la BD
        if ($productoModel->update($id, $data)) {
            return redirect()->to('/productos')->with('success', 'Producto actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar el producto.');
        }
    }

    public function eliminarProducto($id) {
        $productoModel = new ProductosModel();
        $productoModel->delete($id);

        return redirect()->to('/productos')->with('success', 'Producto eliminado correctamente.');
    }

    public function activarProducto($id) {
        $productoModel = new ProductosModel();
        
        // Cambiar el estado del producto a activo (1)
        $productoModel->update($id, ['estado' => 1]);

        return redirect()->to('/productos')->with('success', 'Producto activado correctamente.');
    }









    function gestionar_libros()
{
    $producto_Model = new ProductoModel();
    $categoria = new CategoriaModel();
    $data['categorias'] = $categoria->findAll();
    $data['producto'] = $producto_Model->join('producto_categoria', 'producto_categoria.categoria_id = producto_categoria.categoria_id')->findAll();
    $data['titulo'] = 'listar libro';

    return view('Plantillas/nav_view')
        .view('Backend/listar_libros_view');
}

    function editar_libro($id=null)
    {
        $_libro_Model = new Libro_Model();
        $categoria = new Categoria_Model();
        $data['categorias'] = $categoria->findAll();
        $data['libro'] = $_libro_Model->where('libro_id', $id)->first();
        $data['titulo'] = 'Edición libro';

        return view('plantillas/adminNav')
            .view('Backend/Libros/editar_libro_view');
    }   

    function actualizar_libro()
    {
        $request = \Config\Services::request();
        // Validar los datos ingresados
        // Controlar si se cambió la imagen

        $id = $request->getPost('id'); // Se obtiene el id del producto a modificar
        $data = [
            'libro_titulo' => $request->getPost('titulo'),
            //Completar con los demás datos ingresados
        ];

        $_libro = new Libro_Model();
        $_libro->update($id, $data);
        // Mensaje que se actualizó correctamente el libro
        return redirect()->route('gestionar');
    }
}