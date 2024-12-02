<?php

include_once '../cargadores/autocargadores.php';


class RepoIngredientes{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

  
    public function guardarIngredientes(Ingredientes $ingredientes) {
        $stmt = $this->conexion->prepare("INSERT INTO ingredientes (nombre, precio, foto) VALUES (?, ?, ?)");
        $stmt->execute([
            $ingredientes->getNombre(), 
            $ingredientes->getPrecio(), 
            $ingredientes->getFoto(), 

        ]);

        return $ingredientes;
    }

    public function getUltimoId() {
        return $this->conexion->lastInsertId();
    }


    public function actualizarIngredientes(Ingredientes $ingredientes) {
        $stmt = $this->conexion->prepare("UPDATE ingredientes SET Precio = ? WHERE id = ?");
        return $stmt->execute([
            $ingredientes->getPrecio(),
            $ingredientes->getId()
        ]);
    }
    
    
    
    public function eliminarIngredientes($id) {
        $stmt = $this->conexion->prepare("DELETE FROM ingredientes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getIngredientes() {
        $stmt = $this->conexion->prepare("SELECT id, nombre , precio, foto FROM ingredientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerNombreIngredientePorId($idIngrediente) {
        $stmt = $this->conexion->prepare("SELECT nombre FROM ingredientes WHERE id = ?");
        
        $stmt->execute([$idIngrediente]);
    
        $ingrediente = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $ingrediente;
    }
    

       

}