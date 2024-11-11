<?php

$nombres=["Jose","Juan","Antonio","Leandro"];
$obj= new stdClass();
$obj->nombres=$nombres;
echo json_encode($obj);

?>