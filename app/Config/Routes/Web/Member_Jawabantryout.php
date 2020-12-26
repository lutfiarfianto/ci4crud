<?php

$routes->group('/Member/Jawabantryout',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Member'
    ],function($routes){

    $routes->get('/','Jawabantryout::index');
    $routes->get('/New','Jawabantryout::new');
    $routes->get('/Show/(:num)','Jawabantryout::show');
    $routes->get('/Edit/(:num)','Jawabantryout::edit');
    $routes->post('/Store','Jawabantryout::store');

});
