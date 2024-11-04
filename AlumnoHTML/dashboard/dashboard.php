<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conexio = new mysqli($host, $username, $password, $dbname);

if ($conexio->connect_error) {
    die("error de conexion: " . $conexio->connect_error);
}

$sqlAlumnos = "SELECT COUNT(*)as 'cantidad' FROM alumnos";
$resultadoAlumnos = $conexio->query($sqlAlumnos);
$cantidadAlumnos = $resultadoAlumnos-> fetch_assoc()['cantidad'];

$sqlProfesores = "SELECT COUNT(*)as 'cantidad' FROM profesores";
$resultadoProfesores = $conexio->query($sqlProfesores);
$cantidadProfesores = $resultadoProfesores-> fetch_assoc()['cantidad'];

$sqlMaterias = "SELECT COUNT(*)as 'cantidad' FROM materias";
$resultadoMaterias = $conexio->query($sqlMaterias);
$cantidadMaterias = $resultadoMaterias-> fetch_assoc()['cantidad'];

echo json_encode([
    'cantidadAlumnos'=> $cantidadAlumnos,
    'cantidadProfesores' => $cantidadProfesores,
    'cantidadMaterias' => $cantidadMaterias
]);

$conexio->close();