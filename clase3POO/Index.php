<?php
include_once 'Cliente.php';
// $conexion = new Conexion;
// $conexion->conectar();

$cliente = new Cliente;
$cliente->nombre = "estefani";
$cliente->apellido = "saiquita";
$cliente->fecnac = "2002-12-21";
$cliente->email = "estefi@gmail.com";
$cliente->edad = 21;
$cliente->create();

$cliente = Cliente::getById(1);
echo $cliente->nombre . " " . $cliente->apellido . "<br>"; // los :: son para acceder a las fucniones estaticas

$cliente->nombre = "Naomi";
$cliente->Id_Cliente = 23;
$cliente->update();