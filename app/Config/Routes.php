<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
use CodeIgniter\Router\RouteCollection;


// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/api/clients', 'ClientController::getAll');
$routes->post('/api/client', 'ClientController::addClient');
$routes->put('/api/client', 'ClientController::updateClient');
$routes->delete('/api/client/(:num)', 'ClientController::deleteClient/$1');
$routes->get('/api/client/(:num)', 'ClientController::getById/$1');

$routes->get('/api/products', 'ProductController::getAll');
$routes->post('/api/product', 'ProductController::addProduct');
$routes->put('/api/product', 'ProductController::updateProduct');
$routes->delete('/api/product/(:num)', 'ProductController::deleteProduct/$1');
$routes->get('/api/product/(:num)', 'ProductController::getById/$1');

$routes->get('/api/visits', 'VisitController::getAll');
$routes->post('/api/visit', 'VisitController::addVisit');
$routes->put('/api/visit', 'VisitController::updateVisit');
$routes->delete('/api/visit/(:num)', 'VisitController::deleteVisit/$1');
$routes->get('/api/visit/(:num)', 'VisitController::getById/$1');

$routes->get('/api/sales', 'SaleController::getAll');
$routes->post('/api/sale', 'SaleController::addSale');
$routes->put('/api/sale', 'SaleController::updateSale');
$routes->delete('/api/sale/(:num)', 'SaleController::deleteSale/$1');
$routes->get('/api/sale/(:num)', 'SaleController::getById/$1');