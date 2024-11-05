<?php

require_once __DIR__ ."../../../model/alumno.php";
require_once __DIR__ . "../../../model/materias.php";

$materias = Materias::all();
$id_alumnos = $_GET['id'];

if(isset($_POST['actualizarDatos'])){
    $nombre=$_POST['nombre'];
    $apellido= $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $alumno = Alumno::getById($id_alumnos);
    $alumno->nombre = $nombre;
    $alumno->apellido = $apellido;
    $alumno->fecha_nacimiento = $fecha_nacimiento;
    $asignacion = $_POST['seleccionMaterias'];
    $alumno->update($asignacion);


    header('location: ../../controllers/Alumnos/indexAlumno.php');

} else{
    $alumno = Alumno::getById($id_alumnos);
    $materiasAlumnos = $alumno->materias();
    if ($alumno) {
        require_once "../../views/Alumno/editarAlumno.view.php";
}

}