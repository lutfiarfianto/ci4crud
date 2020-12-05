<?php

$routes->group('/Admin/Dashboard',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Admin'
    ],function($routes){

    $routes->get('/','Dashboard::index');

});
