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
                $this->eliminarKebab();
                break;
        }
    }

    private function getKebabs() {
        $repoKebab = new RepoKebabs();
        $kebabs = $repoKebab->getKebabs(); 

        if ($kebabs) {
            $this->enviarrespuesta(201, $kebabs); 
        
        }
    }

    private function registrarKebab() {
        $directorio = '../imagenes/';

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        $ingredientes = isset($_POST['ingredientesArray']) ? $_POST['ingredientesArray'] : [];
        if (!is_array($ingredientes)) {
            $ingredientes = explode(",", $ingredientes);
        }
        
        $ingredientesString = implode(",", $ingredientes);  

        $foto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $Archivo = $_FILES['foto']['name'];
            $rutaArchivo = $directorio . $Archivo;

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
                $contenidoBinario = file_get_contents($rutaArchivo);
                $foto = base64_encode($contenidoBinario);
            }
        }

        $Kebabs = new Kebab($nombre, $descripcion, $precio, $foto);

        $repoKebab = new RepoKebabs();
        $repoKebabIngredientes = new RepoKebabIngredientes();

        $GuardarKebab = $repoKebab->guardarKebab($Kebabs);

        if ($GuardarKebab) {
            $idKebab = $repoKebab->getUltimoId();
    
            if (!empty($ingredientes)) {
                $repoKebabIngredientes->guardarKebabIngrediente($idKebab, $ingredientes);
            }
            $this->enviarrespuesta(200, ["message" => "Nuevo Kebab registrado"]);
        } 
    }

    private function actualizarKebabs() {
    }

    private function eliminarKebabs() {
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