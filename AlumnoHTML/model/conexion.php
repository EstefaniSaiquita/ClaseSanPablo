<?php

class Conexion{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "crud";
    public $con;

    public function conectar(){
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if ($this->con->connect_errno){
            echo "Error" . $this->con->connect_error;
        }
    }
}