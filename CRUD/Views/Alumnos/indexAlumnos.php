<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <a href="createAlumno.php" class="btn btn-success float-right">Agregar Alumno</a>
                        <h2 class="pull-left">Lista de Usuarios</h2>
                    </div>
                    <table id="listaAlumnos" class="table table-sm table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha Nacimiento</th>
                            </tr>
                        </thead>
                    <tbody>

<?php
foreach ($alumnos as $alumno ) {?>
    <tr>
        <td><?= $alumno->id; ?></td>
        <td><?= $alumno->nombre; ?></td>
        <td><?= $alumno->apellido; ?></td>
        <td><?= date('d/m/Y', strtotime($alumno->fecha_nacimiento)); ?></td>
        <td>
            <div class="btn-group">
                <a href="editarAlumno.php?id=<?= $alumno->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="eliminarAlumno.php?id=<?= $alumno->id; ?>" class="btn btn-danger btn-sm">Eliminar</a>
            </div>
        </td>
    </tr>
<?php
}
?>
                    </tbody>
                    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>