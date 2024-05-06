<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function routesVerify()
    {
        // Sessión veryfy & inactive time here
        session_start();
        $inactivity_timeout = 3600; // Inactive time in seconds (60 min)
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $inactivity_timeout)) {
            // If inactive time has reached the maximun then it kills the session
            $_SESSION = [];
        }
        $_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time
    
        $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
    
        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }
    
        if ($fn) {
            // Call_user_func is going to call a function when we don't know which one will be
            call_user_func($fn, $this); // "This" is for arguments
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }
    

    public function render($view, $datos = [])
    {

        // It reads what we pass to the view
        foreach ($datos as $key => $value) {
            $$key = $value;  // Double ?? means variable of variable, which basically means our variable remains a the same but when assigning another variable value it is not rewritten, it keeps its value, then in this way the variables name is assigned dinamically.
        }

        ob_start(); // Memory stored for a moment

        // then we include the view to the layout
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean(); // Cleans Buffer
        include_once __DIR__ . '/views/layout.php';
    }
}
