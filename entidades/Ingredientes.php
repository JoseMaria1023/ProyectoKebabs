<?php

class Ingrendiente{
    private $id;
    private $nombre;
    private $precio;
    private $alergeno;

    public function __construct($id,$nombre,$precio,$alergeno){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->alergeno = $alergeno;
    }

    public function getId(){
        return $this->id;
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