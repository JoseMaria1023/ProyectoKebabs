<?php

include_once '../cargadores/autocargadores.php';


class RepoIngredientesAlergenos{
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

  
    public function guardarAlergenosIngrediente($idIngrediente, $alergenos) {

        foreach ($alergenos as $idAlergeno) {
            $stmt = $this->conexion->prepare("INSERT INTO ingrediente_alergenos (ingrediente_id, alergeno_id) VALUES (?, ?)");
            $stmt->execute([$idIngrediente, $idAlergeno]);
        }
        return true; 
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