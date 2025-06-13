<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//controladores de la vista del cliente
$routes->get('/', 'Home::index');
$routes->get('Nosotros', 'Home::somos');
$routes->get('Comercializacion', 'Home::comercializacion');
$routes->get('Contacto', 'Home::contacto');
$routes->get('Iniciar_Sesion', 'Home::IniciarSesion');
$routes->get('Terminos', 'Home::terminos');
$routes->get('CrearUsuario', 'Home::crearUsuario');

//controladores de la vista del admin
$routes->get('Ver_consultas', 'Consultas_controller::listarConsultas');
$routes->get('Listar_productos', 'ProductosController::listarProductos');
$routes->get('Listar_ventas', 'Home::listarVentas');
$routes->get('Gestionar_productos', 'Home::gestionarProductos');
$routes->get('Registrar_productos', 'ProductosController::agregarProducto');       
$routes->post('insertar_producto', 'ProductosController::registrar_producto'); 

//controladores de sesion y usuarios
$routes->post('iniciar', 'Usuarios_controller::inicio');
$routes->post('Buscar', 'Usuarios_controller::buscar_usuario');
$routes->post('registro', 'Usuarios_controller::add_cliente');
$routes->get('Cerrar', 'Usuarios_controller::cerrar_sesion');
$routes->get('user_admin', 'Usuarios_controller::admin');

//controlador de consultas
$routes->post('contacto', 'Consultas_controller::formContacto');

