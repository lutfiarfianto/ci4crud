<?php

$routes->group('/Admin/{Program}',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Admin'
    ],function($routes){

    $routes->get('/','Program::index');
    $routes->get('/New','Program::new');
    $routes->get('/Show/(:num)','Program::show');
    $routes->get('/Edit/(:num)','Program::edit');
    $routes->post('/Store','Program::store');

});
