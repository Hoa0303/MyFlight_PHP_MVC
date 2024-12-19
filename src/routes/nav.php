<?php

$router->get('/', 'App\Controllers\NavController@index');

$router->get(
    '/admin_login',
    'App\Controllers\NavController@admin_login'
);

$router->get(
    '/admin',
    'App\Controllers\NavController@admin'
);

$router->get(
    '/flight',
    'App\Controllers\NavController@flight'
);

$router->get(
    '/new',
    'App\Controllers\NavController@new'
);

$router->get(
    '/guidance',
    'App\Controllers\NavController@guidance'
);

$router->get(
    '/contact',
    'App\Controllers\NavController@contact'
);

$router->get(
    '/mycart/{\d+}',
    'App\Controllers\FlightController@ticket'
);
