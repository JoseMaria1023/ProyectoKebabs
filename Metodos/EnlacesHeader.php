<?php
if (isset($_GET['header'])) {
    switch ($_GET['header']) {
        case "inicio":
            require_once './vistas_generales/principal.php';
            break;
        case "login":
            require_once './vistas_generales/InicioSesion.php';
            break;
        case "registro":
            require_once './vistas_generales/registro.php';
            break;
        case "cerrarsesion":
            require_once './vistas_generales/cerrarSesion.php';
            break;
        case "menu":
            require_once './vistas_usuarios/MostrarKebab.php';
            break;
        case "kebabPersonalizado":
            require_once './vistas_usuarios/KebabPersonalizado.php';
            break;
        case "pedidos":
            require_once './vistas_usuarios/PedidoUsuario.php';
            break;
        case "contacto":
            require_once './vistas_generales/contacto.php';
            break;
    }
} 
?>
