<?php
require_once __DIR__ ."/../../model/Materias/materias.php";
// require_once __DIR__ ."../AlumnoHTML/model/Materias/materias.php";

$id = $_GET['id'];

$materias = Materias::getById($id);

if ($materias) {
    $materias->delete();
    header('Location: ../controllers/Materias/indexMaterias.php');
}

echo $id;