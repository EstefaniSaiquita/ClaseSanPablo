<?php

require_once __DIR__ . "../../model/conexion.php";
require_once __DIR__ ."../../model/profesor.php";

class Materias extends Conexion {

    public $id, $nombre;

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO materias (nombre) VALUES (?)");
        $pre->bind_param("s", $this->nombre);
        $pre->execute();
    }

public static function all(){
    $conexion = new Conexion();
    $conexion->conectar();
    $result =mysqli_prepare($conexion->con, "SELECT * FROM materias");
    $result->execute();
    $valoresDb = $result-> get_result();
    $materias = [];
    while ($materia = $valoresDb->fetch_object(Materias::class)){
        $materias[] = $materia;  
        // array_push($alumnos, $alumno);
    }
    return $materias;
}
public function profesores(){
    $this->conectar();
    $result =mysqli_prepare($this->con, "SELECT * FROM profesores WHERE materia_id = ?");
    $result->bind_param("i", $this->id);
    $result->execute();
    $valoresDb = $result-> get_result();
    $profesores = [];
    while ($profesor = $valoresDb->fetch_object(Profesor::class)){
        $profesores[] = $profesor;  
    }
    return $profesores;

}

    public static function getById($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $result =mysqli_prepare($conexion->con, "SELECT * FROM materias where id = ?");
        $result->bind_param("i", $id);
        $result->execute();
        $valoresDb = $result-> get_result();
        $materia = $valoresDb->fetch_object(Materias::class);
        return $materia;
    }
    
    public function delete(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM materias WHERE id = ?");
        $pre->bind_param("i", $this->id);
        $pre->execute();
    }

    public function update(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE materias SET nombre=? WHERE id= ?");
        $pre->bind_param("si", $this->nombre, $this->id);
        $pre->execute();
    }

    public function alumnos(){
        $this->conectar();
        $result = mysqli_prepare($this->con, "SELECT alumnos.* FROM alumnos INNER JOIN alumno_materia ON alumno.id = alumno_materia.alumno_id where alumno_materia.materia_id = ?");
        $result->bind_param("i", $this->id);
        $result->execute();
        $valoresDb = $result->get_result();
        $alumno = [];
        while ($alumno = $valoresDb->fetch_object(Alumno::class)){
            $alumno[] = $alumno;
        }
        return $alumno;
    }
}