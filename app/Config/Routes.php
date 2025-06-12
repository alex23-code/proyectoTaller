<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Nosotros', 'Home::somos');
$routes->get('Comercializacion', 'Home::comercializacion');
$routes->get('Contacto', 'Home::contacto');
$routes->get('Iniciar_Sesion', 'Home::IniciarSesion');
$routes->get('Terminos', 'Home::terminos');
$routes->get('CrearUsuario', 'Home::crearUsuario');


$routes->post('iniciar', 'Usuarios_controller::inicio');
$routes->post('Buscar', 'Usuarios_controller::buscar_usuario');
$routes->post('registro', 'Usuarios_controller::add_cliente');
$routes->get('Cerrar', 'Usuarios_controller::cerrar_sesion');
$routes->get('user_admin', 'Usuarios_controller::admin');


$routes->post('contacto', 'ConsultasController2::formContacto');


$routes->get('agregar', 'ProductosController::agregar_producto');          // Add this line.
$routes->post('insertar_producto', 'ProductosController::registrar_producto'); // Add this line.