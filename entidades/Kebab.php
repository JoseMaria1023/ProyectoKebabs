<?php
class Kebab {
    private $nombre;
    private $descripcion;
    private $precioBase;
    private $ingredientes = [];
    private $foto;

    public function __construct($nombre, $descripcion, $precioBase,$ingredientes,$foto) {
        $this->nombre = $nombre;
        $this->precioBase = $precioBase;
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
    public function AñadirIngrediente(Ingrediente $ingrediente) {
        $this->ingredientes[] = $ingrediente;
    }
    
    public function getFoto() {
        return $this->foto;
    }
}
?>
