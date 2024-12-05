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
        
        $alergeno = isset($_POST['alergeno']) ? $_POST['alergeno'] : null;
    
        $foto = null;
        $archivo = $_FILES['foto']['name'];
        $rutaArchivo = $directorio . $archivo;

         if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
            $contenidoBinario = file_get_contents($rutaArchivo);
            $foto = base64_encode($contenidoBinario);
        }
        
    
        $ingredientes = new Ingredientes($nombre, $precio, $foto);
        $repoIngredientes = new RepoIngredientes();
        $repoIngreAlergenos = new RepoIngredientesAlergenos();
        
        $GuardarIngrediente = $repoIngredientes->guardarIngredientes($ingredientes);
        
        if ($GuardarIngrediente) {
            $idIngrediente = $repoIngredientes->getUltimoId();
            
            if (!empty($alergeno)) {
                $repoIngreAlergenos->guardarAlergenoIngrediente($idIngrediente, $alergeno);
            }
            
            $this->enviarrespuesta(200, []);
        } 
    }
    
    private function actualizarIngredientes() {
        $datos = json_decode(file_get_contents("php://input"), true);
    
        $id = $datos['id'];
        $Precio = $datos['Precio'];
        $nombre = $datos['nombre'];
    
        $ingredientes = new Ingredientes($nombre, $Precio, null);
        $ingredientes->setId($id);
    
        $repoIngredientes = new RepoIngredientes();
        $repoIngredientes->actualizarIngredientes($ingredientes);
    
        $this->enviarrespuesta(200, []);
    }

    private function eliminarIngredientes() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $repoIngrediente = new RepoIngredientes();
            $repoIngrediente->eliminarIngredientes($id);
    
            $this->enviarrespuesta(200, []);  
        }
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