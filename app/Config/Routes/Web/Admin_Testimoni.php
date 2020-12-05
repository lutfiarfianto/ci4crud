<?php

$routes->group('/Admin/Testimoni',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Admin'
    ],function($routes){

    $routes->get('/','Testimoni::index');
    $routes->get('/New','Testimoni::new');
    $routes->get('/Show/(:num)','Testimoni::show');
    $routes->get('/Edit/(:num)','Testimoni::edit');
    $routes->post('/Store','Testimoni::store');

});
