<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
// $routes->get('/', 'Home::index');

// Login route
$routes->get('/', 'Login::index');
$routes->post('/login','Login::login');

//Logout route
$routes->get('/logout','Login::logout');

// Dashboard route
$routes->get('/dashboard','Dashboard::index');
	// show data
$routes->get('/dashboard/wilayah','Dashboard::wilayah');
	// edit wilayah
$routes->get('/dashboard/wilayah/edit/(:num)','Dashboard::editWilayah/$1',['filter' => 'masterrole']);
	// add wilayah  
$routes->post('/dashboard/addWilayah','Dashboard::addWilayah',['filter' => 'masterrole']);
	// user 
$routes->get('/dashboard/user','Dashboard::user');
	// edit user
$routes->get('/dashboard/user/edit/(:num)','Dashboard::editUser/$1',['filter' => 'masterrole']);
	// obat
$routes->get('/dashboard/obat','Dashboard::obat');
	// edit obat
$routes->get('/dashboard/obat/edit/(:num)','Dashboard::editObat/$1');
	// tindakan
$routes->get('/dashboard/tindakan','Dashboard::tindakan');
	// edit tindakan
$routes->get('/dashboard/tindakan/edit/(:num)','Dashboard::editTindakan/$1');
	// pasien
$routes->get('/dashboard/daftarPasien','Dashboard::pasien');
	// edit pasien 
$routes->get('/dashboard/pasien/edit/(:num)','Dashboard::editPasien/$1');
	// tindakan pasien
$routes->get('/dashboard/tindakanPasien','Dashboard::tindakanPasien');
	// pembayaran pasien 
$routes->get('/dashboard/pembayaran','Dashboard::pembayaran');


// api
	// action edit wilayah 
$routes->post('/api/post/editWilayah','Api::editWilayah',['filter' => 'masterrole']);
	// action delete wilayah
$routes->get('/api/delete/deleteWilayah/(:num)','Api::deleteWilayah/$1',['filter' => 'masterrole']);
	// action add user
$routes->post('/api/post/addUser','Api::addUser',['filter' => 'masterrole']);
	// action edit user 
$routes->post('/api/post/editUser','Api::editUser',['filter' => 'masterrole']);
	// action delete user 
$routes->get('/api/delete/deleteUser/(:num)','Api::deleteUser/$1',['filter' => 'masterrole']);
	// action add obat
$routes->post('/api/post/addObat','Api::addObat');
	// action edit obat
$routes->post('/api/post/editObat','Api::editObat');
	// action delete obat
$routes->get('/api/delete/deleteObat/(:num)','Api::deleteObat/$1');
	// action add tindakan
$routes->post('/api/post/addTindakan','Api::addTindakan');
	// action edit tindakan
$routes->post('/api/post/editTindakan','Api::editTindakan');
	// action delete tindakan 
$routes->get('api/delete/deleteTindakan/(:num)','Api::deleteTindakan/$1');
	// add pasien 
$routes->post('/api/post/addPasien','Api::addPasien');
	// edit pasien 
$routes->post('/api/post/editPasien','Api::editPasien');
	// delete pasien 
$routes->get('/api/delete/deletePasien/(:num)','Api::deletePasien/$1');
	// update pasien
$routes->post('/api/post/updatePasien/(:num)','Api::updatePasien/$1');
	// pembayaran pasien
$routes->post('/api/post/pembayaran/(:num)','Api::pembayaran/$1');




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
