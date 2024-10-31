<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DataTables Server-side procesado con PHP y MYSQL</title>
    <!-- DataTables CSS library -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <!-- DataTables JS library -->
    <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- DataTables JBootstrap -->
    <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <style type="text/css">
        .bs-example {
            margin: 20px;
        }
    </style>
</head>

<body>
    <a href="../Materias/indexMaterias.php"> <button>Materias</button></a>
    <a href="../Profesores/indexProfesores.php"> <button>Profesores</button></a>
    <a href=""><button>Dashboard</button></a>
    <div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <a href="createAlumno.php">Crear Alumno</a>
                        <h2 class="pull-left">Lista de Alumnos</h2>
                    </div>
                    <table id="listaUsuarios" class="table table-sm table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha Nacimiento</th>
                                <th>Materias</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
        <td>1</td>
        <td>Estefani</td>
        <td>Saiquita</td>
        <td>21.12.2002</td>
    </tr> -->
                            <?php
                            foreach ($alumnos as $alumno) { ?>
                                <tr>
                                    <td><?= $alumno->id; ?></td>
                                    <td><?= $alumno->nombre; ?></td>
                                    <td><?= $alumno->apellido; ?></td>
                                    <td><?= date('D/M/Y', strtotime($alumno->fecha_nacimiento)); ?></td>

                        <!-- FOREACH PARA RECORRER TODAS LAS MATERIAS -->
                                    <td>
                                        <ul>
                                            <?php
                                            foreach ($materias as $materias) ?>
                                            <li><?php echo $materias->nombre; ?></li>
                                        </ul>
                                    </td> 
                        <!-- BOTONES EDITAR-ELIMINAR  -->
                                    <td>
                                        <div class="btn-group">
                                            <a href="editarAlumno.php?id=<?= $alumno->id; ?> " class="btn-warning btn-sm">editar</a>
                                            <a href="eliminarAlumno.php?id=<?= $alumno->id; ?> " class="btn-danger btn-sm">eliminar</a>
                                        </div>
                                    </td>
                                </tr>

                            <?php }

                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Fecha Nacimiento</th>
                                <th>Materias</th>
                                <th>Accion</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#listaUsuarios').DataTable({});
    });
</script>

</html>