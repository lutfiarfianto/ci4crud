<?php

$routes->group('/Member/Soaltryout',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Member'
    ],function($routes){

    $routes->get('/','Soaltryout::index');
    $routes->get('/Session/(:any)','Soaltryout::new/$1');
    $routes->get('/New','Soaltryout::new');
    $routes->get('/Show/(:num)','Soaltryout::show');
    $routes->get('/Edit/(:num)','Soaltryout::edit');
    $routes->post('/Store','Soaltryout::store');

});
