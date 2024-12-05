<?php

include_once '../cargadores/autocargadores.php';

class ApiPerfil {

    public function RespuestaPerfil() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getPerfil();
                break;
        }
    }

    private function getPerfil() {
        session_start();
        if (isset($_SESSION['user']['id'])) {
            $usuarioId = $_SESSION['user']['id'];
            
            $repo = new RepoUsuarios();
            $usuario = $repo->obtenerPorId($usuarioId);
    
            if ($usuario) {
                $this->enviarRespuesta(200, [
                    "success" => true,
                    "usuario" => $usuario
                ]);
            } 
        } 
    }
    
    
    private function enviarRespuesta($status, $data = null) {
        header("Content-Type: application/json");
        http_response_code($status);

        if ($data !== null) {
            echo json_encode($data);
        }
    }
}

$apiPerfil = new ApiPerfil();
$apiPerfil->RespuestaPerfil();

?>
