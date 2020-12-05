<?php

$routes->get('/Admin/Soaltryout/session/(:any)', '\App\Controllers\Admin\Soaltryout::session/$1');

// $routes->group('/Admin/Soaltryout', [
    // 'namespace' => '\App\Controllers\Admin',
// ], function ($routes) {

    $routes->get('/Admin/Soaltryout/', '\App\Controllers\Admin\Soaltryout::index',['filter'=>'tryoutAdmin']);
    $routes->get('/Admin/Soaltryout/show/(:num)', '\App\Controllers\Admin\Soaltryout::show',['filter'=>'tryoutAdmin']);
    $routes->get('/Admin/Soaltryout/edit/(:num)', '\App\Controllers\Admin\Soaltryout::edit',['filter'=>'tryoutAdmin']);
    $routes->post('/Admin/Soaltryout/store', '\App\Controllers\Admin\Soaltryout::store',['filter'=>'tryoutAdmin']);
    $routes->get('/Admin/Soaltryout/new', '\App\Controllers\Admin\Soaltryout::new');

// });
