<?php
include_once '../cargadores/autocargadores.php';

$username = $_POST['username'];
$password = $_POST['contrasenia'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

$usuario = new Usuarios($username, $password, $email, $direccion, "usuario");

$repoUsuarios = new RepoUsuarios();
$usuarioGuardado = $repoUsuarios->guardar($usuario);

if ($usuarioGuardado) {
    echo "Usuario registrado con exito.";
} 
?>