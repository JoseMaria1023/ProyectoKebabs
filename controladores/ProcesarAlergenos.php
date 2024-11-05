<?php

include_once '../cargadores/autocargadores.php';

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];

$alergenos = new Alergeno($nombre, $descripcion);

$NuevoAlergeno = new RepoAlergenos();
$GuardarAlergeno = $repoAlergenos->guardarAlergeno($nombre, $descripcion);

if ($GuardarAlergeno) {
    echo "Nuevo alergeno registrado.";
} 
?>