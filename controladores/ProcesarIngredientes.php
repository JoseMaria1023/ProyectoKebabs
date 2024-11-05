<?php

include_once '../cargadores/autocargadores.php';


$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$alergeno = $_POST['alergenos'];

$ingredientes = new Ingredientes($nombre,$descripcion, $precio, $alergeno);

$repoIngredientes = new RepoIngredientes();
$GuardarIngrediente=$repoIngredientes->guardarIngredientes($ingredientes);

if ($GuardarIngrediente) {
    echo "Nuevo Ingrediente registrado.";
} 
?>