<?php

$routes->group('/Member/Profil',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Member'
    ],function($routes){

    $routes->get('/','Profil::show');
    $routes->get('/New','Profil::new');
    $routes->get('/Show/(:num)','Profil::show');
    $routes->get('/Edit/(:num)','Profil::edit');
    $routes->post('/Store','Profil::store');

});
