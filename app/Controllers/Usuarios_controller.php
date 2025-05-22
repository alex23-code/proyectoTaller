<?php

namespace App\Controllers;

class Form extends BaseController
{
    $validation = \Config\Services :: validation();
    $request = \Config\Services :: request();
    protected $helpers = ['form'];

    public function index()
    {
        if (! $this->request->is('post')) {
            return view('signup');
        }

        $rules = [
            'password' => 'required|max_length[255]|min_length[10]',
            'passconf' => 'required|max_length[255]|matches[password]',
            'email'    => 'required|max_length[50]|valid_email',
        ];

        $signup_errors = [
            'email' => [
                'required' => 'You must choose a username.',
            ],
            'email' => [
                'valid_email' => 'Please check the Email field. It does not appear to be valid.',
            ]
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (! $this->validateData($data, $rules)) {
            return view('iniciarSesion.php');
        }

        // If you want to get the validated data.
        $validData = $this->validator->getValidated();

        return view('success');
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

