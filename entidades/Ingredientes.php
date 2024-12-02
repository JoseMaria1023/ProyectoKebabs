<?php

class Ingredientes {
    private $id;
    private $nombre;
    private $precio;
    private $foto;  

    public function __construct($nombre = "", $precio = "", $foto = "") {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->foto = $foto;  
    }

    public function getId() {
        return $this->id;
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

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
}

?>
