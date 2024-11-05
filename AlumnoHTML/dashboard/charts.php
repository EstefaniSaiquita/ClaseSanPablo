<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="./output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="flex-col mt-4 bg-slate-100">
<div class="mx-auto mb-3 w-1/2 h-1/2 col-span-2 text-center font-bold bg">
<h2>Total de Usuarios</h2>
  <canvas id="myChart"></canvas>
</div>

<div class="flex justify-center space-x-2">
<a href="../controllers/Materias/indexMaterias.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"> <button>Materias</button></a>
<a href="../controllers/Profesores/indexProfesores.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"> <button>Profesores</button></a>
<a href="../controllers/Alumnos/indexAlumno.php" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-300"><button>Alumnos</button></a>
</div>
<!-- <script>
        // Obtener los datos desde el archivo PHP
        fetch('dashboard.php')
            .then(response => response.json())
            .then(data => {
                const totalAlumnos = data.cantidadAlumnos;
                const totalProfesores = data.cantidadProfesores;

                // Crear el gráfico de dona
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Alumnos', 'Profesores'], // Etiquetas para las secciones del gráfico
                        datasets: [{
                            label: 'Cantidad',
                            data: [totalAlumnos, totalProfesores], // Datos de alumnos y profesores
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.5)', // Color para alumnos
                                'rgba(255, 99, 132, 0.5)'  // Color para profesores
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)', // Borde para alumnos
                                'rgba(255, 99, 132, 1)'  // Borde para profesores
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            }
                        }
                    }
                });
            });
    </script> -->

    <script>
    // Obtener los datos desde el archivo PHP
    fetch('dashboard.php')
        .then(response => response.json())
        .then(data => {
            const totalAlumnos = data.cantidadAlumnos;
            const totalProfesores = data.cantidadProfesores;
            const totalMaterias = data.cantidadMaterias; // Nueva variable para las materias

            // Crear el gráfico de barras
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Alumnos', 'Profesores', 'Materias'], // Etiquetas actualizadas
                    datasets: [{
                        label: 'Cantidad',
                        data: [totalAlumnos, totalProfesores, totalMaterias], // Añadir totalMaterias
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.5)',   // Color para alumnos
                            'rgba(255, 99, 132, 0.5)',  // Color para profesores
                            'rgba(54, 162, 235, 0.5)'   // Color para materias
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',   // Borde para alumnos
                            'rgba(255, 99, 132, 1)',  // Borde para profesores
                            'rgba(54, 162, 235, 1)'   // Borde para materias
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            });
        });
</script>



<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>