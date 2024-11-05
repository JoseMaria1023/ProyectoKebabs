<?php

include_once '../cargadores/autocargadores.php';


class RepoKebabIngredientes{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

  
    public function guardarKebabIngredientes(Ingredientes $ingredientes) {
        $stmt = $this->conexion->prepare("INSERT INTO kebab_ingredientes (nombre, descripcion, precio, alergeno) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $ingredientes->getNombre(), 
            $ingredientes->getDescripcion(), 
            $ingredientes->getPrecio(),  
            $ingredientes->getAlergeno(), 
        ]);

        return $ingredientes;
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