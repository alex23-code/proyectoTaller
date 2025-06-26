<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//controladores de la vista del cliente
$routes->get('/', 'Home::index', ['filter' => 'rol:2']);
$routes->get('Nosotros', 'Home::somos', ['filter' => 'rol:2']);
$routes->get('Comercializacion', 'Home::comercializacion', ['filter' => 'rol:2']);
$routes->get('Contacto', 'Home::contacto', ['filter' => 'rol:2']);
$routes->get('ver_catalogo', 'ProductosController::catalogo', ['filter' => 'rol:2']);
$routes->get('Iniciar_Sesion', 'Home::IniciarSesion');
$routes->get('Terminos', 'Home::terminos');
$routes->get('CrearUsuario', 'Home::crearUsuario');


//controladores de la vista del admin
$routes->get('Ver_consultas', 'Consultas_controller::listarConsultas', ['filter' => 'rol:1']);
$routes->get('Listar_productos', 'ProductosController::listarProductos', ['filter' => 'rol:1']);
$routes->get('Listar_ventas', 'VentasController::listarVentas', ['filter' => 'rol:1']);
$routes->get('Gestionar_productos/editar/(:num)', 'ProductosController::editarProducto/$1', ['filter' => 'rol:1']);
$routes->get('Registrar_productos', 'ProductosController::agregarProducto', ['filter' => 'rol:1']);
$routes->post('insertar_producto', 'ProductosController::registrar_producto', ['filter' => 'rol:1']);
$routes->post('productosController/actualizarProducto/(:num)', 'ProductosController::actualizarProducto/$1', ['filter' => 'rol:1']);
$routes->get('productosController/desactivar_producto/(:num)', 'ProductosController::desactivarProducto/$1', ['filter' => 'rol:1']);
$routes->get('productosController/activar_producto/(:num)', 'ProductosController::activarProducto/$1', ['filter' => 'rol:1']);


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
$routes->get('marcar_leido/(:num)', 'Consultas_controller::marcarLeido/$1');

//controladores de carrito
$routes->post('carrito/agregar', 'ProductosController::agregarAlCarrito');
$routes->get('Ver_carro', 'ProductosController::verCarrito');
$routes->post('eliminar', 'ProductosController::eliminarDelCarro');

//controladores de ventas
$routes->get('datos_cliente', 'VentasController::formulario_cliente');
$routes->post('procesar_datos', 'VentasController::confirmarCompra');
$routes->get('compra_pendiente', 'VentasController::pago_pendiente');
$routes->get('compra_exitosa/(:num)', 'VentasController::mostrarExito/$1');
$routes->get('mensaje_exito/(:num)', 'VentasController::mensajeExito/$1');
$routes->get('admin/ver_venta/(:num)', 'VentasController::verVenta/$1');
$routes->get('admin/cambiar_estado_pago/(:num)', 'VentasController::cambiarEstadoPago/$1');
$routes->get('cliente/historial', 'VentasController::historial');
$routes->get('cliente/ver_venta/(:num)', 'VentasController::verVentaCliente/$1');
