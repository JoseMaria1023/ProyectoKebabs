<?php

function validarFecha($fecha) {
    $formato = 'd-m-Y';
    $fechaObj = DateTime::createFromFormat($formato, $fecha);
    
    return $fechaObj && $fechaObj->format($formato) === $fecha;
}

?>