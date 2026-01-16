<div class="container mt-3">  <!-- Contenedor más ajustado -->
    <!-- Filtros de fecha (compactos) -->
    <div class="card mb-3">
        <div class="card-header bg-primary text-white py-2">  <!-- Header más pequeño -->
            <h6 class="mb-0">Filtrar por fecha</h6>  <!-- h6 en lugar de h5 -->
        </div>
        <div class="card-body p-3">  <!-- Padding reducido -->
            <form id="filtroForm">
                <div class="row g-2">  <!-- Espaciado entre columnas reducido (g-2) -->
                    <div class="col-md-4">
                        <label class="small">Fecha Inicio</label>  <!-- Texto más pequeño -->
                        <input type="date" id="fecha_inicio" class="form-control form-control-sm" required>  <!-- Input pequeño -->
                    </div>
                    <div class="col-md-4">
                        <label class="small">Fecha Fin</label>
                        <input type="date" id="fecha_fin" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-4 align-self-end">
                        <button type="submit" class="btn btn-success btn-sm w-100">Filtrar</button>  <!-- Botón pequeño -->
                    </div>
                </div>
            </form>
        </div>
    </div>

 

    <!-- Gráfico compacto -->
    <div class="card mt-3">
        <div class="card-header bg-info text-white py-2">
            <h6 class="mb-0">Resumen por Especialidad</h6>
        </div>
        <div class="card-body p-3">
            <div style="height: 250px">  <!-- Altura reducida -->
                <canvas id="graficoCompacto"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        let grafico;
        
        // Manejar el envío del formulario
        $('#filtroForm').submit(function(e) {
            e.preventDefault();
            const fechaInicio = $('#fecha_inicio').val();
            const fechaFin = $('#fecha_fin').val();

            $.ajax({
                url: '<?php echo base_url("index.php/CHistorial/get_consultas_especialidades"); ?>',
                type: 'POST',
                dataType: 'json',
                data: { fecha_inicio: fechaInicio, fecha_fin: fechaFin },
                success: function(response) {
                    // Actualizar tarjetas
                    $('#total-internista').text(response.internista || 0);
                    $('#total-psicologia').text(response.psicologia || 0);
                    $('#total-nutricion').text(response.nutricion || 0);
                    
                    // Actualizar gráfico
                    actualizarGrafico(response);
                }
            });
        });

        function actualizarGrafico(data) {
            const ctx = document.getElementById('graficoCompacto').getContext('2d');
            
            if (grafico) grafico.destroy();

            grafico = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Especial Control','Internista', 'Psicología', 'Nutrición', 'Trabajo Social', 'Nefrología', 'Fisioterapia'],
                    datasets: [{
                        label: 'Consultas',
                        data: [
                            data.control || 0,
                            data.internista || 0,
                            data.psicologia || 0,
                            data.nutricion || 0,
                            data.trabajo_social || 0,
                            data.nefrologia || 0,
                            data.fisioterapia || 0
                        ],
                        backgroundColor: [
                            '#36A2EB',
                            '#36A2EB', '#FFCE56', '#4BC0C0', 
                            '#9966FF', '#FF9F40', '#8AC24A'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } },
                        x: { ticks: { font: { size: 10 } } }  // Texto más pequeño en eje X
                    },
                    plugins: {
                        legend: { display: false }  // Ocultar leyenda para ahorrar espacio
                    }
                }
            });
        }
    });
</script>