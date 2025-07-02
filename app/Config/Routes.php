<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ✅ AUTH (Login dan Logout)
$routes->get('/', 'Auth::login');             
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->post('logout', 'Auth::logout');
$routes->get('/profile', 'Auth::profile');

// ✅ SEMUA RUTE YANG BUTUH LOGIN DIPROTEKSI FILTER "auth"
$routes->group('', ['filter' => 'auth'], function($routes) {
    // 🏠 Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // 🚽 Manajemen Toilet
    $routes->get('toilet', 'Toilet::index');
    $routes->get('toilet/tambah', 'Toilet::tambah');
    $routes->post('toilet/simpan', 'Toilet::simpan');

    // ✅ Checklist
    $routes->get('checklist/mulai/(:num)', 'Checklist::mulai/$1');
    $routes->post('checklist/simpan/(:num)', 'Checklist::simpan/$1');

    // 📜 Riwayat
    $routes->get('riwayat', 'Riwayat::index');
});