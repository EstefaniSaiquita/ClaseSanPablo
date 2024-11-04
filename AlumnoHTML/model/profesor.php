<?php

require_once __DIR__ . '../../model/conexion.php';
require_once __DIR__ . "../../model/materias.php";

class Profesor extends Conexion {

    public $id_profesores, $nombre, $apellido, $materia_id;

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO profesores (nombre, apellido, materia_id) VALUES (?, ?, ?)");
        $pre->bind_param("sss", $this->nombre, $this->apellido, $this->materia_id);
        $pre->execute();
    }

public static function all(){
    $conexion = new Conexion();
    $conexion->conectar();
    $result =mysqli_prepare($conexion->con, "SELECT * FROM profesores");
    $result->execute();
    $valoresDb = $result-> get_result();
    $profesores = [];
    while ($profesor = $valoresDb->fetch_object(Profesor::class)){
        $profesores[] = $profesor;  
        // array_push($alumnos, $alumno);
    }
    return $profesores;
}
// esto llama a la funcion estatica de materias
public function materia(){
    return Materias::getById($this->materia_id);
}

    public static function getById($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $result =mysqli_prepare($conexion->con, "SELECT * FROM profesores where id_profesores = ?");
        $result->bind_param("i", $id);
        $result->execute();
        $valoresDb = $result-> get_result();
        $profesor = $valoresDb->fetch_object(Profesor::class);
        return $profesor;
    }
    
    public function delete(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM profesores WHERE id_profesores = ?");
        $pre->bind_param("i", $this->id_profesores);
        $pre->execute();
    }

    public function update(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE profesores SET nombre=?, apellido=?, materia_id=? WHERE id_profesores= ?");
        $pre->bind_param("sssi", $this->nombre, $this->apellido, $this->materia_id, $this->id_profesores);
        $pre->execute();
    }
}