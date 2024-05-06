<?php

function debug($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escape / Sanitize HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

// Function that checks if user is autenticated
function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /p-login');
        exit;
    }
}

function isSession() : void {
    if(!isset($_SESSION)) {
        session_start();
    }
}

function varSession() :void {
    if(!isset($_SESSION)) {
        $_SESSION = [];
    }
}

function avoidDoubleLogin() : void {
    if(isset($_SESSION['login'])) {
        header('Location: /panel');
        exit; // It is important to exit the code after redirecting
    }
}