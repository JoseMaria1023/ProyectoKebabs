<?php

include_once '../cargadores/autocargadores.php';


class RepoKebabIngredientes{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

  
    public function guardarKebabIngrediente($idKebab, $idIngrediente, $nombreIngrediente) {
        $stmt = $this->conexion->prepare("INSERT INTO kebab_ingredientes (kebab_id, ingrediente_id, Ingrediente_nombre) VALUES (?, ?, ?)");
        $stmt->execute([$idKebab, $idIngrediente, $nombreIngrediente]); 
    }
    
    public function actualizarKebabIngredientes(Ingredientes $ingredientes) {
        $stmt = $this->conexion->prepare("UPDATE kebab_ingredientes SET nombre = ?, email = ?, direccion = ?, rol = ? WHERE id = ?");
        return $stmt->execute([
            $usuario->getNombre(), 
            $usuario->getEmail(), 
            $usuario->getDireccion(), 
            $usuario->getRol(), 
        ]);
    }

    public function eliminarKebabIngredientes($id) {
        $stmt = $this->conexion->prepare("DELETE FROM kebab_ingredientes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function obtenerIngredientesPorKebab($idKebab) {
        $stmt = $this->conexion->prepare("SELECT ingrediente_id FROM kebab_ingredientes WHERE kebab_id = ?");
        
        $stmt->execute([$idKebab]);
    
        $ingredientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $ingredientes ? $ingredientes : [];
    }

}