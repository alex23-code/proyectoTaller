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
$routes->get('ver_catalogo', 'ProductosController::catalogo');

//controladores de la vista del admin
$routes->get('Ver_consultas', 'Consultas_controller::listarConsultas');
$routes->get('Listar_productos', 'ProductosController::listarProductos');
$routes->get('Listar_ventas', 'Home::listarVentas');
$routes->get('Gestionar_productos/editar/(:num)', 'ProductosController::editarProducto/$1');
$routes->get('Registrar_productos', 'ProductosController::agregarProducto');       
$routes->post('insertar_producto', 'ProductosController::registrar_producto'); 
$routes->post('productosController/actualizarProducto/(:num)', 'ProductosController::actualizarProducto/$1');

//controladores de sesion y usuarios
$routes->post('iniciar', 'Usuarios_controller::inicio');
$routes->post('Buscar', 'Usuarios_controller::buscar_usuario');
$routes->post('registro', 'Usuarios_controller::add_cliente');
$routes->get('Cerrar', 'Usuarios_controller::cerrar_sesion');
$routes->get('user_admin', 'Usuarios_controller::admin');
$routes->post('cambiar_usuario', 'Usuarios_controller::editarUsuario');
$routes->post('cambiar_correo', 'Usuarios_controller::editarCorreo');
$routes->post('cambiar_contrasena', 'Usuarios_controller::editarContraseña');

//controlador de consultas
$routes->post('contacto', 'Consultas_controller::formContacto');

//controladores de ventas
$routes->post('carrito/agregar', 'ProductosController::agregarAlCarrito');
$routes->get('Ver_carro', 'ProductosController::verCarrito');
$routes->post('eliminar', 'ProductosController::eliminarDelCarro');
