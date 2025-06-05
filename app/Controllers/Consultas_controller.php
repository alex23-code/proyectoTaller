<?php
namespace App\Controllers;
use App\Models\ConsultasModel;

class Consultas_controller extends BaseController{
    
    

    public function addConsulta()
    {
        $validation = \Config\Services :: validation();
        $request = \Config\Services::request();

        $validation->setRules( 
            [
                'nombre' => 'required|max_length[150]',
                'correo' => 'required|valid_email',
                'telefono' => 'required|max_length[10]',
                'nroPedido' => 'required',
                'consulta' => 'required|max_length[250]|min_length[10]',
            ],

            [   // Errors
            'nombre' => [
                'required' => 'El nombre es requerido',
            ],

            'correo' => [
                'required' => 'El correo electrónico es obligatorio',
                'valid_email' => 'La dirección de correo debe ser válida',
                    ],

            'telefono'   => [
                'required'      => 'El telefono es obligatorio',
                'max_length'    => 'El número debe tener 9 digitos sin 0 ni 15',
                    ],
            'nroPedido' => [
                'required'     => 'El numero de pedido es requerido',
            ],

            'consulta' => [
                'required' => 'La consulta es requerida',
                'min_length' =>'La consulta debe tener como mínimo 10 caracteres',
                'max_length'    => 'La consulta debe tener como máximo 200 caracteres',
            ],
        ],

        );
        if (!$validation->withRequest($request)->run() ){

        $data = [
            'nombre' => $request->getPost('nombre'),
            'correo' => $request->getPost('correo'),
            'telefono' => $request->getPost('telefono'),
            'nroPedido' => $request->getPost('nroPedido'),
            'consulta' => $request->getPost('consulta'),
            ];

            $consulta = new ConsultasModel();
            $consulta->insert($data);

            return redirect()->route('consultas')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
                
         }else{

            $data['titulo'] = 'Contacto';
            $data['validation'] = $validation->getErrors();
            return view('plantillas/header_view', $data).
            view('Contenidos/contacto_view').view('plantillas/footer_view');
        }
    }
}