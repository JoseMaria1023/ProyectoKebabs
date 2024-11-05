<?php

function validarCampoNoVacio($campo) {
    if (isset($_POST[$campo]) && trim($_POST[$campo]) !== '') {
        return true;
    }
    return false;
}

?>