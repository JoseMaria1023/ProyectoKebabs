<?php

include_once '../cargadores/autocargadores.php';

class ApiPedidosUsuarios {

    public function RespuestaPedidosUsuarios() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getPedidos();
                break;
            default:
                $this->enviarRespuesta(405, []);
                break;
        }
    }

    private function getPedidos() {
        session_start();  

        if (isset($_SESSION['user']['id'])) {
            $usuarioId = $_SESSION['user']['id'];

            $repoPedido = new RepoPedido();
            $pedidos = $repoPedido->getPedidosPorId($usuarioId);
            
            $repoUsuario = new RepoUsuarios();
            $usuario = $repoUsuario->obtenerPorId($usuarioId);

            if ($usuario && $pedidos) {
                $this->enviarRespuesta(200, [
                    "success" => true,
                    "usuario" => $usuario,  
                    "pedidos" => $pedidos
                ]);
            }
        } 
    }

    private function enviarRespuesta($status, $data = null) {
        header("Content-Type: application/json");
        http_response_code($status);

        echo json_encode($data);
    }
}

$apiPedidosUsuarios = new ApiPedidosUsuarios();
$apiPedidosUsuarios->RespuestaPedidosUsuarios();

?>
