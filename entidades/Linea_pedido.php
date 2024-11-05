<?php

class LineaDePedido {
    private Pedido $pedido;   
    private Kebab $kebab;     
    private int $cantidad;
    private float $precioUnitario;

    public function __construct(Pedido $pedido, Kebab $kebab, int $cantidad = 1, float $precioUnitario) {
        $this->pedido = $pedido;
        $this->kebab = $kebab;
        $this->cantidad = $cantidad;
        $this->precioUnitario = $precioUnitario;
    }

    // Getters
    public function getPedido(): Pedido {
        return $this->pedido;
    }

    public function getKebab(): Kebab {
        return $this->kebab;
    }

    public function getCantidad(): int {
        return $this->cantidad;
    }

    public function getPedidoId(): int {
        return $this->pedido->getId();
    }

    public function getKebabId(): int {
        return $this->kebab->getId();
    }
}

?>