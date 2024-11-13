<?php

class Ingredientes {
    private $nombre;
    private $precio;
    private $foto;  

    public function __construct($nombre = "", $precio = "", $foto = "") {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->foto = $foto;  
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getFoto() {
        return $this->foto;
    }
}

?>