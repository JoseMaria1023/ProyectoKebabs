<?php
include_once '../cargadores/autocargadores.php';

class RepoAlergenos {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardarAlergeno(Alergeno $Alergeno) {
        $stmt = $this->conexion->prepare("INSERT INTO alergenos (nombre, descripcion) VALUES (?, ?)");
        $stmt->execute([
            $Alergeno->getNombre(), 
            $Alergeno->getDescripcion(),  
        ]);
        return $Alergeno;
    }

    public function actualizarAlergeno(Alergeno $Alergeno) {
        $stmt = $this->conexion->prepare("UPDATE alergenos SET nombre = ?, descripcion = ? WHERE id = ?");
        return $stmt->execute([
            $Alergeno->getNombre(), 
            $Alergeno->getDescripcion(),  
            $Alergeno->getId(),  
        ]);
    }

    public function eliminarAlergeno($id) {
        $stmt = $this->conexion->prepare("DELETE FROM alergenos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getAlergenos() {
        $stmt = $this->conexion->prepare("SELECT id, nombre FROM alergenos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
