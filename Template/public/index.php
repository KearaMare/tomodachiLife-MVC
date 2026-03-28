<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Tomodachi\Router($_SERVER["REQUEST_URI"]);

// Get Routes
$router->get('/', "ControllerTomodachi@getMethod");

// Post Routes
$router->post('/', "ControllerTomodachi@postMethod");

$router->run();
