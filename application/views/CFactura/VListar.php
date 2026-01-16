<!-- List the facfuras -->

<div class="container">
    <hr>
    <h5 style="color: white;">CONSULTAS Y/O PROCEDIMIENTOS PENDIENTES POR FACTURAR</h5>
    <hr>
    <div class="form-row">
        <label class="col-sm-2 col-form-label text-white">Documento:</label>
        <div class="input-group col-sm-10 ">
            <input class="form-control" type="text" id="documento" placeholder="Documento" required="">
            <div class="input-group-append">
                <body  onkeyup="buscar_paciente()"></body>
            </div>
        </div>
    </div><br>
    <div  class="bg-light" >
    <div id="resultado" style="display: none; "></div>
</div>

<script type='text/javascript'>
    function buscar_paciente() {
        var documento = $('#documento').val();

        //alert(documento);

        $.post("<?= base_url("index.php/CFactura/buscar_paciente") ?>", {
            documento: documento
        }, function(data) {

            //console.log(data);
            $('#resultado').show();
            $("#resultado").html(data);
        });
    }
</script>