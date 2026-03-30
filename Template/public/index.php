<?php
session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Tomodachi\Router($_SERVER["REQUEST_URI"]);

// --- AFFICHAGE (GET) ---
$router->get('/', "ControllerTomodachi@getMethod");
$router->get('/habitant/:id', "ControllerTomodachi@getHabitant");
$router->get('/nouveau', "ControllerTomodachi@create"); // URL à taper : /nouveau
$router->get('/habitant/edit/:id', "ControllerTomodachi@edit");

// --- ACTIONS (POST) ---
$router->post('/create', "ControllerTomodachi@store");
$router->post('/habitant/update/:id', "ControllerTomodachi@update");

// Supprime ou commente l'echo pour l'examen, car il peut bloquer les redirections
// echo "L'URL reçue est : " . $_SERVER["REQUEST_URI"];

$router->run();