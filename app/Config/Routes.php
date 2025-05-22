<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Nosotros', 'Home::somos');
$routes->get('Comercializacion', 'Home::comercializacion');
$routes->get('Contacto', 'Home::contacto');
$routes->get('IniciarSesion', 'Home::IniciarSesion');
$routes->get('Terminos', 'Home::terminos');
$routes->get('CrearUsuario', 'Home::crearUsuario');


$routes->get('form', 'Form::index');
$routes->post('form', 'Form::Buscar_usuario');
$routes->post('registrarUsuario', 'Usuarios_controller::add_cliente');