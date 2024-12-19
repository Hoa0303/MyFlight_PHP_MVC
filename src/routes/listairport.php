<?php
$router->get(
    '/listairport',
    'App\Controllers\ListAirportController@index'
);

$router->get(
    '/addairport',
    'App\Controllers\ListAirportController@create'
);

$router->post(
    '/addairport',
    'App\Controllers\ListAirportController@store'
);

$router->get(
    '/editairport/(.*)',
    'App\Controllers\ListAirportController@edit'
);

$router->post(
    '/editairport',
    'App\Controllers\ListAirportController@update'
);

$router->get(
    '/deleteairport/(.*)',
    'App\Controllers\ListAirportController@destroy'
);