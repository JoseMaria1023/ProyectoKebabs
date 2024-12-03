<?php
$menuLogin = isset($_GET['menuLogin']) ? $_GET['menuLogin'] : 'inicio';

switch ($menuLogin) {
    case 'inicio':
        require_once '../vistas_usuarios/InicioUsuario.php';
        break;
    case 'mostrarkebab':
        require_once '../vistas_usuarios/MostrarKebab.php';
        break;
    case 'kebabpersonalizado':
        require_once '../vistas_usuarios/KebabPersonalizado.php';
        break;
    case 'monedero':
        require_once '../vistas_usuarios/monedero.php';
        break;
    case 'carrito':
        require_once '../vistas_usuarios/Carrito.php';
        break;
    case 'contacto':
        require_once '../vistas_usuarios/Contacto.php';
        break;
    case 'miperfil':
        require_once '../vistas_usuarios/MiPerfil.php';
        break;
    case 'mispedidos':
        require_once '../vistas_usuarios/MisPedidos.php';
        break;
    default:
        require_once '../vistas_usuarios/InicioUsuario.php';
        break;
}
?>
