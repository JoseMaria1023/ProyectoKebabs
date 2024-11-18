<?php
class Kebab {
    private $nombre;
    private $descripcion;
    private $precioBase;
    private $foto;

    public function __construct($nombre, $descripcion, $precioBase,$foto) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precioBase = $precioBase;
        $this->foto = $foto;

    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getPrecioBase() {
        return $this->precioBase;
    }

    public function getFoto() {
        return $this->foto;
    }
}
?>
