<?php
$router->post(
    '/login',
    'App\Controllers\AuthController@login'
);

$router->get(
    '/logout',
    'App\Controllers\AuthController@destroy'
);

$router->post(
    '/register',
    'App\Controllers\AuthController@register'
);