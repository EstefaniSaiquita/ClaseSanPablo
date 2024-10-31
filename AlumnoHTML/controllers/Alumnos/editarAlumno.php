<?php

require_once __DIR__ ."../../../model/alumno.php";

$id = $_GET['id'];

if(isset($_POST['actualizarDatos'])){
    $nombre=$_POST['nombre'];
    $apellido= $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $alumno = Alumno::getById($id);
    $alumno->nombre = $nombre;
    $alumno->apellido = $apellido;
    $alumno->fecha_nacimiento = $fecha_nacimiento;
    $alumno->update();


    header('location: ../../controllers/Alumnos/indexAlumno.php');

} else{
    $alumno = Alumno::getById($id);
    if ($alumno) {
        require_once "../../views/Alumno/editarAlumno.view.php";
}

}