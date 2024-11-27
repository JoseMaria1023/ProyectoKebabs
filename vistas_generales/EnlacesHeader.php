<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once './vistas_usuarios/InicioUsuario.php';
    }
    if ($_GET['menu'] == "login") {
        require_once './vistas_generales/InicioSesion.php';
    }
    if ($_GET['menu'] == "registro") {
        require_once './vistas_generales/registro.php';
     
    }
    if ($_GET['menu'] == "mostrarkebab") {
        require_once './vistas_usuarios/MostrarKebab.php';
     
    }
    if ($_GET['menu'] == "kebabpersonalizado") {
        require_once './vistas_usuarios/KebabPersonalizado.php';
     
    }



}?>