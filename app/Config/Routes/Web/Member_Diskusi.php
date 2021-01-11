<?php

$routes->group('/Member/Diskusi',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Member'
    ],function($routes){

    $routes->get('/','Diskusi::index');
    $routes->get('/New','Diskusi::new');
    $routes->get('/Show/(:num)','Diskusi::show');
    $routes->get('/Edit/(:num)','Diskusi::edit');
    $routes->post('/Store','Diskusi::store');

});
