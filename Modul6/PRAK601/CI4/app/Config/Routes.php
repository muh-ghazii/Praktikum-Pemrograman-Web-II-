<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Halaman::beranda');
$routes->get('/beranda', 'Halaman::beranda');
$routes->get('/profil', 'Halaman::profil');