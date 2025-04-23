<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Nosotros', 'Home::somos');
$routes->get('Comercializacion', 'Home::comercializacion');
