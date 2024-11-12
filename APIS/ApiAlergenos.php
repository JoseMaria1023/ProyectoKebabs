<?php
include_once '../cargadores/autocargadores.php'; 

class ApiAlergenos {

    public function __construct() {
    }

    public function RespuestaAlergenos() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getAlergenos();
                break;
            case 'POST':
                $this->registrarAlergenos();
                break;
            case 'PUT':
                $this->actualizarAlergenos();
                break;
            case 'DELETE':
                $this->eliminarAlergenos();
                break;
        }
    }

    private function getAlergenos() {
        $repoAlergenos = new RepoAlergenos();
        $alergenos = $repoAlergenos->getAlergenos(); 

        if ($alergenos) {
            $this->sendResponse(200, $alergenos); 
        } else {
            $this->sendResponse(404, ["message" => "No se han encontrado alergenos"]);
        }
    }

    private function registrarAlergenos() {
    }

    private function actualizarAlergenos() {
    }

    private function eliminarAlergenos() {
    }

    private function sendResponse($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status); 
        echo json_encode($data);
    }
}

$apiAlergenos = new ApiAlergenos(); 
$apiAlergenos->RespuestaAlergenos(); 
?>
