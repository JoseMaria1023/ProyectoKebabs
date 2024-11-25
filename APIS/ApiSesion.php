<?php
include_once '../cargadores/autocargadores.php';

class ApiSesion {
    public function RespuestaSesion() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'POST':
                $this->iniciarSesion();
                break;
            case 'DELETE':
                $this->cerrarSesion();
                break;
            case 'GET':
                $this->obtenerSesion(); 
                break;
        }
    }

    private function iniciarSesion() {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $repo = new RepoUsuarios();
        $usuario = $repo->obtenerPorEmail($email);
    
        if ($usuario && $usuario['contraseña'] === $password) {
            FuncionLogin::entralogin($usuario);
            $_SESSION['user']['id'] = $usuario['id'];  
            $_SESSION['user']['saldo'] = $usuario['saldo'];  
            $this->enviarrespuesta(200, ["success" => true, "rol" => $usuario['rol']]);
        } 
    }
    
    private function cerrarSesion() {
        if (isset($_SESSION['user'])) {
            FuncionLogin::cierraSesion();
            $this->enviarrespuesta(200, ["success" => true, "mensaje" => "Sesión cerrada correctamente"]);
        } 
    }
    private function obtenerSesion() {
        session_start();
    
        if (isset($_SESSION['user']['id'])) {
            $this->enviarrespuesta(200, ["success" => true, "usuarioId" => $_SESSION['user']['id']]);
        } 
    }

    private function enviarrespuesta($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

$apiSesion = new ApiSesion();
$apiSesion->RespuestaSesion();