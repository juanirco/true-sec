<?php

namespace Controllers;

use Classes\Email;
use Model\Photo;
use Model\Project;
use Model\User;
use MVC\Router;

class ProjectsController {
    public static function panel(Router $router) {
        isSession();
        isAuth();
        $alerts = [];
        $projects = Project::all();

        $router->render('admin/panel', [
            'title' => 'Panel',
            'projects' => $projects,
            'alerts' => $alerts
        ]);
    }

    public static function create_project(Router $router) {
        isSession();
        isAuth();
        $alerts = [];
        $existingPhotos = [];
        $project = new Project;
        $project->token = uniqid();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $project->sync($_POST);
            $alerts = $project->validate_form();
    
            if (empty($alerts)) {

                $projectexists = Project::wherefirst('token', $project->token);

                // debug($_POST);
                if (!$projectexists) {
                    if (!empty($_FILES['photos']['tmp_name'][0])) { // Verificar si se han proporcionado fotos
                    // Paso 1: Guardar el proyecto sin las fotos
                        $project->createdBy = $_SESSION['id'];
                        $project->save();
                        $projectexists = Project::wherefirst('token', $project->token);
                        $projectId = $projectexists->id;

                        $photoNames = array();
                            foreach ($_FILES['photos']['tmp_name'] as $index => $tmp_name) {
                                $photoName = md5(uniqid(rand(), true)) . strrchr($_FILES['photos']['name'][$index], '.');
                                $photoPath = $_SERVER['DOCUMENT_ROOT'] . '/photos/' . $projectId . '/' . $photoName;
            
                                // Crear el directorio si no existe
                                if (!is_dir(dirname($photoPath))) {
                                    mkdir(dirname($photoPath), 0777, true);
                                }
            
                                // Mover el archivo temporal al directorio de destino
                                if (move_uploaded_file($tmp_name, $photoPath)) {
                                    $photoNames[] = $photoName;
                                } 
                            }
        
                        // Paso 2: Asociar las fotos con el proyecto y guardarlas en la base de datos
                        foreach ($photoNames as $photoName) {
                            $photo = new Photo;
                            $photo->route = '/photos/' . $projectId . '/' . $photoName;
                            $photo->projectId = $projectId;
                            $photo->save();
                        }

                        Project::setAlert('success', 'Proyecto creado correctamente');
                        header('refresh:2; /panel');
                    } else {
                    $project->createdBy = $_SESSION['id'];
                    $project->save();
                    // Si no se proporcionan fotos, mostrar una alerta
                    Project::setAlert('error', 'Debes agregar mínimo una foto');
                    }
                } else {
                    $projectId = $projectexists->id;

                    $photoNames = array();
                        foreach ($_FILES['photos']['tmp_name'] as $index => $tmp_name) {
                            $photoName = md5(uniqid(rand(), true)) . strrchr($_FILES['photos']['name'][$index], '.');
                            $photoPath = $_SERVER['DOCUMENT_ROOT'] . '/photos/' . $projectId . '/' . $photoName;
        
                            // Crear el directorio si no existe
                            if (!is_dir(dirname($photoPath))) {
                                mkdir(dirname($photoPath), 0777, true);
                            }
        
                            // Mover el archivo temporal al directorio de destino
                            if (move_uploaded_file($tmp_name, $photoPath)) {
                                $photoNames[] = $photoName;
                            } 
                        }
    
                    // Paso 2: Asociar las fotos con el proyecto y guardarlas en la base de datos
                    foreach ($photoNames as $photoName) {
                        $photo = new Photo;
                        $photo->route = '/photos/' . $projectId . '/' . $photoName;
                        $photo->projectId = $projectId;
                        $photo->save();
                    }
                    Project::setAlert('success', 'Proyecto creado correctamente');
                    require_once __DIR__ . '/../public/sitemap_generator.php';
                    header('refresh:2; /panel');
                }
            }
        }
    
        $alerts = Project::getAlerts();
        $router->render('admin/create_project', [
            'title' => 'Crear Proyecto',
            'project' => $project,
            'alerts' => $alerts,
            'existingPhotos'=> $existingPhotos
        ]);
    }
    
    
    

    public static function update_project(Router $router) {
        isSession();
        isAuth();
        $alerts = [];
        $project = Project::where('id', s($_GET['id']));
        $existingPhotos = Photo::belongsTo('projectId', s($_GET['id']));

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $project->sync($_POST);
            $alerts = $project->validate_form();

            if (empty($alerts)) {

                if (empty($_FILES['photos']['tmp_name'][0]) && empty($existingPhotos)){
                    // Si no se proporcionan fotos, mostrar una alerta
                    Project::setAlert('error', 'Debes agregar mínimo una foto');
                } else{
                    $photoNames = array();
                    foreach ($_FILES['photos']['tmp_name'] as $index => $tmp_name) {
                        $photoName = md5(uniqid(rand(), true)) . strrchr($_FILES['photos']['name'][$index], '.');
                        $photoPath = $_SERVER['DOCUMENT_ROOT'] . '/photos/' . $project->id . '/' . $photoName;

                        // Mover el archivo temporal al directorio de destino
                        if (move_uploaded_file($tmp_name, $photoPath)) {
                            $photoNames[] = $photoName;
                        } 
                    }

                    // Paso 2: Asociar las fotos con el proyecto y guardarlas en la base de datos
                    foreach ($photoNames as $photoName) {
                        $photo = new Photo;
                        $photo->route = '/photos/' . $project->id . '/' . $photoName;
                        $photo->projectId = $project->id;
                        $photo->save();
                    }
                    $project->save();
                    Project::setAlert('success', 'Proyecto guardado correctamente');
                    header('refresh:0.3; /panel');
                }
            }
        }
        $alerts = Project::getAlerts();
        $router->render('admin/edit_project', [
            'title' => 'Editar Proyecto',
            'alerts' =>$alerts,
            'project' => $project,
            'existingPhotos'=> $existingPhotos
        ]);
    }

    public static function delete_project() {
        isSession();
        isAuth();
    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el ID del usuario de la solicitud POST
            $id = $_POST['id']; // Cambiar 'idUser' por 'id' si es el nombre que se está pasando desde el cliente
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $project = Project::find($id);
    
            if (!$project) {
                // Usuario no encontrado
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'El proyecto no fue encontrado']);
                exit;
            }
            
            $project->delete();
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'El proyecto ha sido eliminado correctamente']);
            require_once __DIR__ . '/../public/sitemap_generator.php';
            exit;
        }
    }

    public static function delete_photo() {
        isSession();
        isAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $photo_id = $_POST['photo_delete']; // Obtener el ID de la foto desde el formulario
    
            if (!empty($photo_id)) {
                $photo = Photo::find($photo_id);
    
                if ($photo) {
                    try {
                        // Eliminar la foto del servidor
                        unlink($_SERVER['DOCUMENT_ROOT'] . $photo->route);
                        // Eliminar la entrada de la foto de la base de datos
                        $photo->delete();
                        
                        // Devolver una respuesta de éxito
                        header('Content-Type: application/json');
                        echo json_encode(['success' => true, 'message' => 'La foto ha sido eliminada correctamente']);
                        exit;
                    } catch (Exception $e) {
                        // Manejar cualquier error que ocurra durante la eliminación
                        header('Content-Type: application/json');
                        echo json_encode(['success' => false, 'message' => 'Hubo un error al eliminar la foto']);
                        exit;
                    }
                } else {
                    // Si la foto no se encuentra en la base de datos, devolver un mensaje de error
                    header('Content-Type: application/json');
                    echo json_encode(['success' => false, 'message' => 'La foto no existe']);
                    exit;
                }
            } else {
                // Si no se proporcionó un ID de foto válido, devolver un mensaje de error
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'ID de foto no válido']);
                exit;
            }
        }
    }
    


    public static function members(Router $router) {
        isSession();
        isAuth();
        $alerts = [];
        $users = User::belongsTo('confirmed', '1');
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $guest = $_POST['email_invitation'];
    
            if(!$guest){
                User::setAlert('error', 'El email es obligatorio');
            } else if (!filter_var($guest, FILTER_VALIDATE_EMAIL)){
                User::setAlert('error', 'El formato del email no es válido');
            } else {
                $email = new Email($guest, $_SESSION['name'], '');
                $email->send_email_invitation();
                User::setAlert('success', 'La invitación se ha enviado correctamente');

                header('refresh: 2; /equipo');
            }
        }
    
        $alerts = User::getAlerts(); // Obtener las alertas generadas

        $router->render('admin/members', [
            'title' => 'Miembros del Equipo',
            'alerts' => $alerts,
            'users' => $users
        ]);
    }

    public static function delete_member() {
        isSession();
        isAuth();
    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el ID del usuario de la solicitud POST
            $id = $_POST['id']; // Cambiar 'idUser' por 'id' si es el nombre que se está pasando desde el cliente
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $user = User::find($id);
    
            if (!$user) {
                // Usuario no encontrado
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'message' => 'El usuario no fue encontrado']);
                exit;
            }
            
            $user->delete();
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'El usuario ha sido eliminado correctamente']);
            exit;
        }
    }
    

    public static function profile(Router $router) {
        isSession();
        isAuth();
        $alerts = [];
        $user =  User::find($_SESSION['id']);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sync($_POST);
            $alerts = $user->validate_profile();

            if(!empty($alerts)){
                $emailExists = User::where('email', $user->email);

                if(!empty($emailExists) && $emailExists->id !== $user->id){
                    User::setAlert('error', 'Email no válido, ya pertenece a otra cuenta');
                }
            } else {
                $user->save();
                User::setAlert('success', 'Usuario actualizado correctamente');
                $_SESSION['name'] = $user->name;
                header('refresh:2; /perfil');
            }
        }
        
        
        $alerts = User::getAlerts();
        $router->render('admin/profile', [
            'title' => 'Perfil',
            'alerts' => $alerts,
            'user' => $user
        ]);
    }

    public static function change_password(Router $router) {
        isSession();
        isAuth();
        $alerts = [];
        $user =  User::find($_SESSION['id']);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user->sync($_POST);
            $alerts = $user->new_password();

            if(empty($alerts)){
                $result = $user->verify_password();
                if($result){
                    $user->password = $user->new_password;
                    unset($user->actual_password);
                    unset($user->new_password);

                    $user->password_hash();
                    $user->save();

                    User::setAlert('success', 'Password actualizado');
                    header('refresh:2; /perfil');
                } else{
                    User::setAlert('error', 'Password incorrecto');
                }
            }
        }
        $alerts = User::getAlerts();
        $router->render('admin/c-password', [
            'title' => 'Cambiar Password',
            'alerts' => $alerts,
            'user' => $user
        ]);
    }
}