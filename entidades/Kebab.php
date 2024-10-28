<?php
class Kebab {
    private $id;
    private $nombre;
    private $precioBase;

    public function __construct($nombre, $precioBase, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precioBase = $precioBase;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecioBase() {
        return $this->precioBase;
    }
}
?>
