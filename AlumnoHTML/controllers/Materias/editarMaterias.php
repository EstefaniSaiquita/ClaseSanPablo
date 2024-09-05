<?php

require_once "../AlumnoHTML/model/Materias/materias.php";

$id = $_GET['id'];

if(isset($_POST['actualizarDatos'])){
    $nombre=$_POST['nombre'];

    $materias = Materias::getById($id);
    $materias->nombre = $nombre;
    $materias->update();


    header('location: ../AlumnoHTML/controllers/Materias/indexMaterias.php');

} else{
    $materias = Materias::getById($id);
    if ($materias) {
        require_once "../AlumnoHTML/views/Materias/editarMaterias.view.php";
}

}