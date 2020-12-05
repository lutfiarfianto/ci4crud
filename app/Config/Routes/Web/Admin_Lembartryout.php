<?php



$routes->group('/Admin/{Lembartryout}',[
        // 'filter'=>['login'],
        'namespace'=>'\App\Controllers\Admin'
    ],function($routes){

    $routes->get('/','Lembartryout::index');
    $routes->get('/Session/(:any)','Lembartryout::session/$1');
    $routes->get('/New','Lembartryout::new');
    $routes->get('/Show/(:num)','Lembartryout::show');
    $routes->get('/Edit/(:num)','Lembartryout::edit');
    $routes->post('/Store','Lembartryout::store');

});
