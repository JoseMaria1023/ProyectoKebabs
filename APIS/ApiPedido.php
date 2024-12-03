<?php

include_once '../cargadores/autocargadores.php';

class ApiPedido {
    public function RespuestaPedido() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getPedido();
                break;
            case 'POST':
                $this->registrarPedido();
                break;
            case 'PUT':
                $this->actualizarPedido();
                break;
            case 'DELETE':
                $this->eliminarPedido();
                break;
        }
    }

    private function getPedido() {
        $repoPedidos = new RepoPedido();
        $pedidos = $repoPedidos->getPedidos();

        if ($pedidos) {
            $this->enviarrespuesta(201, $pedidos);
        }
    }

    public function registrarPedido() {
        $data = json_decode(file_get_contents("php://input"), true);

        $usuarioId = $data['usuarioId'];
        $total = $data['total'];
        $nombreKebab = $data['nombreKebab'];
        $fecha = date('Y-m-d');
        $estado = 'Recibido';

        $pedido = new Pedido($usuarioId, $fecha, $estado, $total, $nombreKebab);
        $repoPedido = new RepoPedido();

        $resultado = $repoPedido->guardarPedido($pedido);
        if ($resultado) {
            $this->enviarrespuesta(200);
        }
    }

    private function eliminarPedido() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $repoPedidos = new RepoPedidos();
            $resultado = $repoPedidos->eliminarPedido($id);

            if ($resultado) {
                $this->enviarrespuesta(200);
            } 
        }
    }
    private function enviarrespuesta($status, $data = null) {
        header("Content-Type: application/json");
        http_response_code($status);

        if ($data !== null) {
            echo json_encode($data);
        }
    }
}

$apiPedido = new ApiPedido();
$apiPedido->RespuestaPedido();

?>
