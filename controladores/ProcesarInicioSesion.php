<?php
include_once '../cargadores/autocargador.php';


$email = $_POST['email'];
$password = $_POST['password']; 

$repo = new RepoUsuarios();
$usuario = $repo->obtenerPorEmail($email); 

if ($usuario) {
    if ($usuario['contraseña'] === $password) { 
        entralogin($usuario);
        header("Location: ../vistas/footer.php");
        exit();
    } else {
        echo "Email o contraseña incorrectas"; 
    }
}
?>