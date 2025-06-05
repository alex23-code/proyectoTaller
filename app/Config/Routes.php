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


$routes->get('form', 'Usuarios_controller::index');
$routes->post('form', 'Usuarios_controller::Buscar_usuario');
$routes->post('registrarUsuario', 'Usuarios_controller::add_cliente');
$routes->post('iniciar_sesion', 'Usuarios_controller::index');


$routes->post('consultas', 'Consultas_controller::addConsulta');

$routes->post('contacto', 'ConsultasController2::formContacto');