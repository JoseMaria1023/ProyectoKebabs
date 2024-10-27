<?php

class RepoKebabs {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardar(Kebab $kebab) {
        $stmt = $this->conexion->prepare("INSERT INTO kebabs (id, nombre, precioBase) VALUES (?, ?, ?)");
        $stmt->execute([$kebab->id, $kebab->nombre, $kebab->precioBase]);
        $kebab->id = $this->conexion->lastInsertId();
        return $kebab;
    }

    public function actualizar(Kebab $kebab) {
        $stmt = $this->conexion->prepare("UPDATE kebabs SET id = ?, nombre = ?, precioBase = ?, WHERE id = ?");
        $stmt->execute([$kebab->id, $kebab->nombre, $kebab->precioBase]);
    }

    // Eliminar un usuario
    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM kebabs WHERE id = ?");
        $stmt->execute([$id]);
    }

}