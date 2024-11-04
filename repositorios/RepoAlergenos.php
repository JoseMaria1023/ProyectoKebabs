<?php


include_once '../cargadores/autocargador.php';

class RepoAlergenos {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardarAlergeno(Alergeno $Alergeno) {
        $stmt = $this->conexion->prepare("INSERT INTO alergenos (nombre, descripcion) VALUES (?, ?)");
        $stmt->execute([
            $alergeno->getNombre(), 
            $alergeno->getDescripcion(),  
        ]);

        return $alergeno;
    }

    public function actualizarAlergeno(Alergeno $Alergeno) {
        $stmt = $this->conexion->prepare("UPDATE alergenos SET nombre = ?, descripcion = ? WHERE id = ?");
        return $stmt->execute([
            $alergeno->getNombre(), 
            $alergeno->getDescripcion(),  
        ]);
    }

    public function eliminarAlergeno($id) {
        $stmt = $this->conexion->prepare("DELETE FROM alergenos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>