<?php

require_once __DIR__ . '/../conexion.php';

class Materias extends Conexion {

    public $id, $nombre;

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO alumno (nombre) VALUES (?)");
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
    while ($materias = $valoresDb->fetch_object(Materias::class)){
        $materias[] = $materias;  
        // array_push($alumnos, $alumno);
    }
    return $materias;
}
    public static function getById($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $result =mysqli_prepare($conexion->con, "SELECT * FROM materias where id = ?");
        $result->bind_param("i", $id);
        $result->execute();
        $valoresDb = $result-> get_result();
        $materias = $valoresDb->fetch_object(Materias::class);
        return $materias;
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
}