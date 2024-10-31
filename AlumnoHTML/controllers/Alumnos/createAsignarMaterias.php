<?
require_once __DIR__ . "../../../model/alumno.php";

class AlumnoMaterias
{
    public function asignarMateria($id_alumno, $id_materia)
    {
        $alumno = new Alumno();
        $alumno->id = $id_alumno;
        $alumno->asignarMateria($id_materia);

        header("Location: ");
    }
}

function mostrarMaterias($id_alumno){
    $alumno = new Alumno();
    $alumno->id = $id_alumno;
    $materias = $alumno->materias();

    require_once __DIR__ . "../../../views/Alumno/asignarMateria.view.php"
}