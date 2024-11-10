<?php

class RepoKebabs {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardarKebab(Kebab $Kebab) {
        $stmt = $this->conexion->prepare("INSERT INTO kebabs (nombre, descripcion, PrecioBase) VALUES (?, ?, ?)");
        $stmt->execute([
            $Kebab->getNombre(), 
            $Kebab->getPrecioBase(),  
        ]);

        return $Kebab;
    }

    public function actualizarKebab(Kebab $Kebab) {
        $stmt = $this->conexion->prepare("UPDATE Kebabs SET nombre = ?, descripcion = ? WHERE id = ?");
        return $stmt->execute([
            $Kebab->getNombre(), 
            $Kebab->getDescripcion(),  
        ]);
    }

    public function eliminarKebab($id) {
        $stmt = $this->conexion->prepare("DELETE FROM Kebabs WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function TraerTodosLosKebabs() {
        $stmt = $this->conexion->prepare("SELECT * FROM kebabs");
        
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        
        $kebabs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $kebabs;
    }
}