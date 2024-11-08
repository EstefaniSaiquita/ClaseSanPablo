<?php
require_once __DIR__ . "../../../model/materias.php";

$id = $_GET['id'];

$materias = Materias::getById($id);

$profesores = $materias->profesores();

print_r($profesores);

foreach ($profesores as $profesor) {
    $profesor->materia_id;
    $profesor->update();
}


if ($materias) {
    $materias->delete();
    header('Location: ../Materias/indexMaterias.php');
}
