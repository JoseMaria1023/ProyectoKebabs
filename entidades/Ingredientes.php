<?php

class Ingredientes{
    private $nombre;
    private $descripcion;
    private $precio;
    private $alergeno;

    public function __construct($nombre="",$descripcion="",$precio="",$alergeno=""){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->alergeno = $alergeno;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPrecio(){
        return $this->precio;
    }
    public function getAlergeno(){
        return $this->alergeno;
    }
}

?>