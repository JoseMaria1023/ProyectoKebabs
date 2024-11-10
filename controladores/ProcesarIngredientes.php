<?php

include_once '../cargadores/autocargadores.php';

class ProcesarIngredientes {

    public function guardarIngrediente() {
        $directorio = '../imagenes/';

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $alergeno = $_POST['alergenos'];

        $foto = null;
        $Archivo = $_FILES['foto']['name'];
        $rutaArchivo = $directorio . $Archivo;


        if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
            $contenidoBinario = file_get_contents($rutaArchivo);
            $foto = base64_encode($contenidoBinario);
        }

        $ingredientes = new Ingredientes($nombre, $descripcion, $precio, $alergeno, $foto);

        $repoIngredientes = new RepoIngredientes();
        $GuardarIngrediente = $repoIngredientes->guardarIngredientes($ingredientes);

        if ($GuardarIngrediente) {
            echo "Nuevo Ingrediente registrado.";
        }
    }

    public static function TraerIngredientesAJson() {
        $repoIngredientes = new RepoIngredientes();
        $ingredientes = $repoIngredientes->TraerIngredientesDesdeBD();

        $resultado = [];
        foreach ($ingredientes as $ingrediente) {
            $resultado[] = [
                'nombre' => $ingrediente->getNombre(),
                'precio' => $ingrediente->getPrecio(),
                'alergeno' => $ingrediente->getAlergeno(),
                'foto' => $ingrediente->getFoto() 
            ];
        }
        echo json_encode($resultado);
    }
}
ProcesarIngredientes::TraerIngredientesAJson();

?>
