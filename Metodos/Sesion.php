<?php
session_start();
$usuario = FuncionLogin::leer_sesion();
if ($usuario) {
    $nombreUsuario = $usuario['nombre'];
    $saldoUsuario = isset($_SESSION['user']['saldo']) ? $_SESSION['user']['saldo'] : '0.00';
} 
?>