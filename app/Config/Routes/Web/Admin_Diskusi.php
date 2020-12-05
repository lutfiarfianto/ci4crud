<?php

$routes->get('/Admin/Diskusi/','\App\Controllers\Admin\Diskusi::index');
$routes->get('/Admin/Diskusi/New','\App\Controllers\Admin\Diskusi::new');
$routes->get('/Admin/Diskusi/Show/(:num)','\App\Controllers\Admin\Diskusi::show');
$routes->get('/Admin/Diskusi/Edit/(:num)','\App\Controllers\Admin\Diskusi::edit');
$routes->post('/Admin/Diskusi/Store','\App\Controllers\Admin\Diskusi::store');

