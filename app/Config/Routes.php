<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AUTH (Login dan Logout)
$routes->get('/', 'Auth::login');             
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->post('logout', 'Auth::logout');
$routes->get('/profile', 'Auth::profile');

$routes->group('', ['filter' => 'auth'], function($routes) {
    // 🏠 Dashboard
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('/toilet/lantai/(:num)', 'Toilet::byLantai/$1');
    $routes->get('/toilet/hapusSemuaDiLantai/(:num)', 'Toilet::hapusLantai/$1');


    // 🚽 Manajemen Toilet
    $routes->get('toilet', 'Toilet::index');
    $routes->get('toilet/tambah', 'Toilet::tambah');
    $routes->post('toilet/simpan', 'Toilet::simpan');
    $routes->get('/toilet/edit/(:num)', 'Toilet::edit/$1');
    $routes->post('/toilet/update/(:num)', 'Toilet::update/$1');
    $routes->get('/toilet/delete/(:num)', 'Toilet::delete/$1');
    $routes->get('/toilet/lantai/(:num)', 'Toilet::listByLantai/$1');     

    // ✅ Checklist
    $routes->get('checklist/mulai/(:num)', 'Checklist::mulai/$1');
    $routes->post('checklist/simpan/(:num)', 'Checklist::simpan/$1');

    // 📜 Riwayat
    $routes->get('riwayat', 'Riwayat::index');
});