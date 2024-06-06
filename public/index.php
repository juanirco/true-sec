<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\PagesController;
use Controllers\ProjectsController;
use MVC\Router;

$router = new Router();

// Public pages
$router->get('/', [PagesController::class, 'inicio']);
$router->get('/en', [PagesController::class, 'home']);
$router->get('/nosotros', [PagesController::class, 'nosotros']);
$router->get('/about_us', [PagesController::class, 'about_us']);
$router->get('/servicios', [PagesController::class, 'servicios']);
$router->get('/services', [PagesController::class, 'services']);
$router->get('/contacto', [PagesController::class, 'contacto']);
$router->get('/contact', [PagesController::class, 'contact']);
$router->post('/contacto', [PagesController::class, 'contacto']);
$router->post('/contact', [PagesController::class, 'contact']);
$router->get('/privacidad', [PagesController::class, 'privacidad']);
$router->get('/privacy', [PagesController::class, 'privacy']);
$router->get('/condiciones', [PagesController::class, 'condiciones']);
$router->get('/terms', [PagesController::class, 'terms']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->routesVerify();