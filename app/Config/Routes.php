<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Admin\Dashboard::index');
$routes->get('/criteria', 'Admin\Criteria::view');
$routes->get('/preferensi', 'Admin\Preferences::view');
$routes->get('/rekomendasi', 'Rekomendasi::view');
$routes->get('/riwayat', 'Riwayat::view');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    // Tambah route lain misal users, careers dsb
});

// Career
