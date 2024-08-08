<?php

require_once 'Conexion.php';

class Alumno extends Conexion {

    public $id, $nombre, $apellido, $fecha_nacimiento;

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO alumnos (nombre, apellido, fecha_nacimiento) VALUES (?, ?, ?)");
        $pre->bind_param("sss", $this->nombre, $this->apellido, $this->fecha_nacimiento);
        $pre->execute();
    }

}