<!-- lists the appointments that the patient has by document number where it can be  ... -->
 
<div class="container"> <hr>
    <h5 style="color: white;">CONSULTAS Y/O CITAS POR DOCUMENTO PACIENTE</h5>
    <hr>
    <div class="form-row">
        <label class="col-sm-2 col-form-label text-white">Documento:</label>
        <div class="input-group col-sm-10 ">
            <input class="form-control" type="text" id="documento" placeholder="Documento" required="">
            <div class="input-group-append">
                <body onkeyup="buscar_paciente()"></body>
            </div>
        </div>
    </div><br> <br>
      
    <div  class="bg-light" >
     
    <div id="resultado" style="display: none;"></div>
  

     
      <!-- Modal Cancelar Cita-->
    <div class="modal fade bd-example-modal-lg-cancelar-cita" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div  id=fun class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="myLargeModalLabel ">Formulario Cancelar Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p style="color: white;">Cancelar Cita</p>

                        <input name='idCita' id="idCita" hidden=""/>
                        <div id="mens_cita_cancelar" style="display: none;"></div>
                        <div class="form-row">
                            <div class="form-group col-md-12 text-white">
                                <label>Registre el motivo por el cual desea cancelar la cita</label>
                                <br>
                                <textarea class="form-control" name="motivo" id="motivo" type="text" required="" id="motivo" placeholder="Digite el motivo"></textarea>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <a class="btn btn-primary" id="cancelar_cita">Cancelar cita</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Fin Modal Agregar -->
</div>
<script type='text/javascript'>

    $("#cancelar_cita").click(function() {

        idCita = $("#idCita").val();
        motivo = $("#motivo").val();

        if (idCita != "" && motivo != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CCita/cancelar'; ?>",
                type: 'POST',
                data: {
                    idCita: idCita,
                    motivo: motivo
                },

                success: function(result) {

                    //console.log(result);

                    $("#idCita").val("");
                    $("#motivo").val("");
                    $('#exampleModal1').modal('hide');
                    $('#mens_cita_cancelar').hide();
                    $("#data").load(" #data");
                    buscar_paciente();

                    //$("#mens").html(result);
                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $('#mens_cita_cancelar').show();
            $("#mens_cita_cancelar").html(html);

        }

    });

    function buscar_paciente() {
        var documento = $('#documento').val();

        //alert(documento);

        $.post("<?= base_url("index.php/CAgenda/buscar_paciente") ?>", {
            documento: documento
        }, function(data) {

            //console.log(data);
            $('#resultado').show();
            $("#resultado").html(data);
        });
    }

    function cancelar(idCita) {

        idCita = idCita;
        $("#idCita").val(idCita);

    }
    
</script>
<style>
 
 #fun {

  background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);

}


</style>