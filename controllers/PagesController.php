<?php

namespace Controllers;

use Classes\ContactEmail;
use Model\Photo;
use Model\Project;
use Model\User;
use MVC\Router;

class PagesController {
    //name of the function to be found in index.php

    public static function inicio(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $projects = Project::get_limit(6);
        $photos = Photo::all();
        $router->render('pages/inicio',[
            'title' => 'Inicio',
            'projects' => $projects,
            'photos' => $photos
        ]);
    }
    public static function home(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $projects = Project::get_limit(6);
        $photos = Photo::all();
        $router->render('pages/home',[
            'title' => 'Home',
            'projects' => $projects,
            'photos' => $photos
        ]);
    }

    public static function nosotros(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/nosotros',[
            'title' => 'Nosotros'
        ]);
    }
    public static function us(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/us',[
            'title' => 'About Us'
        ]);
    }

    public static function servicios(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/servicios',[
            'title' => 'Servicios'
        ]);
    }
    public static function services(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/services',[
            'title' => 'Services'
        ]);
    }

    public static function proyectos(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $projects = Project::all();
        $photos = Photo::all();
        $router->render('pages/proyectos',[
            'title' => 'Proyectos',
            'projects' => $projects,
            'photos' => $photos
        ]);
    }
    public static function projects(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $projects = Project::all();
        $photos = Photo::all();
        $router->render('pages/projects',[
            'title' => 'Projects',
            'projects' => $projects,
            'photos' => $photos
        ]);
    }

    public static function proyecto(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $project = Project::where('id', s($_GET['id']));
        $projectPhotos = Photo::belongsTo('projectId', s($_GET['id']));
        $router->render('pages/proyecto',[
            'title' => 'Proyecto',
            'project' => $project,
            'projectPhotos' => $projectPhotos
        ]);
    }

    public static function project(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $project = Project::where('id', s($_GET['id']));
        $projectPhotos = Photo::belongsTo('projectId', s($_GET['id']));
        $router->render('pages/project',[
            'title' => 'Project',
            'project' => $project,
            'projectPhotos' => $projectPhotos
        ]);
    }

    public static function contacto(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact_email = new ContactEmail($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['message']);
            $contact_email->receive_message();
            $contact_email->automatic_response();

            $alerts = User::setAlert('success', 'Mensaje enviado');
            header('refresh: 2.5; /contacto');
        }
        $alerts = User::getAlerts();
        $router->render('pages/contacto',[
            'title' => 'Contacto',
            'alerts' => $alerts
        ]);
    }
    public static function contact(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact_email = new ContactEmail($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['message']);
            $contact_email->receive_message();
            $contact_email->automatic_response_en();

            $alerts = User::setAlert('success', 'Message sent');
            header('refresh: 2.5; /contact');
        }
        $alerts = User::getAlerts();
        $router->render('pages/contact',[
            'title' => 'Contact',
            'alerts' => $alerts
        ]);
    }
    public static function privacidad(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/privacidad',[
            'title' => 'Politicas de Privacidad'
        ]);
    }

    public static function privacy(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/privacy',[
            'title' => 'Privacy Policy'
        ]);
    }

    public static function condiciones(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/condiciones',[
            'title' => 'Términos y Condiciones'
        ]);
    }

    public static function conditions(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/conditions',[
            'title' => 'Terms & Conditions'
        ]);
    }
    
}