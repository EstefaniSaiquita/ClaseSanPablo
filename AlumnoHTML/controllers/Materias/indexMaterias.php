<?php

require_once __DIR__ ."/../../model/Materias/materias.php";
require_once __DIR__ ."/../../model/Materias/profesor.php";


// $profesor = Profesor::getById(1);

$materia = Materias::getById(2);

// foreach($materia->profesores() as $profesor ){
//     echo "<p>$profesor->nombre</p>";
// }

// echo $profesor->materia()->nombre;
// echo $materia->nombre;
// $materias = Materias::all();

foreach ($materias->alumnos() as $alumno) {
    echo "<p></p>";
}

require_once "../../views/Materias/indexMaterias.view.php";

