<?php
require_once __DIR__ . "../../../model/alumno.php";
require_once __DIR__ . "../../../model/materias.php";

$alumnos = Alumno::all();
$materias = Materias::all();

require_once "../../views/Alumno/indexalumno.view.php";
