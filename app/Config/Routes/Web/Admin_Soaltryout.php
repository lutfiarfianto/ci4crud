<?php

$routes->get('/Admin/Soaltryout/session/(:any)', '\App\Controllers\Admin\Soaltryout::session/$1');

$routes->group('/Admin/Soaltryout', [
    'namespace' => '\App\Controllers\Admin',
], function ($routes) {

    $routes->get('/', 'Soaltryout::index');
    $routes->get('show/(:num)', 'Soaltryout::show/$1');
    $routes->get('edit/(:num)', 'Soaltryout::edit/$1');
    $routes->post('store', 'Soaltryout::store');
    $routes->get('new', 'Soaltryout::new');

});
