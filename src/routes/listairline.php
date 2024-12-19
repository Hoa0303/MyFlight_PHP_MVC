<?php
$router->get(
    '/listairline',
    'App\Controllers\ListAirlineController@index'
);

$router->get(
    '/addairline',
    'App\Controllers\ListAirlineController@create'
);

$router->post(
    '/addairline',
    'App\Controllers\ListAirlineController@store'
);

$router->get(
    '/editairline/(.*)',
    'App\Controllers\ListAirlineController@edit'
);

$router->post(
    '/editairline',
    'App\Controllers\ListAirlineController@update'
);

$router->get(
    '/deleteairline/(.*)',
    'App\Controllers\ListAirlineController@destroy'
);