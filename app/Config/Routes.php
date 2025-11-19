<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('excelimport', 'Home::index');
$routes->post('excelimport/upload', 'Home::upload');
