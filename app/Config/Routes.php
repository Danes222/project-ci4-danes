<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/komentar/(:any)', 'Web::komentar/$1');
$routes->get('/nama', 'Web::nama');
$routes->get('/biodata', 'Web::biodata');
$routes->get('/hitung', 'Web::hitung');
$routes->post('/hitung/proses', 'Web::proses');


// ROUTES SEGITIGA
$routes->get('/segitiga', 'Web::hitungSegitiga');
$routes->post('/segitiga/proses', 'Web::prosesSegitiga');

// ROUTES EMPLOYE
$routes->get('/employe', 'Dashboard::employe',['filter' => 'auth']);
$routes->get('/employe/save', 'Dashboard::save',['filter' => 'auth']);
$routes->get('/employe/edit/(:any)', 'Dashboard::edit/$1',['filter' => 'auth']);
$routes->post('/employe/update', 'Dashboard::update',['filter' => 'auth']);
$routes->get('/employe/destroy/(:any)', 'Dashboard::destroy/$1',['filter' => 'auth']);

// ROUTES ADMIN
$routes->get('/admin', 'Admin::index',['filter' => 'auth']);
$routes->get('/admin/save', 'Admin::save',['filter' => 'auth']);
$routes->get('/admin/edit/(:any)', 'Admin::edit/$1',['filter' => 'auth']);
$routes->post('/admin/update', 'Admin::update',['filter' => 'auth']);
$routes->get('/admin/destroy/(:any)', 'Admin::destroy/$1',['filter' => 'auth']);

// ROUTES DIVISION
$routes->get('/division', 'Division::index',['filter' => 'auth']);
$routes->get('/division/save', 'Division::save',['filter' => 'auth']);
$routes->get('/division/edit/(:any)', 'Division::edit/$1',['filter' => 'auth']);
$routes->post('/division/update', 'Division::update',['filter' => 'auth']);
$routes->get('/division/destroy/(:any)', 'Division::destroy/$1',['filter' => 'auth']);

// ROUTES AUTH
$routes->get('/register', 'Auth::index');
$routes->post('/daftar', 'Auth::register');
$routes->get('/login', 'Auth::login');
$routes->post('/cek_login', 'Auth::cek_login');
$routes->get('/logout', 'Auth::logout');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
