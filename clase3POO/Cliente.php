<?php
include_once "Conexion.php";
class Cliente extends Conexion //extension de los metodos y clases de conexion      
{
public $nombre, $apellido, $fecnac, $email, $edad, $Id_Cliente; //Astributos

//Metodo crear
    public function create()
    {
        $this->conectar();//ejecuta 
        $pre = mysqli_prepare($this->con, "INSERT INTO clientes (nombre, apellido, fecnac, email, edad) VALUES (?,?,?,?,?)"); //pre es preparacion, se puede poner cualquier cosa
                //primer parametro, con es conexcion - insectar los siguientes valores, los signos de interrogacion son los valores que ponemos -
        $pre->bind_param("ssssi", $this->nombre, $this->apellido, $this->fecnac, $this->email, $this->edad);//bindparam elimina los caracteres maliciosos
                //las ssss son de string, la i de enteros
        $pre->execute();
    }


    // //Obter cliente base la id
    public static function getbyId($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $pre=mysqli_prepare($conexion->con, "SELECT * FROM clientes WHERE Id_Cliente = ?");
        $pre->bind_param("i",$id);
        $pre->execute();
        $res = $pre->get_result();
    
        return $res->fetch_object(Cliente::class);
                //fetch es para transformar un objeto
    }

//hacer update
public function update()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, " UPDATE clientes SET nombre = ?, apellido = ?, fecnac = ?, email = ?, edad = ? WHERE Id_Cliente = ?");
        $pre->bind_param("ssssii", $this->nombre, $this->apellido, $this->fecnac, $this->email, $this->edad, $this->Id_Cliente);
        $pre->execute();
    }

}


