<?php

require_once "../model/Materias/materias.php";

if (isset($_POST['enviarFormulario'])) {
    $nombre = $_POST['nombre'];
    echo "se presiono el boton del formulario";

    $materias = new Materias();
    $materias->nombre = $nombre;
    $materias->create();

}else{
    echo"no se presiono el boton";
}
require_once "../AlumnoHTML/views/Materias/createMaterias.view.php";