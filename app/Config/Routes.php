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

$routes->get('/regis', 'Home::regis');
$routes->post('/insert_user', 'Home::insert_user');
$routes->post('/auth', 'Home::auth');
$routes->get('/halaman_admin', 'Home::halaman_admin');
$routes->get('/dataPembayaran', 'Home::dataPembayaran');
$routes->get('/jenisPembayaran', 'Admin::jenisPembayaran');
$routes->get('/kelas', 'Home::kelas');
$routes->get('/tambah_jenis', 'Admin::tambah_jenis');
$routes->post('/insert_jenis', 'Admin::insert_jenis');
$routes->get('/edit_jenis/(:num)', 'Admin::edit_jenis/$1');
$routes->post('/update_jenis/{$data},{$id_jenis}', 'Admin::update_jenis/{$data},{$id_jenis}');
$routes->get('/delete_jenis/(:num)', 'Admin::delete_jenis/$1');
$routes->get('/tampilTagihan', 'Admin::tampil_tagihan');
$routes->get('/tambah_tagihan', 'Admin::tambah_tagihan');
$routes->post('/insert_tagihan', 'Admin::insert_tagihan');
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
