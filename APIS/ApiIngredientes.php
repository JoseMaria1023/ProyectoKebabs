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
        $repoIngredientes = new RepoIngredientes();
        $ingredientes = $repoIngredientes->TraerIngredientesDesdeBD(); 

        if ($ingredientes) {
            $this->sendResponse(200, $ingredientes);
        } else {
            $this->sendResponse(404, ["message" => "No se han encontrado ingredientes"]);
        }
    }

    private function registrarIngredientes() {
        $directorio = '../imagenes/';

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        $alergenos = isset($_POST['alergenosArray']) ? $_POST['alergenosArray'] : [];
        $alergenosString = implode(",", $alergenos);  

        $foto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $Archivo = $_FILES['foto']['name'];
            $rutaArchivo = $directorio . $Archivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
                $contenidoBinario = file_get_contents($rutaArchivo);
                $foto = base64_encode($contenidoBinario);
            }
        }

        $ingredientes = new Ingredientes($nombre, $descripcion, $precio, $alergenosString, $foto);

        $repoIngredientes = new RepoIngredientes();
        $GuardarIngrediente = $repoIngredientes->guardarIngredientes($ingredientes);

        if ($GuardarIngrediente) {
            $this->sendResponse(200, ["message" => "Nuevo ingrediente registrado"]);
        } else {
            $this->sendResponse(500, ["message" => "Error al registrar el ingrediente"]);
        }
    }

    private function actualizarIngredientes() {
    }

    private function eliminarIngredientes() {
    }

    private function sendResponse($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

$apiIngredientes = new ApiIngredientes();
$apiIngredientes->RespuestaIngredientes();

?>