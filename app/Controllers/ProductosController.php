<?php
namespace App\Controllers;
use App\Models\CategoriaModel;
use App\Models\ProductosModel;
use App\Models\MarcaModel;
use App\Models\TalleModel;

class ProductosController extends BaseController{
    public function agregar_producto() {
          $categoria = new CategoriaModel();
          $data['categorias'] = $categoria->findAll();

          $marca = new MarcaModel();
          $data['marcas'] = $marca->findAll();

          $talle = new TalleModel();
          $data['talles'] = $talle->findAll();

          $data['titulo'] = 'Agregar_producto';
          return view('plantillas\header_view', $data).view('navegar_admin_view').view('agregar_productos_view');
    }

public function registrar_producto() {
    // Procesa los datos del producto enviados por el formulario
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
            'greater_than' => 'Stock debe ser un valor mayor a 0',
        ],

        'form_descripcion' => [
            'required' => 'El campo marca es obligatorio',
            'max_length' => 'Marca debe contener 500 caracteres como maximo',
        ],

        'categoria' => [
            'is_not_unique' => 'Debe seleccionar una categoría',
        ],

        'marca' => [
            'is_not_unique' => 'Debe seleccionar una categoría',
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

        $data = [
            'id_marca' => $request->getPost('marca'),
            'precio' => $request->getPost('form_precio'),
            'stock' => $request->getPost('form_stock'),
            //'libro_descripcion' => $request->getPost('descripcion'),
            'imagen' => $nombre_aleatorio,
            'id_categoria' => $request->getPost('categoria'),
            'estado' => 1,
            'descripcion' => $request->getPost('form_descripcion'),
        ];

        $producto = new ProductosModel();
        $producto->insert($data);

        return redirect()->route('agregar')->with('mensaje', 'El producto se registró correctamente!');
    } else {
        $categoria = new CategoriaModel();
        $marca = new MarcaModel();
        $talle = new TalleModel();
        $data['validation'] = $validation->getErrors();
        $data['categorias'] = $categoria->findAll();
        $data['marcas'] = $marca->findAll();
        $data['talles'] = $talle->findAll();
        $data['titulo'] = 'Agregar_producto';

        return view('plantillas/header_view', $data).view('navegar_admin_view').view('agregar_productos_view');
    }
}

}