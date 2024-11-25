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
        $Kebabs = $repoKebab->getKebabs(); 

        if ($Kebabs) {
            $this->enviarrespuesta(201, $Kebabs); 
        }
    }

    private function registrarKebab() {
        $directorio = '../imagenes/';

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio_base = $_POST['precio'];

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

        $Kebabs = new Kebab($nombre, $descripcion, $precio_base, $foto);

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
