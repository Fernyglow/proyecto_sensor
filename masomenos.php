<?php
// index.php
include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Temperatura por Área</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    </style>
</head>
<body>
<div class="container my-4">
    <h3 class="mb-3">Temperaturas por Área</h3>
    <div class="mb-3">
        <label for="select-area" class="form-label">Selecciona un área:</label>
        <select id="select-area" class="form-select" onchange="cambiarArea()"></select>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Fechas disponibles</div>
                <div class="card-body scroll-box">
                    <ul id="lista-fechas" class="list-group"></ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Datos de la fecha: <span id="fecha-titulo">Ninguna seleccionada</span>
                </div>
                <div class="card-body scroll-box">
                    <ul id="lista-temperaturas" class="list-group">
                        <li class="list-group-item">Seleccione una fecha para ver los datos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mt-4">Gráfica de Temperaturas (rango general)</h3>
    <div class="card p-3">
        <canvas id="grafica" style="min-width:100%; height:400px;"></canvas>
    </div>
</div>

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
    fetch(`api_temperatura_rango.php?area_id=${areaId}&rango=todo`)
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
