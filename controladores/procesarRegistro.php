<?php
include_once '../cargadores/autocargadores.php';

$directorio = '../imagenes/';


$username = $_POST['username'];
$password = $_POST['contrasenia'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

$foto = null;

$Archivo = $_FILES['foto']['name'];

$rutaArchivo = $directorio . $Archivo;

if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
    $contenidoBinario = file_get_contents($rutaArchivo);
    $foto = base64_encode($contenidoBinario);
}
$usuario = new Usuarios($username, $password, $email, $direccion, "usuario", $foto);

$repoUsuarios = new RepoUsuarios();
$usuarioGuardado = $repoUsuarios->guardar($usuario);

if ($usuarioGuardado) {
    echo "Usuario registrado con exito.";
} 
?>