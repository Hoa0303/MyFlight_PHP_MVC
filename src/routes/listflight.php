<?php

$router->get(
    '/listflight',
    'App\Controllers\ListFlightController@index'
);

$router->get(
    '/addflight',
    'App\Controllers\ListFlightController@create'
);

$router->post(
    '/addflight',
    'App\Controllers\ListFlightController@store'
);

$router->get(
    '/editflight/(.*)',
    'App\Controllers\ListFlightController@edit'
);

$router->post(
    '/editflight',
    'App\Controllers\ListFlightController@update'
);

$router->get(
    '/deleteflight/(.*)',
    'App\Controllers\ListFlightController@destroy'
);
