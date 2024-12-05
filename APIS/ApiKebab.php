<?php

include_once '../cargadores/autocargadores.php';

class ApiKebab {

    public function RespuestaKebab() {
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $this->getKebabs();
                break;
            case 'POST':
                $this->registrarKebab();
                break;
            case 'PUT':
                $this->actualizarKebab();
                break;
            case 'DELETE':
                $this->eliminarKebabs();
                break;
        }
    }

    private function getKebabs() {
        $repoKebab = new RepoKebabs();
        $Kebabs = $repoKebab->getKebabs(); 

        if ($Kebabs) {
            $this->enviarrespuesta(200, $Kebabs); 
        }
    }

    private function registrarKebab() {
        $directorio = '../imagenes/';
        
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio_base = $_POST['precio'];
        
        $ingredientes = isset($_POST['ingredientesArray']) ? $_POST['ingredientesArray'] : [];
                
        $foto = null;
        $archivo = $_FILES['foto']['name'];
        $rutaArchivo = $directorio . $archivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
            $contenidoBinario = file_get_contents($rutaArchivo);
            $foto = base64_encode($contenidoBinario);
        }
        
        $Kebabs = new Kebab($nombre, $descripcion, $precio_base, $foto);
        
        $repoKebab = new RepoKebabs();
        
        $GuardarKebab = $repoKebab->guardarKebab($Kebabs, $ingredientes);  
        
        if ($GuardarKebab) {
            $this->enviarrespuesta(200, ["message" => "Nuevo Kebab registrado"]);
        }
    }
    
    private function actualizarKebab() {
        $datos = json_decode(file_get_contents("php://input"), true);

        if (isset($datos['id'], $datos['nombre'], $datos['descripcion'], $datos['precio_base'])) {
            $id = $datos['id'];
            $nombre = $datos['nombre'];
            $descripcion = $datos['descripcion'];
            $precio_base = $datos['precio_base'];

            $kebab = new Kebab($nombre, $descripcion, $precio_base, null);
            $kebab->setId($id); 

            $repoKebabs = new RepoKebabs();
            $resultado = $repoKebabs->actualizarKebab($kebab);

            if ($resultado) {
                $this->enviarRespuesta(200, ["message" => "Kebab actualizado correctamente."]);
            } 
        } 
    }

    private function eliminarKebabs() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $repoKebab = new RepoKebabs();
            $resultado = $repoKebab->eliminarKebab($id);

            if ($resultado) {
                $this->enviarrespuesta(200);
            } 
        }
    }
    

    private function enviarrespuesta($status, $data) {
        header("Content-Type: application/json");
        http_response_code($status);
        echo json_encode($data);
    }
}

$apiKebab = new ApiKebab();
$apiKebab->RespuestaKebab();

?>
