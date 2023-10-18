<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Homedua::index');
$routes->get('/skripsi', 'Skripsi::index');
$routes->get('/skripsi/tambah_skripsi', 'Skripsi::tambah_skripsi');
$routes->post('/skripsi/simpan_skripsi', 'Skripsi::simpan_skripsi');
$routes->get('/skripsi/edit_skripsi', 'Skripsi::edit_skripsi');
$routes->get('/skripsi/edit_skripsi/(:num)', 'Skripsi::edit_skripsi/$1');
$routes->post('/skripsi/simpan_edit_skripsi', 'Skripsi::simpan_edit_skripsi');

$routes->get('/login', 'Auth::index');
$routes->get('/homedua', 'Homedua::index');
