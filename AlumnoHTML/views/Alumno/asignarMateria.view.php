<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias del alumno</title>
</head>
<body>
<ul>
    <?php foreach ($materias as $materia): ?>
        <li><?php echo $materia->nombre; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>