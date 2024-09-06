<?php

require_once 'conexion.php';
require_once __DIR__ . "/Materias/materias.php";

class Alumno extends Conexion {

    public $id, $nombre, $apellido, $fecha_nacimiento;

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO alumno (nombre, apellido, fecha_nacimiento) VALUES (?, ?, ?)");
        $pre->bind_param("sss", $this->nombre, $this->apellido, $this->fecha_nacimiento);
        $pre->execute();
    }

public static function all(){
    $conexion = new Conexion();
    $conexion->conectar();
    $result =mysqli_prepare($conexion->con, "SELECT * FROM alumno");
    $result->execute();
    $valoresDb = $result-> get_result();
    $alumnos = [];
    while ($alumno = $valoresDb->fetch_object(Alumno::class)){
        $alumnos[] = $alumno;  
        // array_push($alumnos, $alumno);
    }
    return $alumnos;
}
    public static function getById($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $result =mysqli_prepare($conexion->con, "SELECT * FROM alumno where id = ?");
        $result->bind_param("i", $id);
        $result->execute();
        $valoresDb = $result-> get_result();
        $alumno = $valoresDb->fetch_object(Alumno::class);
        return $alumno;
    }
    
    public function delete(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM alumno WHERE id = ?");
        $pre->bind_param("i", $this->id);
        $pre->execute();
    }

    public function update(){
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE alumno SET nombre=?, apellido=?, fecha_nacimiento=? WHERE id= ?");
        $pre->bind_param("sssi", $this->nombre, $this->apellido, $this->fecha_nacimiento, $this->id);
        $pre->execute();
    }

    public function materias(){
        $this->conectar();
        $result = mysqli_prepare($this->con, "SELECT materias.* FROM materias INNER JOIN alumno_materia ON materia.id = alumno_materia.materia_id where alumno_materia.alumno_id = ?");
        $result->bind_param("i", $this->id);
        $result->execute();
        $valoresDb = $result->get_result();
        $materias = [];
        while ($materia = $valoresDb->fetch_object(Materias::class)){
            $materias[] = $materia;
        }
        return $materias;
    }

    public function alumnos(){
        $this->conectar();
        $result = mysqli_prepare($this->con, "SELECT materias.* FROM materias INNER JOIN alumno_materia ON materia.id = alumno_materia.materia_id where alumno_materia.alumno_id = ?");
        $result->bind_param("i", $this->id);
        $result->execute();
        $valoresDb = $result->get_result();
        $materias = [];
        while ($materia = $valoresDb->fetch_object(Materias::class)){
            $materias[] = $materia;
        }
        return $materias;
    }
}