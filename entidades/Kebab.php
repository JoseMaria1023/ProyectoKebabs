<?php
class Kebab {
    private $id;
    private $nombre;
    private $descripcion;
    private $precio_base;
    private $foto;

    public function __construct($nombre, $descripcion, $precio_base,$foto) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio_base = $precio_base;
        $this->foto = $foto;

    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getPrecio_Base() {
        return $this->precio_base;
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
    
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    public function setPrecio_Base($precio_base) {
        $this->precio_base = $precio_base;
    }
    
}
?>
