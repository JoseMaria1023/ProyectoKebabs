<?php
$menuAdmin = isset($_GET['menuAdmin']) ? $_GET['menuAdmin'] : 'Usuarios';

switch ($menuAdmin){
        case 'Usuarios':
            require_once '../vistas_admin/GestionarUsuarios.php';
            break;
        case 'Ingredientes':
            require_once '../vistas_admin/GestionarIngredientes.php';
            break;
        case 'Kebabs':
            require_once '../vistas_admin/GestionarKebabs.php';
            break;
        case 'Pedidos':
            require_once '../vistas_admin/GestionarPedidos.php';
            break;
        case 'crearkebab':
            require_once '../vistas_admin/CrearKebab.php';
            break;
        case 'añadiringredientes':
            require_once '../vistas_admin/AñadirIngredientes.php';
            break;
        case 'EditarKebab':
            require_once '../vistas_admin/EditarKebab.php';
            break;
        default:
            require_once '../vistas_admin/GestionarUsuarios.php';
            break;
    
}
?>