<?php
class Alergeno {
    private $nombre;
    private $descripcion;

    public function __construct($nombre = "", $descripcion = "") {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>