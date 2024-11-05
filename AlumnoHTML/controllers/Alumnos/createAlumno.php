<?php

require_once __DIR__ . "../../../model/alumno.php";
require_once __DIR__ . "../../../model/materias.php";

$materias = Materias::all();

if (isset($_POST['enviarFormulario'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $alumno = new Alumno();
    $alumno->nombre = $nombre;
    $alumno->apellido = $apellido;
    $alumno->fecha_nacimiento = $fecha_nacimiento;

    $asignacion = $_POST['seleccionMaterias'];
    $alumno->create($asignacion);
    
    
    header('location: ../../controllers/Alumnos/indexAlumno.php');
}

require_once "../../views/Alumno/createAlumno.view.php";
