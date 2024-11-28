<?php

include_once '../cargadores/autocargadores.php';
require_once '../repositorios/RepoIngredienteAlergenos.php';


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
        $repoIngrediente = new RepoIngredientes();
        $ingredientes = $repoIngrediente->getIngredientes(); 

        if ($ingredientes) {
            $this->enviarrespuesta(200, $ingredientes); 
        
        }
    }

    private function registrarIngredientes() {
        $directorio = '../imagenes/';
    
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
    
        $alergenos = isset($_POST['alergenosArray']) ? $_POST['alergenosArray'] : [];

        if (!is_array($alergenos)) {
            $alergenos = explode(",", $alergenos);
        }
        
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
    
        $ingredientes = new Ingredientes($nombre, $precio, $foto);
    
        $repoIngredientes = new RepoIngredientes();

        $repoIngreAlergenos = new RepoIngredientesAlergenos();

    
        $GuardarIngrediente = $repoIngredientes->guardarIngredientes($ingredientes);
    
        if ($GuardarIngrediente) {
            $idIngrediente = $repoIngredientes->getUltimoId();
    
            if (!empty($alergenos)) {
                $repoIngreAlergenos->guardarAlergenosIngrediente($idIngrediente, $alergenos);
            }
            $this->enviarrespuesta(200,["message" => "Nuevo Ingrediente registrado"]);
        } 
    }

    private function actualizarIngredientes() {
    }

    private function eliminarIngredientes() {
    }

    private function enviarrespuesta($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

$apiIngredientes = new ApiIngredientes();
$apiIngredientes->RespuestaIngredientes();

?>