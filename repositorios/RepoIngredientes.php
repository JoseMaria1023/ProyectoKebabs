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
            $ingredientes->getFoto()
        ]);

        return $ingredientes;
    }

    public function getUltimoId() {
        return $this->conexion->lastInsertId();
    }

    public function guardarAlergenosIngrediente($idIngrediente, $alergenos) {

            foreach ($alergenos as $idAlergeno) {
                $stmt = $this->conexion->prepare("INSERT INTO ingrediente_alergenos (ingrediente_id, alergeno_id) VALUES (?, ?)");
                $stmt->execute([$idIngrediente, $idAlergeno]);
            }
            return true; 
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

    public function getIngredientes() {
        $stmt = $this->conexion->prepare("SELECT id, nombre , precio FROM ingredientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

       

}