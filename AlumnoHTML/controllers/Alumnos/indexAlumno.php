<?php
require_once __DIR__ . "../../../model/alumno.php";

$alumnos = Alumno::all();

require_once "../../views/Alumno/indexalumno.php";