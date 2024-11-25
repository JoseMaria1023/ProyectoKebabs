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
            $usuario->getId() 
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
    
    public function getUsuarios() {
        $stmt = $this->conexion->prepare("SELECT id, nombre ,direccion, email, rol, foto FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerSaldo($email) {
        $stmt = $this->conexion->prepare("SELECT saldo FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado ? $resultado['saldo'] : null;
    }
    public function obtenerPorId($id) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    
    public function actualizarSaldo($usuarioId, $nuevoSaldo) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET saldo = ? WHERE id = ?");

        return $stmt->execute([
            $nuevoSaldo,
            $usuarioId
        ]);
    }
}
?>
