<?php

$routes->get('/Admin/Tryout/','\App\Controllers\Admin\Tryout::index');
$routes->get('/Admin/Tryout/New','\App\Controllers\Admin\Tryout::new');
$routes->get('/Admin/Tryout/Show/(:num)','\App\Controllers\Admin\Tryout::show');
$routes->get('/Admin/Tryout/Edit/(:num)','\App\Controllers\Admin\Tryout::edit');
$routes->post('/Admin/Tryout/Store','\App\Controllers\Admin\Tryout::store');

