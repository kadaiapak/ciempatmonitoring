<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Homedua::index');
$routes->get('/skripsi', 'Skripsi::index');
$routes->get('/skripsi/ajukan-judul', 'Skripsi::ajukan_judul');
$routes->post('/skripsi/simpan_judul', 'Skripsi::simpan_judul');
$routes->get('/skripsi/edit_skripsi', 'Skripsi::edit_skripsi');
$routes->get('/skripsi/edit_skripsi/(:num)', 'Skripsi::edit_skripsi/$1');
$routes->post('/skripsi/simpan_edit_skripsi/(:num)', 'Skripsi::update_skripsi/$1');
$routes->get('/skripsi/semua_skripsi', 'Skripsi::semua_skripsi');

$routes->get('/skripsi/tambah-bimbingan', 'Bimbingan::tambah_bimbingan');
$routes->post('/bimbingan/simpan_bimbingan', 'Bimbingan::simpan_bimbingan');



$routes->get('/skripsi/upload-skripsi', 'Skripsi::upload_skripsi');


// route by kadep
$routes->get('/skripsi/(:num)/detail', 'Skripsi::proses_skripsi_oleh_kadep/$1');
$routes->post('/skripsi/(:num)/proses', 'Skripsi::update_skripsi_oleh_kadep/$1');


$routes->get('/auth', 'Auth::index');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/logout', 'Auth::logout');
$routes->get('/homedua', 'Homedua::index');

// login
$routes->post('/auth/loginProcess', 'Auth::loginProcess');

// dosen_pembimbing
// user level kadep

$routes->get('/dosen_pembimbing', 'DosenPembimbing::index');
