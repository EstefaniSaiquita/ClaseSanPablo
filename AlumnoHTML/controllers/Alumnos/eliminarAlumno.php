<?php

require_once __DIR__ . "../../../model/alumno.php";

$id = $_GET['id'];

$alumno = Alumno::getById($id);

if ($alumno) {
    $alumno->delete();
    header('Location: ../../controllers/Alumnos/indexAlumno.php');
}