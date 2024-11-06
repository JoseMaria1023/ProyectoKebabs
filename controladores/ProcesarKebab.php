<?php

include_once '../cargadores/autocargadores.php';

$directorio = '../imagenes/';


$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$foto = null;

$Archivo = $_FILES['foto']['name'];

$rutaArchivo = $directorio . $Archivo;

if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
    $contenidoBinario = file_get_contents($rutaArchivo);
    $foto = base64_encode($contenidoBinario);
}

?>