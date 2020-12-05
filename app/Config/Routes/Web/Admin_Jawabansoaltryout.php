<?php

$routes->group('/Admin/{Jawabansoaltryout}',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Admin'
    ],function($routes){

    $routes->get('/','Jawabansoaltryout::index');
    $routes->get('/Session/(:any)','Jawabansoaltryout::session/$1');
    $routes->get('/New','Jawabansoaltryout::new');
    $routes->get('/Show/(:num)','Jawabansoaltryout::show');
    $routes->get('/Edit/(:num)','Jawabansoaltryout::edit');
    $routes->post('/Store','Jawabansoaltryout::store');

});
