<?php

// $router->get(
//     '/listticket',
//     'App\Controllers\TicketController@index'
// );

$router->get(
    '/addorder',
    'App\Controllers\OrderController@create'
);

// $router->post(
//     '/addticket',
//     'App\Controllers\TicketController@store'
// );

// $router->get(
//     '/editticket/(.*)',
//     'App\Controllers\TicketController@edit'
// );

// $router->post(
//     '/editticket',
//     'App\Controllers\TicketController@update'
// );

// $router->get(
//     '/deleteticket/(.*)',
//     'App\Controllers\TicketController@destroy'
// );
