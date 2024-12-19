<?php
$router->post(
    '/searchticket',
    'App\Controllers\FlightController@search'
);

$router->post(
    '/checkout',
    'App\Controllers\FlightController@checkout'
);

$router->post(
    '/confirm',
    'App\Controllers\FlightController@confirm'
);

$router->get(
    '/paymentsuccses',
    'App\Controllers\FlightController@confirm'
);
