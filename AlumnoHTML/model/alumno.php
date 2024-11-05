<?php

require_once __DIR__ . '../../model/conexion.php';
require_once __DIR__ . "../../model/materias.php";

class Alumno extends Conexion
{
    public $id_alumnos, $nombre, $apellido, $fecha_nacimiento;

    public function create($asignacion)
    {
        $this->conectar(); //metodo conectar 
        $pre = mysqli_prepare($this->con, "INSERT INTO alumnos (nombre, apellido, fecha_nacimiento) VALUES (?, ?, ?)");
        $pre->bind_param("sss", $this->nombre, $this->apellido, $this->fecha_nacimiento); //bind_param metodo de seguridad
        $pre->execute(); //ejecuta

        $id = $this -> id_alumnos = mysqli_insert_id($this->con);
        foreach ($asignacion as $materia) {
            $pre = mysqli_prepare($this -> con, "INSERT INTO alumnos_materias (id_alumno, id_materia) VALUES (?, ?)");
            $pre -> bind_param("ii",  $id,  $materia);
            $pre -> execute();
        }
    return $id;
    }

    public static function all()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM alumnos");
        $result->execute();
        $valoresDb = $result->get_result();
        $alumnos = [];
        while ($alumno = $valoresDb->fetch_object(Alumno::class)) {
            $alumnos[] = $alumno;
        }
        return $alumnos;
    }
    public static function getById($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $result = mysqli_prepare($conexion->con, "SELECT * FROM alumnos where id_alumnos = ?");
        $result->bind_param("i", $id);
        $result->execute();
        $valoresDb = $result->get_result();
        $alumno = $valoresDb->fetch_object(Alumno::class);
        return $alumno;
    }

    public function delete()
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM alumnos WHERE id_alumnos = ?");
        $pre->bind_param("i", $this->id_alumnos);
        $pre->execute();

        // $pre = mysqli_prepare($this->con, "DELETE FROM alumnos_materias WHERE id_alumno = ?");
        // $pre->bind_param("i", $this->id_alumno);
        // $pre-> execute();
    }

    // public function update($asignacion)
    // {
    //     $this->conectar();
    //     $pre = mysqli_prepare($this->con, "UPDATE alumnos SET nombre=?, apellido=?, fecha_nacimiento=? WHERE id_alumnos= ?");
    //     $pre->bind_param("sssi", $this->nombre, $this->apellido, $this->fecha_nacimiento, $this->id_alumnos);
    //     $pre->execute();

    //     $borrar= mysqli_prepare($this->con, "DELETE FROM alumnos_materias WHERE id_alumno=?");
    //     $borrar->bind_param("i", $this->id_alumnos);
    //     $borrar->execute();

    //     foreach($asignacion as $asignaciones){
    //         $insertar = mysqli_prepare($this->con, "INSERT INTO alumnos_materias (id_alumno, id_materia)VALUES (?,?)");
    //         $insertar->bind_param("ii",$this->id_alumnos, $asignaciones);
    //         $insertar->execute();
    //     }
    // }   

    public function update($asignacion) {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE alumnos SET nombre = ?, apellido = ?, fecha_nacimiento = ? WHERE id_alumnos = ?");
        $pre->bind_param("sssi", $this->nombre, $this->apellido, $this->fecha_nacimiento, $this->id_alumnos);
        $pre->execute();

        // Obtener las materias actuales del alumno en un array
        $materias_actuales = [];
        $result = mysqli_query($this->con, "SELECT id_materia FROM alumnos_materias WHERE id_alumno = $this->id_alumnos");
        while ($row = mysqli_fetch_assoc($result)) {
            $materias_actuales[] = $row['id_materia'];
        }

        // Recorrer las materias seleccionadas para agregar las nuevas y mantener las existentes
        foreach ($asignacion as $materia_id) {
            if (!in_array($materia_id, $materias_actuales)) {
                $pre = mysqli_prepare($this->con, "INSERT INTO alumnos_materias (id_alumno, id_materia) VALUES (?, ?)");
                $pre->bind_param("ii", $this->id_alumnos, $materia_id);
                $pre->execute();
            }
        }

        // Eliminar las materias que ya no están seleccionadas
        foreach ($materias_actuales as $materia_id_actual) {
            if (!in_array($materia_id_actual, $asignacion)) {
                $pre = mysqli_prepare($this->con, "DELETE FROM alumnos_materias WHERE id_alumno = ? AND id_materia = ?");
                $pre->bind_param("ii", $this->id_alumnos, $materia_id_actual);
                $pre->execute();
            }
        }
    }

// PARA SELECCIONAR MUCHAS MATERIAS

    public function materias()
    {
        $this->conectar();
        $result = mysqli_prepare($this->con, "SELECT materias.* FROM materias INNER JOIN alumnos_materias ON materias.id = alumnos_materias.id_materia WHERE alumnos_materias.id_alumno = ?");
        $result->bind_param("i", $this->id_alumnos);
        $result->execute();
        $valoresDb = $result->get_result();
        $materias = [];
        while ($materia = $valoresDb->fetch_object(Materias::class)) {
            $materias[] = $materia;
        }
        return $materias;
    }
    public function asignarMateria($id_materia)
    {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO alumnos_materias (id_alumno, id_materia) VALUES(?,?)");
        $pre->bind_param("ii", $this->id_alumnos,$id_materia);
        $pre->execute();
    }
}
