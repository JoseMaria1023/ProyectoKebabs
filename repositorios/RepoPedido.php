<?php

class RepoPedido {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardarPedido(Pedido $pedido) {
        $stmt = $this->conexion->prepare(
            "INSERT INTO pedido (usuario_id, fecha, estado, total) VALUES (?, ?, ?, ?)"
        );
    
        $fecha = $pedido->getFecha(); 
        $estado = $pedido->getEstado() ?: 'Recibido'; 
    
        $resultado = $stmt->execute([
            $pedido->getUsuarioId(),
            $fecha,
            $estado,
            $pedido->getTotal(),
        ]);
    
        return $resultado;
    }
    
    public function actualizarPedido(Pedido $pedido) {
        $stmt = $this->conexion->prepare("UPDATE pedido SET estado = ?  WHERE id = ?");
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

    public function descontarSaldo($usuarioId, $totalPedido) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET saldo = saldo - ? WHERE id = ?");
        $stmt->execute([$totalPedido, $usuarioId]);
    
        return $stmt->rowCount() > 0;
    }
    public function getPedidos() {
        $stmt = $this->conexion->prepare("SELECT usuario_id,fecha,estado,total FROM pedido");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

}