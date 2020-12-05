<?php 

$routes->get('/Admin/Kontak/','\App\Controllers\Admin\Kontak::index');
$routes->get('/Admin/Kontak/New','\App\Controllers\Admin\Kontak::new');
$routes->get('/Admin/Kontak/Show/(:num)','\App\Controllers\Admin\Kontak::show');
$routes->get('/Admin/Kontak/Edit/(:num)','\App\Controllers\Admin\Kontak::edit');
$routes->post('/Admin/Kontak/Store','\App\Controllers\Admin\Kontak::store');

