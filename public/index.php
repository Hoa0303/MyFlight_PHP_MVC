<?php

define('SRC_DIR', __DIR__ . '/../src');
define('VIEWS_DIR', __DIR__ . '/../src/templates');

require_once SRC_DIR . '/bootstrap.php';

$router = new \Bramus\Router\Router();


require_once SRC_DIR . '/routes/nav.php';
require_once SRC_DIR . '/routes/ticket.php';
require_once SRC_DIR . '/routes/status.php';
require_once SRC_DIR . '/routes/order.php';
require_once SRC_DIR . '/routes/listflight.php';
require_once SRC_DIR . '/routes/listroute.php';
require_once SRC_DIR . '/routes/listairport.php';
require_once SRC_DIR . '/routes/listplane.php';
require_once SRC_DIR . '/routes/listairline.php';
require_once SRC_DIR . '/routes/listpriceticket.php';
require_once SRC_DIR . '/routes/listpriceflight.php';
require_once SRC_DIR . '/routes/profile.php';
require_once SRC_DIR . '/routes/auth.php';
require_once SRC_DIR . '/routes/flight.php';

$router->run();
