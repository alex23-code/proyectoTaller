<?php

namespace App\Controllers;
use App\Models\ConsultasModel;

class ConsultasController extends BaseController
{
    
    public function formContacto() {
        $validation = \Config\Services::validation();
       $request = \Config\Services::request();

        $validation->setRules(
    [
                'nombre' => 'required|max_length[200]',
                'apellido' => 'required|max_length[200]',
                'correo' => 'required|valid_email',
                'telefono' => 'required|max_length[10]',
                
                'consulta' => 'required|max_length[250]|min_length[10]',
    ],
    [   // Errors
                'nombre' => [
                    'required' => 'El nombre es requerido',
                    'max_length'    => 'El nombre debe tener como máximo 200 caracteres',
                ],

                'apellido' => [
                    'required' => 'El apellido es requerido',
                    'max_length'    => 'El apellido debe tener como máximo 200 caracteres',
                ],

                'correo' => [
                    'required' => 'El correo electrónico es obligatorio',
                    'valid_email' => 'La dirección de correo debe ser válida',
                        ],

                'telefono' => [
                    'required' => 'El número de telefono es requerido',
                    'max_length'    => 'El número de telefono debe tener como máximo 10 caracteres',
                ],

                'consulta' => [
                    'required' => 'La consulta es requerido',
                    'min_length' =>'La consulta debe tener como mínimo 10 caracteres',
                    'max_length'    => 'La consulta debe tener como máximo 200 caracteres',
                ],
    ],
);

        if ($validation->withRequest($request)->run() ){

     $data = [

        'Nombre' => $request->getPost('nombre'),
        'Apellido' => $request->getPost('apellido'),
        'Correo' => $request->getPost('correo'),
        'NumTelefono' => $request->getPost('telefono'),
        
        'Consulta' => $request->getPost('consulta'),
            ];
           

               $consulta = new ConsultasModel();
               $consulta->insert($data);
               

              return redirect()->route('Contacto')->with('mensaje_consulta', 'Su consulta se envió exitosamente!');
                        
                } else {

            $data['titulo'] = 'Contacto';
            $data['validation'] = $validation->getErrors();
            return view('plantillas/header_view', $data).
            view('Contenidos/contacto_view').view('plantillas/footer_view');
        }
    }

    public function listarConsultas(){
        $consulta = new ConsultasModel();
        $data['consulta'] = $consulta->findAll();
        $data['titulo'] = 'Listado de Consultas';
        return view('plantillas/header_view', $data).
            view('Backend/listar_consultas', $data);
    }
}