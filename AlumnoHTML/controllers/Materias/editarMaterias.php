<?php
require_once __DIR__ ."../../../model/materias.php";

$id = $_GET['id'];

if(isset($_POST['actualizarDatos'])){
    $nombre=$_POST['nombre'];

    $materia = Materias::getById($id);
    $materia->nombre = $nombre;
    $materia->update();


    // header('location: /AlumnoHTML/controllers/Materias/indexMaterias.php');
    header('location: ../../controllers/Materias/indexMaterias.php'); //redirecciona


} else{
    $materia = Materias::getById($id);
    if ($materia) {
        require_once "../../views/Materias/editarMaterias.view.php";
}

}