<?php

require_once '../repositorios/Conexion.php';

require_once '../repositorios/RepoIngredientes.php';

require_once '../entidades/Ingredientes.php';

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$alergeno = $_POST['alergeno'];

$ingredientes = new Ingredientes($nombre, $precio, $alergeno);

$repoIngredientes = new RepoIngredientes();
$GuardarIngrediente=$RepoIngredientes->guardarIngredientes($ingredientes);

if ($GuardarIngrediente) {
    echo "Nuevo Ingrediente registrado.";
} 
?>