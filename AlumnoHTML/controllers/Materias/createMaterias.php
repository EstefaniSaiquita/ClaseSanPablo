<?php
require_once __DIR__ ."../../../model/materias.php";

if (isset($_POST['enviarFormulario'])) {
    $nombre = $_POST['nombre'];

    $materias = new Materias();
    $materias->nombre = $nombre;
    $materias->create();

    header('location: ../../controllers/Materias/indexMaterias.php');
}

require_once __DIR__ ."../../../views/Materias/createMaterias.view.php";