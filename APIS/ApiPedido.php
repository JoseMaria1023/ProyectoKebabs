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
    
            $fecha = date('Y-m-d'); 
            $estado = 'Recibido';
    
            $pedido = new Pedido($usuarioId, $fecha, $estado, $total);
            $repoPedido = new RepoPedido();
            
            $resultado = $repoPedido->guardarPedido($pedido);
            if ($resultado) {
                $this->enviarrespuesta(200);
            } 
        } 
    

        private function actualizarPedido() {
            $datos = json_decode(file_get_contents("php://input"), true);
        
            if (isset($datos['id'], $datos['estado'])) {
                $id = $datos['id'];
                $estado = $datos['estado'];
        
                $repoPedidos = new RepoPedido();
                $resultado = $repoPedidos->actualizarEstadoPedido($id, $estado);
        
                if ($resultado) {
                    $this->enviarrespuesta(200);
                } 
            } 
        }
        
        

    private function eliminarPedido() {
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