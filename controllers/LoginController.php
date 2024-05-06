<?php

namespace Controllers;

use Classes\Email;
use Model\User;
use MVC\Router;

class LoginController{
    public static function login(Router $router) {
        avoidDoubleLogin();
        $alerts = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user = new User($_POST);
            $alerts = $user->validate_login();
            if(empty($alerts)){
                $user = User::where('email', $user->email);
                if(empty($user) || !$user->confirmed) {
                    User::setAlert('error', 'El usuario no existe o no ha sido confirmado');
                } else {
                    if( password_verify($_POST['password'], $user->password) ) {
                        isSession();
                        $_SESSION['id'] = $user->id;
                        $_SESSION['name'] = $user->name;
                        $_SESSION['lastname'] = $user->lastname;
                        $_SESSION['email'] = $user->email;
                        $_SESSION['login'] = true;
    
                        header('Location: /panel');
    
                    } else{
                        User::setAlert('error', 'Usuario o contraseña incorrecta');
                    }
                }
            }
        }
        $alerts = User::getAlerts();
        $router->render('admin/p-login', [
            'title' => 'Iniciar Sesión',
            'alerts' => $alerts
        ]);
    }

    public static function logout(Router $router) {
        isSession();
        $_SESSION = [];
        header('Location: /p-login');
    }

    public static function create(Router $router) {
        avoidDoubleLogin();
        $alerts = [];
        $user = new User;
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sync($_POST);
            $alerts = $user->validate_account();

            if(!empty($alerts)){
                $emailExists = User::where('email', $user->email);

                if(!empty($emailExists)) {
                    User::setAlert('error', 'Ya existe un usuario con ese correo');
                    $alerts = User::getAlerts();
                }
            } else {
                $user->password_hash();
                unset($user->password2);

                $user->create_token();
                $email = new Email($user->email, $user->name, $user->token);
                $email->sendConfirmation();

                $result = $user->save();
                if($result){
                    header('Location: /m-email');
                }
            }
        }
        $router->render('/admin/c-account', [
            'title' => 'Crear Usuario',
            'alerts' => $alerts,
            'user' => $user
        ]);
    }

    public static function forgot(Router $router) {
        avoidDoubleLogin();
        $alerts = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new User($_POST);
            $alerts = $auth->validate_email();

            if(empty($alerts)){
                $user = User::where('email', $auth->email);

                if ($user && $user-> confirmed === "1") {
                    $user->create_token();
                    unset($user->password2);
                    $user->save();

                    $email = new Email($user->email, $user->name, $user->token);
                    $email->sendInstructions();

                    User::setAlert('success', 'Revisa tu bandeja de entrada');
                } else {
                    User::setAlert('error', 'El email ingresado no ha sido registrado aún');
                }
            }
        }
        $alerts = User::getAlerts();
        $router->render('/admin/f-password', [
            'title' => 'Olvide Password',
            'alerts' => $alerts
        ]);
    }

    public static function reset(Router $router) {
        avoidDoubleLogin();
        $alerts = [];
        $token = s($_GET['token']);
        $result = '';
        if(!$token) header('Location: /p-login');

        $user = User::where('token', $token);
        if (empty($user)) {
            User::setAlert('error', 'El token no es válido');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pass = new User($_POST);
            $alerts = $pass->validate_password();

            if(empty($alerts)){

                unset($user->password2);

                $user->password = $pass->password;
                $user->password_hash();
                $user->token = '';

                $result = $user->save();

                User::setAlert('success', 'Password restablecido correctamente, serás redirigido a la pagina de Inicio de Sesión a continuación');

                if($result){
                    header('refresh:5; /p-login');
                }    
            }
        }
        $alerts = User::getAlerts();
        $router->render('/admin/r-password', [
            'title' => 'Restablecer Password',
            'alerts' => $alerts,
            'user' => $user
        ]);
    }

    public static function message(Router $router) {
        avoidDoubleLogin();
        $router->render('/admin/m-email', [
            'title' => 'Mensaje Confirmar',
        ]);
    }

    public static function confirm(Router $router) {
        avoidDoubleLogin();
        $alerts = [];
        $token = s($_GET['token']);

        $user = User::where('token', $token);

        if (empty($user)) {
            User::setAlert('error', 'Usuario no existe o no es válido');
        } else{
            
            $user->confirmed = 1;
            $user->token = '';
            unset($user->password2);
            $user->save();
            
            User::setAlert('success', 'Cuenta confirmada correctamente');

            header('refresh: 5; /p-login');
        }
        $alerts = User::getAlerts();

        $router->render('/admin/m-confirm', [
            'title' => 'Confirmar Cuenta',
            'alerts' => $alerts,
            'user' => $user
        ]);
    }
}