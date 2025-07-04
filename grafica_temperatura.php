<?php
include 'conexion.php';

$sensor_id = isset($_GET['sensor_id']) ? intval($_GET['sensor_id']) : 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Gráfica Scroll Temperatura</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@2.0.1"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="">
<?php include 'index.php' ?>



<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">sensor</a></li>
                <li class="breadcrumb-item"><a href="">tabla</a></li>
                <li class="breadcrumb-item active"><a href="">detalles sensor</a></li>
            </ol>
        </div>

        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="card-header">
                    <h4 class="card-title">Gradient Line Chart</h4> 
                </div>
                    <div class="mb-3">
                        <div class="d-flex flex-wrap justify-content-center gap-2 mb-3">
                            <button class="btn btn-primary" onclick="filtrar('ultimos5')">Últimos 5</button>
                            <button class="btn btn-primary" onclick="filtrar('1hora')">Última Hora</button>
                            <button class="btn btn-primary" onclick="filtrar('todo')">Todo el Día</button>
                            <button class="btn btn-secondary" onclick="resetZoom()">🔄 Restablecer Zoom</button>
                        </div>
                    </div>
                
                <div class="card-body rounded shadow-sm p-3" style="overflow-x: auto;" >
                    <canvas id="grafica" style="min-width:700px; height:400px;"></canvas>
                </div>              
            </div>
        </div>
    </div>
</div>


<script>
let chart;
const sensorId = <?= $sensor_id ?>;

function crearGrafica(fechas, valores) {
    const ctx = document.getElementById("grafica").getContext("2d");
    if (chart) chart.destroy();

    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: fechas,
            datasets: [{
                label: 'Temperatura (°C)',
                data: valores,
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.1)',
                pointRadius: 5,
                pointHoverRadius: 7,
                pointBorderColor: '#fff',
                pointBackgroundColor: '#3b82f6',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: (ctx) => `🌡️ ${ctx.parsed.y} °C`,
                        title: (ctx) => `🕒 ${ctx[0].label}`
                    }
                },
                zoom: {
                    pan: { enabled: true, mode: 'x' },
                    zoom: {
                        wheel: { enabled: true },
                        pinch: { enabled: true },
                        mode: 'x'
                    }
                }
            },
            scales: {
                x: {
                    title: { display: true, text: "Hora" },
                    ticks: { maxRotation: 45, autoSkip: true }
                },
                y: {
                    title: { display: true, text: "Temperatura (°C)" },
                    min: 0,
                    max: 35
                }
            }
        }
    });
}

function resetZoom() {
    chart?.resetZoom();
}

function filtrar(tipo) {
    fetch(`api_temperatura_rango.php?sensor_id=${sensorId}&rango=${tipo}`)
        .then(res => res.json())
        .then(data => {
            const fechas = data.map(p => p.fecha);
            const valores = data.map(p => p.valor);
            crearGrafica(fechas, valores);
        });
}

// Cargar al inicio todos los datos
filtrar('todo');
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>