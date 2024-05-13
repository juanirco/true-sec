<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\PagesController;
use Controllers\ProjectsController;
use MVC\Router;

$router = new Router();

// Public pages
$router->get('/', [PagesController::class, 'inicio']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->routesVerify();