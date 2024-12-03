<?php

class RepoPedido {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardarPedido(Pedido $pedido) {
        $stmt = $this->conexion->prepare(
            "INSERT INTO pedido (usuario_id, fecha, estado, total, nombre_kebab) VALUES (?, ?, ?, ?, ?)"
        );

        $resultado = $stmt->execute([
            $pedido->getUsuarioId(),
            $pedido->getFecha(),
            $pedido->getEstado(),
            $pedido->getTotal(),
            $pedido->getNombreKebab()
        ]);

        return $resultado;
    }
    
    private function getNombreIngredienteById($idIngrediente) {
        $stmt = $this->conexion->prepare("SELECT nombre FROM ingredientes WHERE id = ?");
        $stmt->execute([$idIngrediente]);
        $ingrediente = $stmt->fetch();
        
        return $ingrediente ? $ingrediente['nombre'] : null;  
    }
    
    public function actualizarPedido(Pedido $pedido) {
        $stmt = $this->conexion->prepare("UPDATE pedido SET estado = ? WHERE id = ?");
        return $stmt->execute([
            $pedido->getEstado(),
            $pedido->getId()
        ]);
    }
    
  
    public function eliminarPedido($id) {
        $stmt = $this->conexion->prepare("DELETE FROM pedido WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function obtenerSaldoUsuario($usuarioId) {
        $stmt = $this->conexion->prepare("SELECT saldo FROM usuarios WHERE id = ?");
        $stmt->execute([$usuarioId]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $resultado ? $resultado['saldo'] : 0;
    }

    public function getPedidos() {
        $stmt = $this->conexion->prepare("SELECT id, usuario_id, fecha, estado, total, nombre_kebab FROM pedido");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPedidosPorId($usuarioId) {
        $stmt = $this->conexion->prepare(
            "SELECT p.id, p.usuario_id, p.fecha, p.estado, p.total, k.nombre AS nombreKebab
             FROM pedido p
             JOIN kebabs k ON p.nombre_kebab = k.nombre
             WHERE p.usuario_id = ?"
        );
        $stmt->execute([$usuarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}    