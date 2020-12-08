<?php

$routes->group('/Member/Tryout',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Member'
    ],function($routes){

    $routes->get('/','Tryout::index');
    $routes->get('/New','Tryout::new');
    $routes->get('/Show/(:num)','Tryout::show');
    $routes->get('/Edit/(:num)','Tryout::edit');
    $routes->post('/Store','Tryout::store');

});
