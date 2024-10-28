<?php

Class pedido{
    private $id;
    private $usuario_id;
    private $fecha;
    private $estado;
    private $total;

    public function __construct($id, $usuario_id, $fecha, $estado, $total) {
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->total = $total;

    }
    public function getId() {
        return $this->id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function getTotal(){
        return $this->total;
    }

   
}

?>