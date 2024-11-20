<?php

class RepoKebabs {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardarKebab(Kebab $Kebab) {
        $stmt = $this->conexion->prepare("INSERT INTO kebabs (nombre, descripcion, precio_base, foto) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $Kebab->getNombre(), 
            $Kebab->getDescripcion(), 
            $Kebab->getPrecioBase(),  
            $Kebab->getFoto(), 

        ]);

        return $Kebab;
    }

    public function getUltimoId() {
        return $this->conexion->lastInsertId();
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

    public function getKebabs() {
        $stmt = $this->conexion->prepare("SELECT id, nombre, descripcion, precio_base, foto FROM kebabs");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}