<?php

class IngredienteLineaPedido
{
    private $id;
    private LineaDePedido $lineaPedido;   
    private Ingrediente $ingrediente;     
    private $cantidad;
    private $precioUnitario;

    public function __construct(LineaDePedido $lineaPedido, Ingrediente $ingrediente, $cantidad, $precioUnitario)
    {
        $this->lineaPedido = $lineaPedido;
        $this->ingrediente = $ingrediente;
        $this->cantidad = $cantidad;
        $this->precioUnitario = $precioUnitario;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLineaPedido(): LineaDePedido
    {
        return $this->lineaPedido;
    }

    public function setLineaPedido(LineaDePedido $lineaPedido): void
    {
        $this->lineaPedido = $lineaPedido;
    }

    public function getIngrediente(): Ingrediente
    {
        return $this->ingrediente;
    }

    public function setIngrediente(Ingrediente $ingrediente): void
    {
        $this->ingrediente = $ingrediente;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
    }
}
?>
