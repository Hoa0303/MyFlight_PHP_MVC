<?php

$router->get(
    '/priceticket',
    'App\Controllers\ListPriceTicketController@index'
);

$router->get(
    '/addpriceticket',
    'App\Controllers\ListPriceTicketController@create'
);

$router->post(
    '/addpriceticket',
    'App\Controllers\ListPriceTicketController@store'
);

$router->get(
    '/editpriceticket/(.*)',
    'App\Controllers\ListPriceTicketController@edit'
);

$router->post(
    '/editpriceticket',
    'App\Controllers\ListPriceTicketController@update'
);

$router->get(
    '/deletepriceticket/(.*)',
    'App\Controllers\ListPriceTicketController@destroy'
);
