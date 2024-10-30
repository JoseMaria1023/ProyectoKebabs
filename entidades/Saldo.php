<?php

Class Saldo{
    private $id;
    private $usuario_id;
    private $fecha;
    private $tipo;

    public function __construct($id, $usuario_id, $fecha, $tipo) {
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->fecha = $fecha;
        $this->tipo = $tipo;
   

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

    public function getTipo(){
        return $this->tipo;
    }
}

?>