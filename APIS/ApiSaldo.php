<?php

include_once '../cargadores/autocargadores.php';

class ApiSaldo {

    public function RespuestaSaldo() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getSaldo();
                break;
            case 'POST':
                $this->añadirFondos();
                break;
            case 'PUT':
                break;
            case 'DELETE':
                break;
        }
    }

    private function getSaldo() {
        $usuario = FuncionLogin::leer_sesion();
        
        if ($usuario) {
            $saldo = isset($_SESSION['user']['saldo']) ? $_SESSION['user']['saldo'] : '0.00';
            $this->enviarrespuesta(200, ['saldo' => $saldo]);
        } 
    }

    private function añadirFondos() {
        $usuario = FuncionLogin::leer_sesion();
        
        if ($usuario) {
            $datos = json_decode(file_get_contents('php://input'), true);

            if (isset($datos['cantidad']) && is_numeric($datos['cantidad']) && $datos['cantidad'] > 0) {
                $_SESSION['user']['saldo'] += $datos['cantidad'];
                
                $this->enviarrespuesta(200, ['nuevoSaldo' => $_SESSION['user']['saldo']]);
            } 
        } 
    }

    private function enviarrespuesta($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

$apiSaldo = new ApiSaldo();
$apiSaldo->RespuestaSaldo();

?>
