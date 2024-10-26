<?php

class RepoUsuarios {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    // Guardar un nuevo usuario
    public function guardar(Usuario $usuario) {
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, direccion, rol) VALUES (?, ?, ?, ?)");
        $stmt->execute([$usuario->nombre, $usuario->email, $usuario->direccion, $usuario->rol]);
        $usuario->id = $this->conexion->lastInsertId();
        return $usuario;
    }

    public function actualizar(Usuario $usuario) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, direccion = ?, rol = ? WHERE id = ?");
        $stmt->execute([$usuario->nombre, $usuario->email, $usuario->direccion, $usuario->rol, $usuario->id]);
    }

    // Eliminar un usuario
    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }

}

?>