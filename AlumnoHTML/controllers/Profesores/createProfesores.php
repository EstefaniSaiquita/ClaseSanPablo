<?php

require_once __DIR__. "../../../model/profesor.php";

if (isset($_POST['enviarFormulario'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $materia_id = $_POST['materia_id'];
    // echo "se presiono el boton del formulario";

    $profesor = new Profesor();
    $profesor->nombre = $nombre;
    $profesor->apellido = $apellido;
    $profesor->materia_id = $materia_id;
    $profesor->create();

    header('Location: ../../controllers/Profesores/indexProfesores.php');
}
// require_once __DIR__ . "/../model/Materia/materia.php";

$materias = Materias::all();

require_once __DIR__ . "../../../views/Profesores/createProfesores.view.php";