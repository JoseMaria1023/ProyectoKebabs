<?php

class IngredienteLineaPedido
{
    private int $id;
    private LineaDePedido $lineaPedido;   
    private Ingrediente $ingrediente;     
    private int $cantidad;
    private float $precioUnitario;

    public function __construct(LineaDePedido $lineaPedido, Ingrediente $ingrediente, int $cantidad, float $precioUnitario)
    {
        $this->lineaPedido = $lineaPedido;
        $this->ingrediente = $ingrediente;
        $this->cantidad = $cantidad;
        $this->precioUnitario = $precioUnitario;
    }

    public function getId(): int
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

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }
}
?>
