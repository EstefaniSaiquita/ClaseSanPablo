<?php

require_once __DIR__ . "../../../model/profesor.php";

$profesores = Profesor::all();

require_once __DIR__ . "../../../views/Profesores/indexProfesores.view.php";
