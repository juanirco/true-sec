<?php

namespace Controllers;

use Classes\ContactEmail;
use Model\User;
use MVC\Router;

class PagesController {
    //name of the function to be found in index.php

    public static function inicio(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/inicio',[
            'title' => 'Inicio',
            'description' => 'Ciberseguridad de la vida real. Su hoja de ruta de evolución en ciberseguridad. Contactanos',
            'translate_link' => '/en'
        ]);
    }
    public static function home(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/home',[
            'title' => 'Home',
            'description' => 'Real-life cybersecurity. Your cybersecurity evolution roadmap. Contact us.',
            'translate_link' => '/'
        ]);
    }

    public static function nosotros(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/nosotros',[
            'title' => 'Nosotros',
            'description' => 'Nosotros | Ciberseguridad de la vida real. Su hoja de ruta de evolución en ciberseguridad. Contactanos',
            'translate_link' => '/about_us'
        ]);
    }
    public static function about_us(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/about_us',[
            'title' => 'About Us',
            'description' => 'About us | Real-life cybersecurity. Your cybersecurity evolution roadmap. Contact us.',
            'translate_link' => '/nosotros'
        ]);
    }

    public static function servicios(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/servicios',[
            'title' => 'Servicios',
            'description' => 'Servicios | Ciberseguridad de la vida real. Su hoja de ruta de evolución en ciberseguridad. Contactanos',
            'translate_link' => '/services'
        ]);
    }

    public static function services(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/services',[
            'title' => 'Services',
            'description' => 'Services | Real-life cybersecurity. Your cybersecurity evolution roadmap. Contact us.',
            'translate_link' => '/servicios'
        ]);
    }

    public static function contacto(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar reCAPTCHA
            // $recaptcha_secret = '6LdbDespAAAAAH-7cD3GEb2mniXqi2p4LVZ0Ul7R';
            // $recaptcha_response = $_POST['g-recaptcha-response'];
            // $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
            // $response_keys = json_decode($response, true);

            // if(intval($response_keys["success"]) !== 1) {
            //     $alerts = User::setAlert('error', 'reCAPTCHA verification failed. Please try again.');
            // } else {
                $contact_email = new ContactEmail($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['message']);
                $contact_email->receive_message();
                $contact_email->automatic_response();

                $alerts = User::setAlert('success', 'Mensaje enviado');
                header('refresh: 2.5; /contacto');
            // }
        }
        $alerts = User::getAlerts();
        $router->render('pages/contacto',[
            'alerts' => $alerts,
            'title' => 'Contacto',
            'description' => 'Contacto | Ciberseguridad de la vida real. Su hoja de ruta de evolución en ciberseguridad. Contactanos',
            'translate_link' => '/contact'
        ]);
    }

    public static function contact(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificar reCAPTCHA
            // $recaptcha_secret = '6LdbDespAAAAAH-7cD3GEb2mniXqi2p4LVZ0Ul7R';
            // $recaptcha_response = $_POST['g-recaptcha-response'];
            // $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
            // $response_keys = json_decode($response, true);

            // if(intval($response_keys["success"]) !== 1) {
            //     $alerts = User::setAlert('error', 'reCAPTCHA verification failed. Please try again.');
            // } else {
                $contact_email = new ContactEmail($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['message']);
                $contact_email->receive_message();
                $contact_email->automatic_response_en();

                $alerts = User::setAlert('success', 'Message sent');
                header('refresh: 2.5; /contact');
            // }
        }
        $alerts = User::getAlerts();
        $router->render('pages/contact',[
            'alerts' => $alerts,
            'title' => 'Contact',
            'description' => 'Contact | Real-life cybersecurity. Your cybersecurity evolution roadmap. Contact us.',
            'translate_link' => '/contacto'
        ]);
    }

    public static function privacidad(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/privacidad',[
            'title' => 'Políticas de Privacidad',
            'description' => 'Políticas de Privacidad | Ciberseguridad de la vida real. Su hoja de ruta de evolución en ciberseguridad. Contactanos',
            'translate_link' => '/privacy'
        ]);
    }

    public static function privacy(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/privacy',[
            'title' => 'Privacy Policy',
            'description' => 'Privacy Policy | Real-life cybersecurity. Your cybersecurity evolution roadmap. Contact us.',
            'translate_link' => '/privacidad'
        ]);
    }

    public static function condiciones(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/condiciones',[
            'title' => 'Términos y Condiciones',
            'description' => 'Términos y Condiciones | Ciberseguridad de la vida real. Su hoja de ruta de evolución en ciberseguridad. Contactanos',
            'translate_link' => '/terms'
        ]);
    }

    public static function terms(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/terms',[
            'title' => 'Terms & Conditions',
            'description' => 'Terms & Conditions | Real-life cybersecurity. Your cybersecurity evolution roadmap. Contact us.',
            'translate_link' => '/condiciones'
        ]);
    }
    
}