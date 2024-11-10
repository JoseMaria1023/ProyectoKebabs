<?php

include_once '../cargadores/autocargadores.php';

class ProcesarKebab {
public function guardarKebab() {
    
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
}
public function mostrarKebab(){
    $repoKebabs = new RepoKebabs();
    $listaKebabs = $repoKebabs->obtenerTodosLosKebabs();

foreach ($listaKebabs as $kebab) {
    echo "ID: " . $kebab['id'];
    echo "Nombre: " . $kebab['nombre'];
    echo "Descripción: " . $kebab['descripcion'];
    echo "Precio Base: $" . $kebab['precio_base'];
}
}
}
?>