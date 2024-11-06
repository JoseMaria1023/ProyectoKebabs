<?php

include_once '../cargadores/autocargadores.php';

class RepoUsuarios {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardar(Usuarios $usuario) {
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, contraseña, email, direccion, rol, foto) VALUES (?, ?, ?, ?, ?,?)");
        $stmt->execute([
            $usuario->getNombre(), 
            $usuario->getContrasenia(),  
            $usuario->getEmail(), 
            $usuario->getDireccion(), 
            $usuario->getRol(),
            $usuario->getFoto()
        ]);

        return $usuario;
    }

    public function actualizar(Usuarios $usuario) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, direccion = ?, rol = ? WHERE id = ?");
        return $stmt->execute([
            $usuario->getNombre(), 
            $usuario->getEmail(), 
            $usuario->getDireccion(), 
            $usuario->getRol(), 
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function obtenerPorEmail($email) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
}
?>