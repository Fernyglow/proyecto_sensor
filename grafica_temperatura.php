<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
	header("location: page-login.php");
	exit;
}

include 'conexion.php';

$sensor_id = isset($_GET['sensor_id']) ? intval($_GET['sensor_id']) : 1;
?>

<style>
    .scroll-box {
        max-height: 280px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #888 transparent;
    }
    .scroll-box::-webkit-scrollbar {
        width: 6px;
    }
    .scroll-box::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 4px;
    }
    .fecha-item:hover {
        background-color: #0d6efd;
        color: white;
        cursor: pointer;
    }

    .chart-container {
        width: 100%;
        height: 100%;
        max-height: 300px; /* Limita la altura */
        overflow: hidden;
    }

    canvas {
        width: 100% !important;
        height: 100% !important;
    }

</style>

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
        
        <div class="mb-3">
            <label for="select-area" class="form-label">seleccione un area</label>
            <select id="select-area" class="form-control" onchange="cambiarArea()"></select>
        </div>


        <div class="row mt-3">
            <div class="col-md-4 col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="car-intro-title">fechas</h4>
                    </div>
                    <div class="card">
                        <ul id="lista-fechas" class="list-group list-group-flush scroll-box"></ul>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-8 col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-intro-title">datos</h4><span id="fecha-titulo"></span>
                    </div>
                    <div class="card-body scroll-box">
                        <ul id="lista-temperaturas" class="list-group list-group-flush">
                            <li class="list-group-item">seleccione una fecha para ver los datos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gráfica de Temperatura</h4>
                        <div class="rounded shadow-sm p-3">
                            <div class="chart-container" style="position: relative; width: 100%; max-height: 300px;">
                                <canvas id="grafica"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
let chart;
let areaId = 1;

function cargarAreas() {
    fetch("api_areas.php")
        .then(res => res.json())
        .then(areas => {
            const select = document.getElementById("select-area");
            select.innerHTML = '';
            areas.forEach(a => {
                const option = document.createElement('option');
                option.value = a.id_area;
                option.textContent = a.nombre;
                select.appendChild(option);
            });
            areaId = areas[0]?.id_area || 1;
            cargarFechas();
            cargarDatosGrafica();
        });
}

function cambiarArea() {
    const select = document.getElementById("select-area");
    areaId = parseInt(select.value);
    document.getElementById('fecha-titulo').textContent = 'Ninguna seleccionada';
    document.getElementById('lista-temperaturas').innerHTML = '<li class="list-group-item">Seleccione una fecha para ver los datos</li>';
    cargarFechas();
    cargarDatosGrafica();
}

function cargarFechas() {
    fetch(`api_fechas.php?area_id=${areaId}`)
        .then(res => res.json())
        .then(fechas => {
            const lista = document.getElementById('lista-fechas');
            lista.innerHTML = '';
            fechas.forEach(fecha => {
                const li = document.createElement('li');
                li.classList.add('list-group-item', 'fecha-item');
                li.textContent = fecha;
                li.onclick = () => cargarTemperaturasPorFecha(fecha);
                lista.appendChild(li);
            });
        });
}

function cargarTemperaturasPorFecha(fecha) {
    document.getElementById('fecha-titulo').textContent = fecha;
    fetch(`api_temperatura_fecha.php?area_id=${areaId}&fecha=${fecha}`)
        .then(res => res.json())
        .then(data => {
            const lista = document.getElementById('lista-temperaturas');
            lista.innerHTML = '';
            if (data.length === 0) {
                lista.innerHTML = '<li class="list-group-item">No hay datos</li>';
                return;
            }
            data.forEach(d => {
                const li = document.createElement('li');
                li.classList.add('list-group-item');
                li.textContent = `🕒 ${d.hora} → 🌡️ ${d.valor} °C`;
                lista.appendChild(li);
            });
        });
}

function cargarDatosGrafica() {
    fetch(`api_temperatura_ultima_hora.php?area_id=${areaId}`)
        .then(res => res.json())
        .then(data => {
            const fechas = data.map(p => p.fecha);
            const valores = data.map(p => p.valor);
            crearGrafica(fechas, valores);
        });
}

function crearGrafica(fechas, valores) {
    const ctx = document.getElementById("grafica").getContext("2d");
    if(chart) chart.destroy();

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
                }
            },
            scales: {
                x: { ticks: { maxRotation: 45, autoSkip: true } },
                y: { min: 0, max: 50 }
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    cargarAreas();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>