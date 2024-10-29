<?php

class RepoIngredientes{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardarIngrediente(Ingrediente $ingrediente) {
        $stmt = $this->conexion->prepare("INSERT INTO ingredientes (id, nombre, precio, alergeno,foto) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$ingrediente->id, $ingrediente->nombre, $ingrediente->precio, $ingrediente->alergeno, $ingrediente->foto]);
        $ingrediente->id = $this->conexion->lastInsertId();
        return $ingrediente;
    }

    public function actualizarIngrediente(Ingrediente $ingrediente) {
        $stmt = $this->conexion->prepare("UPDATE ingredientes SET id = ?, nombre = ?, precio = ?,alergeno = ?,foto = ? WHERE id = ?");
        $stmt->execute([$kebab->id, $kebab->nombre, $kebab->precioBase]);
    }

  
    public function eliminarIngrediente($id) {
        $stmt = $this->conexion->prepare("DELETE FROM ingredientes WHERE id = ?");
        $stmt->execute([$id]);
    }

}