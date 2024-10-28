<?php

class RepoPedido {
    private $conexion;

    public function __construct() {
        $this->conexion = Conexion::getConection();
    }

    public function guardarPedido(Pedido $pedido) {
        $stmt = $this->conexion->prepare("INSERT INTO pedido (usuario_id, fecha, estado, total) VALUES (?, ?, ?, ?)");
        $stmt->execute([$pedido->id, $kebab->nombre, $pedido->precioBase]);
        $pedido->id = $this->conexion->lastInsertId();
        return $pedido;
    }

    public function actualizarPedido(Pedido $pedido) {
        $stmt = $this->conexion->prepare("UPDATE pedido SET id = ?, usuario_id = ?, fecha = ?, estado = ?,total = ? WHERE id = ?");
        $stmt->execute([$pedido->id, $pedido->usuario_id, $pedido->fecha, $estado]);
    }

  
    public function eliminarPedido($id) {
        $stmt = $this->conexion->prepare("DELETE FROM pedido WHERE id = ?");
        $stmt->execute([$id]);
    }

}