<?php
if (isset($_GET['menuAdmin'])) {
    if ($_GET['menuAdmin'] == "Usuarios") {
        require_once '../vistas_admin/GestionarUsuarios.php';
    }
    if ($_GET['menuAdmin'] == "Ingredientes") {
        require_once '../vistas_admin/GestionarIngredientes.php';
    }
    if ($_GET['menuAdmin'] == "Kebabs") {
        require_once '../vistas_admin/GestionarKebabs.php';
     
    }
    if ($_GET['menuAdmin'] == "Pedidos") {
        require_once '../vistas_admin/GestionarPedidos.php';
     
    }

    if ($_GET['menuAdmin'] == "crearkebab") {
        require_once '../vistas_admin/CrearKebab.php';
     
    }
    if ($_GET['menuAdmin'] == "añadiringredientes") {
        require_once '../vistas_admin/AñadirIngredientes.php';
     
    }
    if ($_GET['menuAdmin'] == "EditarKebab") {
        require_once '../vistas_admin/EditarKebab.php';
     
    }



}?>