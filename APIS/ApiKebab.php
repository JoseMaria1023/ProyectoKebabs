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
    
        foreach ($kebabs as &$kebab) {
            if (!empty($kebab['foto'])) {
                // Comprimir el contenido base64 sin usar librerías externas
                $kebab['foto'] = $this->comprimirBase64($kebab['foto']);
            }
        }
    
        $this->enviarrespuesta(200, $kebabs);
    }

    private function comprimirBase64($base64, $factorCompresion = 0.5) {
        // Decodificar el contenido base64
        $binario = base64_decode($base64);
        if (!$binario) {
            return $base64; // Si falla, devolvemos la imagen original
        }
    
        // Comprimir reduciendo los datos binarios
        $tamanioOriginal = strlen($binario);
        $tamanioReducido = intval($tamanioOriginal * $factorCompresion);
    
        // Truncar o reducir el binario directamente
        $binarioComprimido = substr($binario, 0, $tamanioReducido);
    
        // Codificar nuevamente a base64
        return base64_encode($binarioComprimido);
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