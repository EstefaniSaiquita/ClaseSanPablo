<?php

require_once "../model/alumno.php";

$id = $_GET['id'];

$alumno = Alumno::getById($id);

if ($alumno) {
    $alumno->delete();
    header('Location: ../controllers/indexAlumno.php');
}

echo $id;