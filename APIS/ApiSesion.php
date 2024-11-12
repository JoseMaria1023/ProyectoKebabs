<?php
include_once '../cargadores/autocargadores.php';

class ApiAuth {
    public function RespuestaAuth() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'POST':
                $this->iniciarSesion();
                break;
            case 'DELETE':
                $this->cerrarSesion();
                break;
            default:
                $this->sendResponse(405, ["message" => "Método no permitido"]);
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
    
            // Respuesta JSON
            $this->sendResponse(200, ["success" => true, "rol" => $usuario['rol']]);
        } else {
            $this->sendResponse(401, ["success" => false, "message" => "Email o contraseña incorrectos"]);
        }
    }
    

    private function cerrarSesion() {
        FuncionLogin::cierraSesion();
        $this->sendResponse(200, ["success" => true, "message" => "Sesión cerrada exitosamente"]);
    }

    private function sendResponse($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

$apiAuth = new ApiAuth();
$apiAuth->RespuestaAuth();

?>