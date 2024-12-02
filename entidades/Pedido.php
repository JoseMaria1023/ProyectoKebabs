<?php

class Pedido {
    private $id;
    private $usuarioId;
    private $nombreKebab;
    private $fecha;
    private $total;
    private $estado;

    public function __construct($usuarioId, $fecha, $estado, $total, $nombreKebab) {
        $this->usuarioId = $usuarioId;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->total = $total;
        $this->nombreKebab = $nombreKebab;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getNombreKebab() {
        return $this->nombreKebab;
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

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setNombreKebab($nombreKebab) {
        $this->nombreKebab = $nombreKebab;
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
