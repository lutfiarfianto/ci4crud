<?php

$routes->group('/Admin/{Matakuliah}',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Admin'
    ],function($routes){

    $routes->get('/','Matakuliah::index');
    $routes->get('/New','Matakuliah::new');
    $routes->get('/Show/(:num)','Matakuliah::show');
    $routes->get('/Edit/(:num)','Matakuliah::edit');
    $routes->post('/Store','Matakuliah::store');

});
