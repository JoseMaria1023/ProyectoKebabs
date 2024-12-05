<?php

class RepoKebabs {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

public function guardarKebab(Kebab $Kebab, $ingredientes) {
    $stmt = $this->conexion->prepare("INSERT INTO kebabs (nombre, descripcion, precio_base, foto) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $Kebab->getNombre(),
        $Kebab->getDescripcion(),
        $Kebab->getPrecio_Base(),
        $Kebab->getFoto(),
    ]);
    
    $idKebab = $this->conexion->lastInsertId();  
    
    if (!empty($ingredientes)) {
        $repoKebabIngredientes = new RepoKebabIngredientes();
        
        foreach ($ingredientes as $ingredienteId) {
            $nombreIngrediente = $this->getNombreIngredienteById($ingredienteId);
            
            $repoKebabIngredientes->guardarKebabIngrediente($idKebab, $ingredienteId, $nombreIngrediente); 
        }
    }
    
    return $Kebab;
}

public function getNombreIngredienteById($idIngrediente) {
    $stmt = $this->conexion->prepare("SELECT nombre FROM ingredientes WHERE id = ?");
    $stmt->execute([$idIngrediente]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($resultado) {
        return $resultado['nombre'];  
    }
}
    public function getUltimoId() {
        return $this->conexion->lastInsertId();
    }

    public function actualizarKebab(Kebab $Kebab) {
        $stmt = $this->conexion->prepare("UPDATE Kebabs SET nombre = ?, descripcion = ?, precio_base = ?  WHERE id = ?");
        return $stmt->execute([
            $Kebab->getNombre(), 
            $Kebab->getDescripcion(),  
            $Kebab->getPrecio_Base(),
            $Kebab->getId()
        ]);
    }

    public function eliminarKebab($id) {
        $stmt = $this->conexion->prepare("DELETE FROM kebabs WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    
    public function getKebabs() {
        $stmt = $this->conexion->prepare(
            "SELECT k.id, k.nombre, k.descripcion, k.precio_base, k.foto
             FROM kebabs k"
        );
        $stmt->execute();
        $kebabs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($kebabs as &$kebab) {
            $stmt = $this->conexion->prepare(
                "SELECT ki.Ingrediente_nombre
                 FROM kebab_ingredientes ki
                 WHERE ki.kebab_id = :kebab_id"
            );
            $stmt->execute(['kebab_id' => $kebab['id']]);
            
            $ingredientes = $stmt->fetchAll(PDO::FETCH_COLUMN);
            $kebab['ingredientes'] = $ingredientes;
        }
    
        return $kebabs;
    }
}