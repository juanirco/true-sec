<?php

namespace Controllers;

use MVC\Router;

class PagesController {
    //name of the function to be found in index.php

    public static function inicio(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/inicio',[
            'title' => 'Inicio',

        ]);
    }
}