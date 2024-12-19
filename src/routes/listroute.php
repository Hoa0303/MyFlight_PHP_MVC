<?php

$router->get(
    '/listroute',
    'App\Controllers\ListRouteController@index'
);

$router->get(
    '/addroute',
    'App\Controllers\ListRouteController@create'
);

$router->post(
    '/addroute',
    'App\Controllers\ListRouteController@store'
);

$router->get(
    '/editroute/(.*)',
    'App\Controllers\ListRouteController@edit'
);

$router->post(
    '/editroute',
    'App\Controllers\ListRouteController@update'
);

$router->get(
    '/deleteroute/(.*)',
    'App\Controllers\ListRouteController@destroy'
);

$router->post(
    '/getMaHang',
    'App\Controllers\ListRouteController@getMaHang'
);