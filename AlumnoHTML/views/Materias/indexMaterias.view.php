<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>DataTables Server-side procesado con PHP y MYSQL</title>
<!-- DataTables CSS library -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"/>

<link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<!-- DataTables JS library -->
<script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- DataTables JBootstrap -->
<script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<style type="text/css">
.bs-example{
margin: 20px;
}
</style>
</head>
<body>
<div class="bs-example">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header clearfix">
<h2 class="pull-left">Lista de Materias</h2>
</div>
<table id="listaUsuarios" class="table table-sm table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th></th>
        </tr>
    </thead>
<tbody>
    <?php
    foreach ($materias as $materia) { ?>
    <tr>
        <td><?= $materia->id; ?></td>
        <td><?= $materia->nombre; ?></td>

        <td> <!-- BOTONES EDITAR-ELIMINAR  -->
            <div class="btn-group">
                <a href= "editarMaterias.php?id=<?= $materia->id; ?> " class="btn-warning btn-sm">editar</a>
                <a href= "eliminarMaterias.php?id=<?= $materia->id; ?> " class="btn-danger btn-sm">eliminar</a>
            </div>
        </td>
    </tr>

    <?php }

    ?>
    
</tbody>