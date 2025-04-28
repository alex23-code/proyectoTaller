<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string {
        $data['titulo'] = "Index";
        return view('plantillas/header_view', $data).
        view('Contenidos/principal_view').view('plantillas/footer_view');
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
        view('Contenidos/iniciarSesion').view('plantillas/footer_view');
    }
}