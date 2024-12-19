<?php

$router->get(
    '/priceflight',
    'App\Controllers\ListPriceflightController@index'
);

$router->get(
    '/addpriceflight',
    'App\Controllers\ListPriceflightController@create'
);

$router->post(
    '/addpriceflight',
    'App\Controllers\ListPriceflightController@store'
);

$router->get(
    '/editpriceflight/(.*)',
    'App\Controllers\ListPriceflightController@edit'
);

$router->post(
    '/editpriceflight',
    'App\Controllers\ListPriceflightController@update'
);

$router->get(
    '/deletepriceflight/(.*)',
    'App\Controllers\ListPriceflightController@destroy'
);
