<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/uploadExcel', 'Home::excel_upload_form');
// $routes->get('/getData', 'Home::getLeads');
// $routes->post('/getData', 'Home::getLeads');

$routes->get('/leads', 'Home::getLeads');
$routes->post('/leads', 'Home::getLeads');

$routes->get('excelimport', 'Home::index');
$routes->post('excelimport/upload', 'Home::upload');
