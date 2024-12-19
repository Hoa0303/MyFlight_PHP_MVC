<?php

$router->get(
    '/profile',
    'App\Controllers\ProfileController@index'
);



$router->get(
    '/myprofile/{\d+}',
    'App\Controllers\ProfileController@myprofile'
);

$router->post(
    '/editmyfrofile',
    'App\Controllers\ProfileController@update'
);

$router->get(
    '/deleteprofile/(\d+)',
    'App\Controllers\ProfileController@destroy'
);