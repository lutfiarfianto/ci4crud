<?php

$routes->group('/admin/Jadwalkelas',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\admin'
    ],function($routes){

    $routes->get('/','Jadwalkelas::index');
    $routes->get('/New','Jadwalkelas::new');
    $routes->get('/Show/(:num)','Jadwalkelas::show');
    $routes->get('/Edit/(:num)','Jadwalkelas::edit');
    $routes->post('/Store','Jadwalkelas::store');

});
