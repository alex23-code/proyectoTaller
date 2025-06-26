<?php

namespace App\Controllers;

use App\Models\Consulta_model;
use App\Models\Perfil_model;
use App\Models\Usuarios_model;

class Usuarios_controller extends BaseController
{


    public function inicio(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();
        $redirect = $this->request->getGet('redirect');


        $validation->setRules([
            "email" => [
                "rules" => "required|max_length[50]|valid_email",
                "errors" => [
                    "required" => "Ingresa un correo electronico",
                    "max_length" => "El email no puede superar los 50 caracteres",
                    "valid_email" => "La dirección de correo debe ser válida"
                ]
            ],
            "password" => [
                "rules" => "required|max_length[255]|min_length[8]",
                "errors" => [
                    "required" => "Ingresa una contraseña",
                    "max_length" => "La contraseña no puede superar los 255 caracteres",
                    "min_length" => "La contraseña debe tener al menos 8 caracteres"
                ]
            ]
        ]);

        if (!$validation->withRequest($request)->run()) {
            $data['titulo'] = 'Login';
            $data['validation'] = $validation -> getErrors();
            return view("Plantillas/header_view", $data)
            .view("Contenidos/iniciarSesion_view")
            .view("Plantillas/footer_view");
        }

        $mail = $request->getPost('email');
        $pass = $request->getPost('password');

        $User_Model = new Usuarios_Model();

        $user = $User_Model->where('persona_email', $mail)->where('persona_estado', 1)->first();

        if ($user && password_verify($pass, $user['persona_password'])) {
            $data = [
                'id' => $user['persona_id'],
                'nombre' => $user['persona_nombre'],
                'apellido' => $user['persona_apellido'],
                'perfil' => $user['perfil_id'],
                'login' => TRUE
            ];
            $session->set($data);
            switch ($user['perfil_id']) {
                case '1':
                    return redirect()->to(base_url('Ver_consultas'));
                case '2':
                    return redirect()->to($redirect ? base_url($redirect) : base_url('/'));
            }
        } else {
            $validation->setError('log', 'Usuario y/o contraseña incorrecto!');
            $data['validation'] = $validation -> getErrors();
            return view("Plantillas/header_view", $data)
            .view("Contenidos/iniciarSesion_view")
            .view("Plantillas/footer_view");
            //return redirect()->route('iniciarSesion_view')->with('mensaje', 'Usuario y/o contraseña incorrecto!');
        }
    }


    public function cerrar_sesion(){
        $session = session();
        $session->destroy();
        return redirect()->to(base_url());
}

    
    public function add_cliente() {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            "nombre" => [
                "rules" => 'required',
                "errors" => [
                    "required" => "Ingresa un nombre",
                ]
            ],
            "apellido" => [
                "rules" => 'required',
                "errors" => [
                    "required" => "Ingresa un apellido",
                ]
            ],
            "email" => [
                "rules" => "required|max_length[50]|valid_email|is_unique[personas.persona_email]",
                "errors" => [
                    "required" => "Ingresa un correo electronico",
                    "max_length" => "El email no puede superar los 50 caracteres",
                    "valid_email" => "La dirección de correo debe ser válida",
                    "is_unique" => "La direccion de correo ingresada ya tiene un usuario registrado"
                ]
            ],
            "password" => [
                "rules" => "required|max_length[255]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/]",
                "errors" => [
                    "required" => "Ingresa una contraseña",
                    "max_length" => "La contraseña no puede superar los 255 caracteres",
                    "min_length" => "La contraseña debe tener al menos 8 caracteres",
                    "regex_match" => "La contraseña debe tener una mayúscula, una minúscula y un número"
                ]
            ],
            "passwordConfirm" => [
                "rules" => "required|matches[password]",
                "errors" => [
                    "required" => "Confirme la contraseña",
                    "matches" => "Las contraseñas ingresadas no coinciden"
                ]
            ]
        ]);

        if ($validation->withRequest($request)->run() ){
            $data = [
                'persona_apellido' => ucwords(strtolower($request->getPost('apellido'))),
                'persona_nombre' => ucwords(strtolower($request->getPost('nombre'))),
                'persona_email' => $request->getPost('email'),
                'persona_password' => password_hash($request->getPost('password'), PASSWORD_BCRYPT),
                'perfil_id' => 2,
                'persona_estado' => 1
            ];
            
            $userRegister = new Usuarios_Model();
            $userRegister->insert($data);
            return view('Plantillas/header_view', $data) .
            view('Contenidos/success_view') . view('Plantillas/footer_view');
        } else {
            $data['titulo'] = 'Registrarse';
            $data['validation'] = $validation->getErrors();
            return view('Plantillas/header_view', $data) .
            view('Contenidos/crearUsuario_view') . view('Plantillas/footer_view');
        }
    }


    //metodos para condiguracion de perfil de usuarios.

    public function editarUsuario(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();

        $validation->setRules([
            "nuevoNombre" => [
                "rules" => 'required',
                "errors" => [
                    "required" => "Ingresa un nombre",
                ]
            ],
            "nuevoApellido" => [
                "rules" => 'required',
                "errors" => [
                    "required" => "Ingresa un apellido",
                ]
            ],
        ]);
        
        if ($validation->withRequest($request)->run() ){
            $User_Model = new Usuarios_Model();

            $id = session()->get('id');

            $data = [
                'persona_nombre' => ucwords(strtolower($request->getPost('nuevoNombre'))),
                'persona_apellido' => ucwords(strtolower($request->getPost('nuevoApellido')))
            ];

            session()->set([
                'id' => $id,
                'nombre' => $data['persona_nombre'],
                'apellido' => $data['persona_apellido'],
                'perfil' => session()->get('perfil'), 
                'login' => TRUE
            ]);

            if ($User_Model->update($id, $data)) {
                return redirect()->to(base_url())->with('success', 'Usuario actualizado correctamente.');
            } else {
                return redirect()->to(base_url())->with('error', 'Hubo un problema al actualizar los datos.');
            }
        } else{
            $perfil = $session->get('perfil'); 

            session()->setFlashdata('error', $validation->getErrors());
            if ($perfil == 2) {
                return redirect()->to(base_url());
            } else {
                return redirect()->route('Ver_consultas');
            }
        }
    }

    public function editarCorreo(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();

        $validation->setRules([
            "nuevoCorreo" => [
                "rules" => "required|max_length[50]|valid_email",
                "errors" => [
                    "required" => "Ingresa un correo electronico",
                    "max_length" => "El email no puede superar los 50 caracteres",
                    "valid_email" => "La dirección de correo debe ser válida"
                ]
            ],
        ]);
        if ($validation->withRequest($request)->run() ){
            $User_Model = new Usuarios_Model();

            $data = [
                'persona_email' => $request->getPost('nuevoCorreo'),
            ];

            if ($User_Model->update($id, $data)) {
                return redirect()->to(base_url())->with('success', 'Correo actualizado correctamente.');
            } else {
                return redirect()->to(base_url())->with('error', 'Hubo un problema al actualizar los datos.');
            }
         } else {
            session()->setFlashdata('error', $validation->getErrors());
           if ($perfil == 2) {
                return redirect()->to(base_url());
            } else {
                return redirect()->route('Ver_consultas');
            }
        }
    }

    public function editarContraseña(){
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();

        $validation->setRules([
            "nuevaContraseña" => [
                "rules" => "required|max_length[255]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/]",
                "errors" => [
                    "required" => "Ingresa una contraseña",
                    "max_length" => "La contraseña no puede superar los 255 caracteres",
                    "min_length" => "La contraseña debe tener al menos 8 caracteres",
                    "regex_match" => "La contraseña debe tener una mayúscula, una minúscula y un número"
                ]
            ],
            "contraseñaConf" => [
                "rules" => "required|matches[password]",
                "errors" => [
                    "required" => "Confirme la contraseña",
                    "matches" => "Las contraseñas ingresadas no coinciden"
                ]
            ],
        ]);
        if ($validation->withRequest($request)->run() ){
            $User_Model = new Usuarios_Model();

            $data = [
                'persona_contraseña' => $request->getPost('nuevaContraseña'),
            ];

            if ($User_Model->update($id, $data)) {
                return redirect()->to(base_url())->with('success', 'Contraseña actualizado correctamente.');
            } else {
                return redirect()->to(base_url())->with('error', 'Hubo un problema al actualizar los datos.');
            }
         } else {
            session()->setFlashdata('error', $validation->getErrors());
            if ($perfil == 2) {
                return redirect()->to(base_url());
            } else {
                return redirect()->route('Ver_consultas');
            }
        }
    }
}



