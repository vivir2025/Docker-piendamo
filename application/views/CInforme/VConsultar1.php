<!-- This is the view where the 1552 report is generated -->
<div class="container bg-white text-center">
    <div>
        <hr>
        <div>
            Generar Informe 
        </div>
        <hr>

        <label class="text-left">
            <div>
                <form method="post" action="<?= site_url('CInforme/exportar_1') ?>">
                    <table border="0" cellpading="0" cellspacing="0">
                        <tr>
                            <td width="80">
                                <div align="left"><span> Desde:</span></div>
                            </td>
                            <td width="180">
                                <input type="date" name="fecha" id="fecha" class="form-control">
                            </td>

                            <td width="80"><span>Hasta: </span></td>
                            <td width="170">
                                <input type="date" name="fecha1" id="fecha1" class="form-control">
                            </td>
							

                            <td width="160">
                                <center><button id="exportButton" type="submit" class="btn btn-primary">Generar</button></center>
                            </td>

                        </tr>
                    </table>
                </form>

                <div id="loadingOverlay">
                    <div class="loadingText">Descargando...</div>
                </div>

            </div>
        </label>
        <style>
            #loadingOverlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 9999;
            }

            .loadingText {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 24px;
                color: #fff;
            }
        </style>

        <script>
            document.getElementById('exportButton').addEventListener('click', function() {
                // Show loading overlay
                var loadingOverlay = document.getElementById('loadingOverlay');
                loadingOverlay.style.display = 'block';

                // Simulate export process time (replace with your actual export code)
                var max_execution_time = 13070; // 12 con 70 seconds

                setTimeout(function() {
                    // Hide loading overlay
                    loadingOverlay.style.display = 'none';

                    // TODO: Perform the export operation here

                    // For demonstration, let's display an alert to indicate export completion
                    alert('Descarga Completa :)');
                }, max_execution_time);
            });
        </script>
