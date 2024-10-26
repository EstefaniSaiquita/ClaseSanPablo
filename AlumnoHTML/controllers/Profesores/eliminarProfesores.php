<?php

require_once __DIR__ . "../../../model/profesor.php";

$id = $_GET['id'];

$profesores = Profesor::getById($id);

if ($profesores) {
    $profesores->delete();
    header('Location: ../../controllers/Profesores/indexProfesores.php');
}