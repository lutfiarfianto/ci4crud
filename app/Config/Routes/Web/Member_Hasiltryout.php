<?php

$routes->group('/Member/Hasiltryout',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Member'
    ],function($routes){

    $routes->get('/','Hasiltryout::index');
    $routes->get('/New','Hasiltryout::new');
    $routes->get('/Show/(:num)','Hasiltryout::show');
    $routes->get('/Edit/(:num)','Hasiltryout::edit');
    $routes->post('/Store','Hasiltryout::store');

});
