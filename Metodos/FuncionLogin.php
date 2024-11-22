<?php

include_once '../cargadores/autocargadores.php';


class FuncionLogin {
    public static function iniciaSesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    

    public static function cierraSesion() {
        session_destroy(); 
    }

    public static function entralogin($usuario) {
        self::iniciaSesion();
        if (!empty($usuario)) {
            $_SESSION['user'] = $usuario;
        }
    }
    
    public static function estalogeado() {
        self::iniciaSesion();
        return isset($_SESSION['user']);
    }

    public static function leer_sesion() {
        self::iniciaSesion();
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    public static function escribir_sesion($key, $value) {
        self::iniciaSesion();
        $_SESSION[$key] = $value;
    }
}
?>