<?php
require_once 'FuncionLogin.php';
FuncionLogin::cierraSesion();
header('Location: ../index.php');
?>