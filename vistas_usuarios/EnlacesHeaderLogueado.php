<?php
$menuLogin = isset($_GET['menuLogin']) ? $_GET['menuLogin'] : 'inicio';  

if ($menuLogin == "inicio") {
    require_once '../vistas_usuarios/InicioUsuario.php';
} elseif ($menuLogin == "mostrarkebab") {
    require_once '../vistas_usuarios/MostrarKebab.php';
} elseif ($menuLogin == "kebabpersonalizado") {
    require_once '../vistas_usuarios/KebabPersonalizado.php';
} elseif ($menuLogin == "monedero") {
    require_once '../vistas_usuarios/monedero.php';
} elseif ($menuLogin == "carrito") {
    require_once '../vistas_usuarios/Carrito.php';
} elseif ($menuLogin == "contacto") {
    require_once '../vistas_usuarios/Contacto.php';
} elseif ($menuLogin == "miperfil") {
    require_once '../vistas_usuarios/MiPerfil.php';
} elseif ($menuLogin == "mispedidos") {
    require_once '../vistas_usuarios/MisPedidos.php';
} else {
    require_once '../vistas_usuarios/InicioUsuario.php';  
}
?>
