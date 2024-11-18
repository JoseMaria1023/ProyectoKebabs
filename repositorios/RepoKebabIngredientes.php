<?php

include_once '../cargadores/autocargadores.php';


class RepoKebabIngredientes{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

  
    public function guardarKebabIngrediente($idKebab, $ingredientes) {

        foreach ($ingredientes as $idIngrediente) {
            $stmt = $this->conexion->prepare("INSERT INTO kebab_ingredientes (kebab_id, ingrediente_id) VALUES (?, ?)");
            $stmt->execute([$idKebab, $idIngrediente]);
        }
        return true; 
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


}