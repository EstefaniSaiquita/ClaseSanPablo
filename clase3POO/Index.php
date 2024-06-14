<?php
include_once 'conexion.php';
$conexion = new Conexion;
$conexion->conectar();

$cliente = new Cliente;
$cliente->nombre = "estefani";
$cliente->apellido = "saiquita";
$cliente->fecnac = "2002-12-210";
$cliente->email = "estefi@gmail.com";
$cliente->edad = 21;
$cliente->create();