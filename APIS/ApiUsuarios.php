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
    }

    private function registrarUsuario() {
        $procesarRegistro = new ProcesarRegistro();
        $procesarRegistro->procesarRegistroUsuario();
    }

    private function actualizarUsuario() {
    }
    private function eliminarUsuario() {

    }
}
$apiUsuarios = new ApiUsuarios();
$apiUsuarios->RespuestaUsuario();
?>