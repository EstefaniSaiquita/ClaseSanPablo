<?php
require_once __DIR__ ."/../../model/Materias/materias.php";
// require_once "../AlumnoHTML/model/Materias/materias.php";

$id = $_GET['id'];

if(isset($_POST['actualizarDatos'])){
    $nombre=$_POST['nombre'];

    $materia = Materias::getById($id);
    $materia->nombre = $nombre;
    $materia->update();


    // header('location: /AlumnoHTML/controllers/Materias/indexMaterias.php');
    header('location: ../Materias/indexMaterias.php');


} else{
    $materia = Materias::getById($id);
    if ($materia) {
        require_once "../../views/Materias/editarMaterias.view.php";
}

}