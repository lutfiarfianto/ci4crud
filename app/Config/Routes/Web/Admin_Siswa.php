<?php

$routes->group('/Admin/{Siswa}',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Admin'
    ],function($routes){

    $routes->get('/','Siswa::index');
    $routes->get('/New','Siswa::new');
    $routes->get('/Show/(:num)','Siswa::show');
    $routes->get('/Edit/(:num)','Siswa::edit');
    $routes->post('/Store','Siswa::store');

});
