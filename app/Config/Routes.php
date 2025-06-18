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

//Pembobotan Kriteria
$routes->group('pembobotan', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'PembobotanKriteria::view');

    // Web Developer
    $routes->post('addWebdeveloper', 'PembobotanKriteria::addWebdeveloper');
    $routes->post('updateWebdeveloper/(:num)', 'PembobotanKriteria::updateWebdeveloper/$1');
    $routes->get('deleteWebdeveloper/(:num)', 'PembobotanKriteria::deleteWebdeveloper/$1');

    // Mobile Engineer
    $routes->post('addMobileengineer', 'PembobotanKriteria::addMobileengineer');
    $routes->post('updateMobileengineer/(:num)', 'PembobotanKriteria::updateMobileengineer/$1');
    $routes->get('deleteMobileengineer/(:num)', 'PembobotanKriteria::deleteMobileengineer/$1');
});





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
