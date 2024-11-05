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
    <div class="flex justify-left space-x-2 mt-2 mx-4">
        <a href="../../controllers/Materias/indexMaterias.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"> <button>Materias</button></a>
        <a href="../../controllers/Profesores/indexProfesores.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"> <button>Profesores</button></a>
        <a href="../../dashboard/charts.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"<button>Dashboard</button></a>
    </div>

    <div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix mb-2">
                        <a href="createAlumno.php" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition duration-300">Crear Alumno</a>
                    </div>
                    <h2 class="pull-left text-4xl font-bold text-black">Lista de Alumnos</h2>
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
                                    <td><?= $alumno->id_alumnos; ?></td>
                                    <td><?= $alumno->nombre; ?></td>
                                    <td><?= $alumno->apellido; ?></td>
                                    <td><?= date('d/m/Y', strtotime($alumno->fecha_nacimiento)); ?></td>

                                    <td>
                                        <?php
                                        $materias = $alumno->materias(); // Obtener las materias de este alumno
                                        if (!empty($materias)) {
                                            echo "<ul>";
                                            foreach ($materias as $materia) {
                                                echo "<li>" . ($materia->nombre) . "</li>";
                                            }
                                            echo "</ul>";
                                        } else {
                                            echo "No tiene materias asignadas";
                                        }
                                        ?>
                                    </td>
                                    <!-- BOTONES EDITAR-ELIMINAR  -->
                                    <td>
                                        <div class="btn-group">
                                            <a href="editarAlumno.php?id=<?= $alumno->id_alumnos; ?> " class="btn-warning btn-sm mx-3">editar</a>
                                            <a href="eliminarAlumno.php?id=<?= $alumno->id_alumnos; ?> " class="btn-danger btn-sm">eliminar</a>
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
<script src="https://cdn.tailwindcss.com"></script>

</html>