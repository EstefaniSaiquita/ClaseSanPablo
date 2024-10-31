<?php
require_once __DIR__ . "../../../model/alumno.php";
require_once __DIR__ . "../../../model/materias.php";

$alumnos = Alumno::all();
$materias = Materia::all();
class materiasAlumnos
{
    public function asignarMateria($id_alumno, $id_materia)
    {
        $alumno = new Alumno();
        $alumno->id = $id_alumno;
        $alumno->asignarMateria($id_materia);

        echo $alumno;
    }
    public function mostrarMaterias($id_alumno)
    {
        $alumno = new Alumno();
        $alumno->id = $id_alumno;
        $materias = $alumno->materias();
    }

    
}


require_once "../../views/Alumno/indexalumno.php";
