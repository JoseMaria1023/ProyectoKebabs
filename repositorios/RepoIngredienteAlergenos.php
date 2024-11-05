<?php

include_once '../cargadores/autocargadores.php';


class RepoIngredientesAlergenos{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

  
    public function guardarIngredientesAlergenos(Ingredientes $ingredientes) {
        $stmt = $this->conexion->prepare("INSERT INTO ingrediente_alergenos (nombre, descripcion, precio, alergeno) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $ingredientes->getNombre(), 
            $ingredientes->getDescripcion(), 
            $ingredientes->getPrecio(),  
            $ingredientes->getAlergeno(), 
        ]);

        return $ingredientes;
    }

    public function actualizarIngredientesAlergenos(Ingredientes $ingredientes) {
        $stmt = $this->conexion->prepare("UPDATE ingrediente_alergenos SET nombre = ?, email = ?, direccion = ?, rol = ? WHERE id = ?");
        return $stmt->execute([
            $usuario->getNombre(), 
            $usuario->getEmail(), 
            $usuario->getDireccion(), 
            $usuario->getRol(), 
        ]);
    }

    public function eliminarIngredientesAlergenos($id) {
        $stmt = $this->conexion->prepare("DELETE FROM ingrediente_alergenos WHERE id = ?");
        return $stmt->execute([$id]);
    }


}