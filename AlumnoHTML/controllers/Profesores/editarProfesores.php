<?php
require_once __DIR__ ."../../../model/profesor.php";

$id = $_GET['id'];

$materias = Materias::all();

if(isset($_POST['actualizarDatos'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $materia_id=$_POST['materia_id'];

    $Profesores = Profesor::getById($id);
    $Profesores->nombre = $nombre;
    $Profesores->apellido = $apellido;
    $Profesores->materia_id = $materia_id;
    $Profesores->update();

    header('Location: ../../controllers/Profesores/indexProfesores.php'); //redirecciona

} else{
    $Profesores = Profesor::getById($id);
    if ($Profesores) {
        require_once "../../views/Profesores/editarProfesores.view.php";
}

}