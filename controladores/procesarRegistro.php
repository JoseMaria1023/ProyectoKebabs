<?php
require_once '../repositorios/Conexion.php';

require_once '../repositorios/RepoUsuarios.php';

require_once '../entidades/Usuarios.php';

$username = $_POST['username'];
$password = $_POST['contrasenia'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];

$usuario = new Usuarios($username, $password, $email, $direccion, "usuario");

$repoUsuarios = new RepoUsuarios();
$usuarioGuardado = $repoUsuarios->guardar($usuario);

if ($usuarioGuardado) {
    echo "Usuario registrado exitosamente.";
} 
?>