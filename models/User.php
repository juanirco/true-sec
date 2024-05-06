<?php

namespace Model;

class User extends ActiveRecord{
    protected static $table = 'users';
    protected static $columnsDB = ['id', 'name', 'lastname', 'email', 'password', 'token', 'confirmed'];

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $password2;
    public $actual_password;
    public $new_password;
    public $token;
    public $confirmed;
    
    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->lastname = $args['lastname'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->actual_password = $args['actual_password'] ?? '';
        $this->new_password = $args['new_password'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmed = $args['confirmed'] ?? 0;
    }

    public function validate_account() : array {
        if(!$this->name) {
            self::$alerts['error'][] = 'El nombre es obligatorio';
        } // El [] luego de ['error'] es para indicar que debe agregarse al final del arreglo
        if(!$this->lastname) {
            self::$alerts['error'][] = 'El apellido es obligatorio';
        } // El [] luego de ['error'] es para indicar que debe agregarse al final del arreglo
        if(!$this->email) {
            self::$alerts['error'][] = 'El email es obligatorio';
        }
        if(!$this->password) {
            self::$alerts['error'][] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 8 ) {
            self::$alerts['error'][] = 'El password debe contener al menos 8 caracteres';
        }
         // Verificar al menos una minúscula, una mayúscula y un caracter especial
        if (!preg_match('/[a-z]/', $this->password) || !preg_match('/[A-Z]/', $this->password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $this->password)) {
            self::$alerts['error'][] = 'El password debe contener mínimo una mayúscula, una minúscula y un caracter especial';
        }
        if($this->password !== $this->password2) {
            self::$alerts['error'][] = 'Ambos passwords deben coincidir';
        }
        return self::$alerts;
    }

    public function validate_password() : array {
        if(!$this->password) {
            self::$alerts['error'][] = 'El password es obligatorio';
        }
        if(strlen($this->password) < 8 ) {
            self::$alerts['error'][] = 'El password debe contener al menos 8 caracteres';
        }
         // Verificar al menos una minúscula, una mayúscula y un caracter especial
        if (!preg_match('/[a-z]/', $this->password) || !preg_match('/[A-Z]/', $this->password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $this->password)) {
            self::$alerts['error'][] = 'El password debe contener mínimo una mayúscula, una minúscula y un caracter especial';
        }
        if($this->password !== $this->password2) {
            self::$alerts['error'][] = 'Ambos passwords deben coincidir';
        }
        return self::$alerts;
    }

    public function validate_login() : array {
        if(!$this->email) {
            self::$alerts['error'][] = 'El email es obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alerts['error'][] = 'Email no válido';
        }
        if(!$this->password) {
            self::$alerts['error'][] = 'El password es obligatorio';
        }

        return self::$alerts;
    }

    public function validate_email() : array {
        if(!$this->email) {
            self::$alerts['error'][] = 'El email es obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alerts['error'][] = 'El formato del email no es válido';
        }
        return self::$alerts;
    }

    public function validate_profile() : array {
        if(!$this->name) {
            self::$alerts['error'][] = 'El nombre es Obligatorio';
        }
        if(!$this->lastname) {
            self::$alerts['error'][] = 'El apellido es Obligatorio';
        }
        if(!$this->email) {
            self::$alerts['error'][] = 'El email es Obligatorio';
        }
        return self::$alerts;
    }

    public function new_password() : array {
        if(!$this->actual_password) {
            self::$alerts['error'][] = 'El Password actual no puede ir vacio';
        }
        if(!$this->new_password) {
            self::$alerts['error'][] = 'El Password nuevo no puede ir vacio';
        }
        if(strlen($this->new_password) < 8 ) {
            self::$alerts['error'][] = 'El password nuevo debe contener al menos 8 caracteres';
        }
         // Verificar al menos una minúscula, una mayúscula y un caracter especial
        if (!preg_match('/[a-z]/', $this->new_password) || !preg_match('/[A-Z]/', $this->new_password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $this->new_password)) {
            self::$alerts['error'][] = 'El password nuevo debe contener mínimo una mayúscula, una minúscula y un caracter especial';
        }
        return self::$alerts;
    }

    public function verify_password() : bool{
        return password_verify($this->actual_password, $this->password);
    }

    public function password_hash() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function create_token() : void  {
        $this->token = uniqid();
    }

    public function validate_invitation_email() : array {
        if(!$this->email) {
            self::$alerts['error'][] = 'El email es obligatorio';
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alerts['error'][] = 'El formato del email no es válido';
        }
        return self::$alerts;
    }

}