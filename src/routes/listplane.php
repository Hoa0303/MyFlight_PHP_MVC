<?php
$router->get(
    '/listplane',
    'App\Controllers\ListPlaneController@index'
);

$router->get(
    '/addplane',
    'App\Controllers\ListPlaneController@create'
);

$router->post(
    '/addplane',
    'App\Controllers\ListPlaneController@store'
);

$router->get(
    '/editplane/(.*)',
    'App\Controllers\ListPlaneController@edit'
);

$router->post(
    '/editplane',
    'App\Controllers\ListPlaneController@update'
);

$router->get(
    '/deleteplane/(.*)',
    'App\Controllers\ListPlaneController@destroy'
);