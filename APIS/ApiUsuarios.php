<?php
include_once '../cargadores/autocargadores.php';

class ApiUsuarios {

    public function RespuestaUsuario() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getUsuario();
                break;
            case 'POST':
                $this->registrarUsuario();
                break;
            case 'PUT':
                $this->actualizarUsuario();
                break;
            case 'DELETE':
                $this->eliminarUsuario();
                break;
        }
    }

    private function getUsuario() {
        $repoUsuarios = new RepoUsuarios();
        $usuarios = $repoUsuarios->getUsuarios(); 

        if ($usuarios) {
            $this->enviarrespuesta(200, $usuarios);
        } 
    }

    private function registrarUsuario() {
        $directorio = '../imagenes/';
        $nombre = $_POST['username'];
        $contrasenia = $_POST['contrasenia'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        
        $foto = null;
        $archivo = $_FILES['foto']['name'];
        $rutaArchivo = $directorio . $archivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
            $contenidoBinario = file_get_contents($rutaArchivo);
            $foto = base64_encode($contenidoBinario);
        }

        $usuario = new Usuarios($nombre, $contrasenia, $email, $direccion, "usuario", $foto);
        $repoUsuarios = new RepoUsuarios();
        $usuarioGuardado = $repoUsuarios->guardar($usuario);

        if ($usuarioGuardado) {
            $datosUsuario = [
                "Nombre" => $usuario->getNombre(),
                "Contrasenia" => $usuario->getContrasenia(),
                "email" => $usuario->getEmail(),
                "direccion" => $usuario->getDireccion(),
                "rol" => $usuario->getRol(),
                "foto" => $usuario->getFoto()
            ];

            $archivoJson = '../datos/usuarios.json';
            file_put_contents($archivoJson, json_encode($datosUsuario, JSON_PRETTY_PRINT));

        }
    }
    private function actualizarUsuario() {
        $datos = json_decode(file_get_contents("php://input"), true);
    
        if (isset($datos['id'], $datos['nombre'], $datos['email'], $datos['direccion'], $datos['rol'])) {
            $id = $datos['id'];
            $nombre = $datos['nombre'];
            $email = $datos['email'];
            $direccion = $datos['direccion'];
            $rol = $datos['rol'];
    
            $usuario = new Usuarios($nombre, null, $email, $direccion, $rol, null);
            $usuario->setId($id); 
    
            $repoUsuarios = new RepoUsuarios();
            $resultado = $repoUsuarios->actualizar($usuario);
    
            if ($resultado) {
                $this->enviarrespuesta(200);
            } 
        }
    }
    private function eliminarUsuario() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $repoUsuarios = new RepoUsuarios();
            $resultado = $repoUsuarios->eliminar($id);

            if ($resultado) {
                $this->enviarrespuesta(200);
            } 
        }
    }
    private function enviarrespuesta($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

$apiUsuarios = new ApiUsuarios();
$apiUsuarios->RespuestaUsuario();