<?php
$menu = isset($_GET['menu']) ? $_GET['menu'] : 'inicio';  

if ($menu == "inicio") {
    require_once './vistas_usuarios/InicioUsuario.php';
} elseif ($menu == "login") {
    require_once './vistas_generales/InicioSesion.php';
} elseif ($menu == "registro") {
    require_once './vistas_generales/registro.php';
} elseif ($menu == "mostrarkebab") {
    require_once './vistas_usuarios/MostrarKebab.php';
} elseif ($menu == "kebabpersonalizado") {
    require_once './vistas_usuarios/KebabPersonalizado.php';
} elseif ($menu == "contacto") {
    require_once './vistas_usuarios/Contacto.php';
} else {
    require_once './vistas_usuarios/InicioUsuario.php';  
}
?>
