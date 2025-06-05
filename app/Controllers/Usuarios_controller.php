<?php

namespace App\Controllers;

class Form extends BaseController
{
    $validation = \Config\Services :: validation();
    $request = \Config\Services :: request();
    protected $helpers = ['form'];

    public function index()
    {
        $validation = \Config\Services :: validation();
        $request = \Config\Services :: request();
        $validation = service('validation');

        if ($this->request->getMethod() !== 'post') {
            return view('Contenidos/Principal_view');
        }


        $validation->setRules([
            "email"    => ["required" => "Este campo es obligatorio" ,
            "max_length[50]" => "aasd"
            "valid_email" => "La direccion de correo debe ser valida",
            ]
            'password' => ["required" => "Este campo es obligatorio",
            "max_length[255]" => "asdasd",
            "min_length[10]" => "llkl",
            ]
        ],);

        if ($validation -> withRequest($request)->run()) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            $data['validation'] = $validation -> getErrors();
            return view("Plantillas/header_view", $data).view("Contenidos/Principal_view").view("Plantillas/footer");
        }else{
            // If you want to get the validated data.
            $validData = $this->validator->getValidated();

            return view('Contenidos/success');
        }
    }
}

    public function buscar_usuario(){
        $validation = \Config\Services :: validation();
        $request = \Config\Services :: request();
        $session = session();
    }
    
    public function add_cliente() {
    $validation = \Config\Services::validation();
    $request = \Config\Services::request();

    $validation->setRules(
        [
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|valid_email|is_unique[personas.persona_mail]',
            'pass' => 'required|min_length[8]',
            'repass' => 'required|min_length[8]|matches[pass]'
        ]

    // Errors
    // Completar los mensajes de las reglas de validación
    'correo' => [
        'required' => 'El correo es obligatorio',
        'is_unique' => 'El cliente ya se encuentra registrado',
    ],
    'repass' => [
        'required' => 'Repetir contraseña es obligatorio',
        'min_length' => 'Repetir contraseña debe tener como mínimo 8 caracteres',
        'matches' => 'Las contraseñas no coinciden',
    ],
    );
    if ($validation->withRequest($request)->run() ){
        $data = [
            'persona_apellido' => $request->getPost('apellido'),
            'persona_nombre' => $request->getPost('nombre'),
            'persona_mail' => $request->getPost('correo'),
            'persona_password' => password_hash($request->getPost('pass'), PASSWORD_BCRYPT),
            'perfil_id' => 2,
            'persona_estado' => 1
        ];

        $userRegister = new Usuarios_Model();
        $userRegister->insert($data);
        return redirect()->route('register')->with('mensaje', 'Su registro se realizó exitosamente!');
    } else {
        $data['titulo'] = 'Registrarse';
        $data['validation'] = $validation->getErrors();
        return view('plantillas/encabezado') . view('plantillas/nav') .
        view('contenido/crearUsuario_view') . view('plantillas/footer');
    }
}

