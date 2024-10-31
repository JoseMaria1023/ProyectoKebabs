<?php

class Ingrendiente{
    private $nombre;
    private $precio;
    private $alergeno;

    public function __construct($nombre,$precio,$alergeno){
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->alergeno = $alergeno;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getPrecio(){
        return $this->precio;
    }
    public function getAlergeno(){
        return $this->alergeno;
    }
}

?>