<?php

include_once '../cargadores/autocargadores.php';

class ApiIngredientes {

    public function RespuestaIngredientes() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getIngredientes();
                break;
            case 'POST':
                $this->registrarIngredientes();
                break;
            case 'PUT':
                $this->actualizarIngredientes();
                break;
            case 'DELETE':
                $this->eliminarIngredientes();
                break;
        }
    }

    private function getIngredientes() {
        $procesarIngredientes = new ProcesarIngredientes();
        $procesarIngredientes->TraerIngredientesDesdeBD();
    }

    private function registrarIngredientes() {
        $procesarIngredientes = new ProcesarIngredientes();
        $procesarIngredientes->guardarIngrediente();
    }

    private function actualizarIngredientes() {
    }
    private function eliminarIngredientes() {

    }
}
$apiIngredientes = new ApiIngredientes();
$apiIngredientes->RespuestaIngredientes();
?>