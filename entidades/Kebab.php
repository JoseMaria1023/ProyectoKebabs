<?php
class Kebab {
    private $nombre;
    private $precioBase;

    public function __construct($nombre, $precioBase) {
        $this->nombre = $nombre;
        $this->precioBase = $precioBase;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecioBase() {
        return $this->precioBase;
    }
}
?>
