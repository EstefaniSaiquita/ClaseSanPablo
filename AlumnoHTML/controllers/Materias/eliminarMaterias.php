<?php
require_once __DIR__ . "../../../model/materias.php";

$id = $_GET['id'];

$materias = Materias::getById($id);

if ($materias) {
    $materias->delete();
    header('Location: ../Materias/indexMaterias.php');
}
