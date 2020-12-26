<?php

$routes->group('/Member/Materi',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Member'
    ],function($routes){

    $routes->get('/','Materi::index');
    $routes->get('/New','Materi::new');
    $routes->get('/Show/(:num)','Materi::show');
    $routes->get('/Edit/(:num)','Materi::edit');
    $routes->post('/Store','Materi::store');

});
