<?php

include_once '../cargadores/autocargadores.php';


class RepoIngredientes{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

  
    public function guardarIngredientes(Ingredientes $ingredientes) {
        $stmt = $this->conexion->prepare("INSERT INTO ingredientes (nombre, descripcion, precio, alergeno) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $ingredientes->getNombre(), 
            $ingredientes->getDescripcion(), 
            $ingredientes->getPrecio(),  
            $ingredientes->getAlergeno(), 
        ]);

        return $ingredientes;
    }

    public function actualizarIngredientes(Ingredientes $ingredientes) {
        $stmt = $this->conexion->prepare("UPDATE ingredientes SET nombre = ?, email = ?, direccion = ?, rol = ? WHERE id = ?");
        return $stmt->execute([
            $usuario->getNombre(), 
            $usuario->getEmail(), 
            $usuario->getDireccion(), 
            $usuario->getRol(), 
        ]);
    }

    public function eliminarIngredientes($id) {
        $stmt = $this->conexion->prepare("DELETE FROM ingredientes WHERE id = ?");
        return $stmt->execute([$id]);
    }


}