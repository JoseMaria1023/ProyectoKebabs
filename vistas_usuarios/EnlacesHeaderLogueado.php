<?php
if (isset($_GET['menuLogin'])) {
    if ($_GET['menuLogin'] == "inicio") {
        require_once '../vistas_usuarios/InicioUsuario.php';
    }
   
    if ($_GET['menuLogin'] == "mostrarkebab") {
        require_once '../vistas_usuarios/MostrarKebab.php';
     
    }
    if ($_GET['menuLogin'] == "kebabpersonalizado") {
        require_once '../vistas_usuarios/KebabPersonalizado.php';
     
    }

    if ($_GET['menuLogin'] == "monedero") {
        require_once '../vistas_usuarios/monedero.php';
     
    }

    if ($_GET['menuLogin'] == "carrito") {
        require_once '../vistas_usuarios/Carrito.php';
     
    }




}?>