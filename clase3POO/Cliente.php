<?php
include_once "Conexion.php";
class Cliente extends Conexion //extension de los metodos y clases de conexion      
{
public $nombre, $apellido, $fecnac, $email, $edad; //Astributos

//Metodo crear
public function create()
{
    $this->conectar();//ejecuta 
    $pre = mysqli_prepare($this->con, "INSERT INTO clientes (nombre, apellido, fecnac, email, edad) VALUES (?,?,?,?,?)"); //pre es preparacion, se puede poner cualquier cosa
              //primer parametro, con es conexcion - insectar los siguientes valores, los signos de interrogacion son los valores que ponemos -
    $pre->bind_param("ssssi", $this->nombre, $this->apellido, $this->fecnac, $this->email, $this->edad);//bindparam elimina los caracteres maliciosos
            //las ssss son de string
    $pre->execute();
}
}