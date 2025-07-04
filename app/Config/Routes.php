<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Admin\Dashboard::index');

$routes->get('register', 'AuthController::register');
$routes->post('register/process', 'AuthController::registerProcess');
$routes->get('login', 'AuthController::login');
$routes->post('login/process', 'AuthController::loginProcess');
$routes->get('logout', 'AuthController::logout');

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

// === ADMIN - USER MANAGEMENT ===
$routes->group('admin/user', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin\User::view');                  // Tampilkan daftar user
    $routes->post('create', 'Admin\User::create');          // Proses tambah user
    $routes->get('edit/(:num)', 'Admin\User::edit/$1');     // Form edit user
    $routes->post('update/(:num)', 'Admin\User::update/$1');// Proses update user
    $routes->post('delete/(:num)', 'Admin\User::delete/$1');// Proses hapus user
});


//Pembobotan Kriteria
$routes->group('pembobotan', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'PembobotanKriteria::view');

    // Web Developer
    $routes->post('addwebdeveloper', 'PembobotanKriteria::addWebdeveloper');
    $routes->post('updatewebdeveloper/(:num)', 'PembobotanKriteria::updateWebdeveloper/$1');
    $routes->get('deletewebdeveloper/(:num)', 'PembobotanKriteria::deleteWebdeveloper/$1');

    // Mobile Engineer
    $routes->post('addmobileengineer', 'PembobotanKriteria::addMobileengineer');
    $routes->post('updatemobileengineer/(:num)', 'PembobotanKriteria::updateMobileengineer/$1');
    $routes->get('deletemobileengineer/(:num)', 'PembobotanKriteria::deleteMobileengineer/$1');

    // Network Engineer
    $routes->post('addnetworkengineer', 'PembobotanKriteria::addNetworkengineer');
    $routes->post('updatenetworkengineer/(:num)', 'PembobotanKriteria::updateNetworkengineer/$1');
    $routes->get('deletenetworkengineer/(:num)', 'PembobotanKriteria::deleteNetworkengineer/$1');

    // QA Engineer
    $routes->post('addqaengineer', 'PembobotanKriteria::addQAengineer');
    $routes->post('updateqaengineer/(:num)', 'PembobotanKriteria::updateQAengineer/$1');
    $routes->get('deleteqaengineer/(:num)', 'PembobotanKriteria::deleteQAengineer/$1');

    // System Analyst
    $routes->post('addsystemanalyst', 'PembobotanKriteria::addSystemAnalyst');
    $routes->post('updatesystemanalyst/(:num)', 'PembobotanKriteria::updateSystemAnalyst/$1');
    $routes->get('deletesystemanalyst/(:num)', 'PembobotanKriteria::deleteSystemAnalyst/$1');

    // Data Engineer
    $routes->post('adddataengineer', 'PembobotanKriteria::adddataengineer');
    $routes->post('updatedataengineer/(:num)', 'PembobotanKriteria::updatedataengineer/$1');
    $routes->get('deletedataengineer/(:num)', 'PembobotanKriteria::deletedataengineer/$1');
});





$routes->get('/preferensi', 'Preferences::view');
$routes->post('preferensi/simpan', 'Preferences::simpan');
$routes->post('preferensi/proses', 'Preferences::proses');
$routes->get('/rekomendasi', 'Rekomendasi::view');
$routes->post('riwayat/simpan', 'Riwayat::simpan');
$routes->post('riwayat/hapus/(:num)', 'Riwayat::hapus/$1');

$routes->get('/riwayat', 'Riwayat::view');
$routes->get('/alternative', 'Admin\Alternative::view');
$routes->get('/perhitungan', 'Admin\Perhitungan::view');
$routes->get('/user', 'Admin\User::view');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    // Tambah route lain misal users, careers dsb
});

// Career
