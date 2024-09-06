<?php
require_once "../model/alumno.php";

$alumnos = Alumno::all();


require_once "../views/indexalumno.php";