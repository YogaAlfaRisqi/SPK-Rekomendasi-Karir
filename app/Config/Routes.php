<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Admin\Dashboard::index');

//Kriteria
$routes->get('/criteria', 'Admin\Criteria::view');
$routes->post('/criteria/add', 'Admin\Criteria::add');
$routes->post('/criteria/update/(:any)', 'Admin\Criteria::update/$1');
$routes->get('/criteria/delete/(:any)', 'Admin\Criteria::delete/$1');


//Karir
$routes->get('/karir', 'Admin\Karir::view');
$routes->post('/karir/add', 'Admin\Karir::add');
$routes->post('/karir/update/(:any)', 'Admin\Karir::update/$1');
$routes->get('/karir/delete/(:any)', 'Admin\Karir::delete/$1');




$routes->get('/preferensi', 'Preferences::view');
$routes->get('/rekomendasi', 'Rekomendasi::view');
$routes->get('/riwayat', 'Riwayat::view');
$routes->get('/alternative', 'Admin\Alternative::view');
$routes->get('/perhitungan', 'Admin\Perhitungan::view');
$routes->get('/user', 'Admin\User::view');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    // Tambah route lain misal users, careers dsb
});

// Career
