<?php

class Ingredientes {
    private $nombre;
    private $descripcion;
    private $precio;
    private $alergeno;
    private $foto;  

    public function __construct($nombre = "", $descripcion = "", $precio = "", $alergeno = "", $foto = "") {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->alergeno = $alergeno;
        $this->foto = $foto;  
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getAlergeno() {
        return $this->alergeno;
    }

    public function getFoto() {
        return $this->foto;
    }
}

?>