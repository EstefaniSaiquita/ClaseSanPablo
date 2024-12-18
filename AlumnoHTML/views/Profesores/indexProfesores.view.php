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
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <style type="text/css">
        .bs-example {
            margin: 20px;
        }
    </style> -->
</head>

<body>
    <div class="flex justify-left space-x-2 mt-2 mx-4 mb-4">
        <a href="../Materias/indexMaterias.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"> <button>Materias</button></a>
        <a href="../Alumnos/indexAlumno.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"><button>Alumnos</button></a>
        <a href="../../dashboard/charts.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"><button>Dashboard</button></a>
    </div>

    <div class="bs-example">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix mb-2 mt_4 bg-red">
                        <a href="createProfesores.php" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600 transition duration-300">Crear Profesor</a>
                    </div>
                    <h1 class="pull-left text-4xl font-bold text-black">Lista de Profesores</h1>
                    <table id="listaUsuarios" class="table table-sm table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Materia</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($profesores as $profesor) { ?>
                                <tr>
                                    <td><?= $profesor->id_profesores; ?></td>
                                    <td><?= $profesor->nombre; ?></td>
                                    <td><?= $profesor->apellido; ?></td>
                                    <td><?= $profesor->materia()->nombre; ?></td>

                                    <td> <!-- BOTONES EDITAR-ELIMINAR  -->
                                        <div class="btn-group">
                                            <a href="editarProfesores.php?id=<?= $profesor->id_profesores; ?> " class="btn-warning btn-sm mx-3">editar</a>
                                            <a href="eliminarProfesores.php?id=<?= $profesor->id_profesores; ?> " class="btn-danger btn-sm">eliminar</a>
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
                                <th>Materia</th>
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