 <?php
include_once '../cargadores/autocargadores.php';


$email = $_POST['email'];
$password = $_POST['password']; 

$repo = new RepoUsuarios();
$usuario = $repo->obtenerPorEmail($email); 

if ($usuario) {
    if ($usuario['contraseña'] === $password) { 
        FuncionLogin::entralogin($usuario);
        header("Location: ../vistas_admin/AñadirIngredientes.php");
        exit();
    } else {
        echo "Email o contraseña incorrectas"; 
    }
}
?>