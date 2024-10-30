<?php

function iniciaSesion() {
    session_start();
}

function cierraSesion() {
    session_destroy(); 
}

function entralogin($user) {
    iniciaSesion();
    if (!empty($user)) {
        $_SESSION['user'] = $user;
    }
}

function estalogeado() {
    iniciaSesion();
    return isset($_SESSION['user']);
}

function leer_sesion() {
    iniciaSesion();
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}

function escribir_sesion($key, $value) {
    iniciaSesion();
    $_SESSION[$key] = $value;
}

?>