<?php

class Pedido {
    private $usuarioId;
    private $fecha;
    private $total;
    private $estado;

    public function __construct($usuarioId, $fecha,  $estado = 'Recibido',$total) {
        $this->usuarioId = $usuarioId;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->total = $total;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}

?>