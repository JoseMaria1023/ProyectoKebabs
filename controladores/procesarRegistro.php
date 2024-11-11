<?php
include_once '../cargadores/autocargadores.php';

class ProcesarRegistro {

    public function procesarRegistroUsuario() {
        $directorio = '../imagenes/';

        $nombre = $_POST['username'];
        $contrasenia = $_POST['contrasenia'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];

        $foto = null;
        $Archivo = $_FILES['foto']['name'];
        $rutaArchivo = $directorio . $Archivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
                $contenidoBinario = file_get_contents($rutaArchivo);
                $foto = base64_encode($contenidoBinario);
            } 

        $usuario = new Usuarios($nombre, $contrasenia, $email, $direccion, "usuario", $foto);

        $repoUsuarios = new RepoUsuarios();
        $usuarioGuardado = $repoUsuarios->guardar($usuario);

        

    }


}


?>
