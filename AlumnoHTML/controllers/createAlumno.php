<?php

require_once "../model/alumno.php";

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimineto = $_POST['date'];
    echo "se presiono el boton del formulario";

    $alumno = new Alumno();
    $alumno->nombre = $nombre;
    $alumno->apellido = $apellido;
    $alumno->fecha_nacimiento = $fecha_nacimineto;
    $alumno->create();

}else{
    echo"no se presiono el boton";
}

require_once "../views/createAlumno.view.php";