<?php

require_once "../model/alumno.php";

if (isset($_POST['enviarFormulario'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    echo "se presiono el boton del formulario";

    $alumno = new Alumno();
    $alumno->nombre = $nombre;
    $alumno->apellido = $apellido;
    $alumno->fecha_nacimiento = $fecha_nacimiento;
    $alumno->create();

}else{
    echo"no se presiono el boton";
}

require_once "../views/createAlumno.view.php";