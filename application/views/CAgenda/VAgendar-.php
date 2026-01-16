<!-- This is the view where we create and schedule the agendas,
 create the appointments, and list the appointments in their 
 respective agendas according to the health and history professional -->

<style type="text/css">
.input_txt {
  font-size: 61%;
  width: 150px;
  height: 37px;
  display: table-cell;
}
    
</style>
<div  class="container-fluid">
    <div class="mx-auto" style="width: 1300px;">
    <hr>
    <h4 style="color: white;">Crear Agenda</h4>
 
    <form>
        <!--method="post" action="<?php echo site_url('CAgenda/agregar'); ?>" -->
       
        <div  class="bg-light" >
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Profesional</label>
                <select class="form-control" name="profesional" required="" id='profesional'>
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($usuario as $usu) {
                        echo "<option value='" . $usu['idUsuario'] . "' >" . $usu['usuNombre'] . " " . $usu['usuApellido'] .  "</option>";
                    }
                    ?>
                </select>

            </div>
            <div class="form-group col-md-2">
                <label>Area</label>
                <select class="form-control" name="area" required="" id="area">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($proceso as $pro) {
                        echo "<option value={$pro->idProceso}>{$pro->proNombre}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Sede</label>
                <select class="form-control" name="sede" id="sede">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($sede as $s) {
                        echo "<option value={$s->idSede}>{$s->sedNombre}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Consultorio</label>
                <input class="form-control" name="consultorio" placeholder="Consultorio" type="text" id="consultorio">
            </div>
            <div class="form-group col-md-2">
                <label>Fecha</label>
                <input class="form-control" name="fecha" id="fecha" type="date" required="">
            </div>
            <div class="form-group col-md-2">
                <label>---</label>
                <a class="form-control btn btn-primary" onclick="buscar_agenda()">Consultar</a>
            </div>
        </div>

        <div class="form-row" id="crear_agenda" style="display: none;">
            <div class="form-group col-md-1">
                <label>Hora Inicio</label>
                <input class="input_txt form-control" name="inicio" type="time" id="inicio">
            </div>
            <div class="form-group col-md-1">
                <label>Hora Fin</label>
                <input class="input_txt form-control" name="fin" type="time" id="fin">
            </div>
            <div class="form-group col-md-2">
                <label>Intrevalo</label>
                <select class="form-control" name="intervalo" id="intervalo">
                    <option value="">[Seleccione]</option>
                    <option value="5">5 Minutos</option>
                    <option value="10">10 Minutos</option>
                    <option value="15">15 Minutos</option>
                    <option value="20">20 Minutos</option>
                    <option value="25">25 Minutos</option>
                    <option value="30">30 Minutos</option>
                    <option value="35">35 Minutos</option>
                    <option value="40">40 Minutos</option>
                    <option value="45">45 Minutos</option>
                    <option value="50">50 Minutos</option>
                    <option value="55">55 Minutos</option>
                    <option value="60">60 Minutos</option>
                </select>
            </div>
             <div class="form-group col-md-2">
                <label>Brigada</label>
                <select class="form-control" name="brigada" id="brigada">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($brigada as $b) {
                        echo "<option value={$b->idBrigada}>{$b->briNombre}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Modalidad</label>
                <select class="form-control" name="modalidad" id="modalidad">
                    <option value="">[Seleccione]</option>
                    <option value="TELEMEDICINA">TELEMEDICINA</option>
                    <option value="INTRAMURAL">INTRAMURAL</option>
                    <option value="EXTRAMURAL">EXTRAMURAL</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Etiqueta</label>
                 <select class="form-control" name="etiqueta" id="etiqueta">
                    <option value="">[Seleccione]</option>
                    <option value="REFORMULACION">REFORMULACION</option>
                    <option value="VISITA DOMICILIARIA">VISITA DOMICILIARIA</option>
                    <option value="CONTROL">CONTROL</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>---</label><br>
                <a class="btn btn-primary btn-block" id="add_agenda">Crear agenda</a>
            </div>
        </div>
    </form>

    <br>
    <div id="mens"></div>
    <div id="resultado" style="display: none;">
    </div>

    <!-- Modal Agregar -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Formulario Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p style="color: blue;">Programar Cita</p>

                        <input name='idAgenda' id="idAgenda" hidden="" />

                        <input name='ageFecha' id="ageFecha" hidden="" />

                        <input name="fecha_inicial" id="fecha_inicial" hidden="" />

                        <input name="fecha_fin" id="fecha_fin" hidden="" />

                        <input id='id_paciente' name='id_paciente' hidden="" />

                        <input id='cups_contratado' name='cups_contratado' hidden="" />
                        <div id="mens_cita" style="display: none;"></div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>N° Documento</label>
                                <input class="form-control" name="documento" type="text" required="" id="documento">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tipo Documento</label>
                                <input type="text" class="form-control" name="tipo" id="tipo" readonly="readonly" placeholder="TIPO IDENTIFICACION..." />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Nombre</label>
                                <input class="form-control" name="nombre" type="text" required="" id="nombre" readonly="" placeholder="NOMBRE...">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" readonly="readonly" placeholder="APELLIDO..." />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Fecha nacimiento</label>
                                <input class="form-control" name="fecha_nacimiento" type="text" required="" id="fecha_nacimiento" readonly="" placeholder="FECHA NACIMIENTO...">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sexo</label>
                                <input type="text" class="form-control" name="sexo" id="sexo" readonly="readonly" placeholder="SEXO..." />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Domicilio</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" readonly="readonly" placeholder="DOMICILIO..." />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" readonly="readonly" placeholder="TELEFONO..." />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Regimen</label>
                                <input class="form-control" name="regimen" type="text" required="" id="regimen" readonly="" placeholder="REGIMEN...">
                            </div>
                            <div class="form-group col-md-3">
                                <label>EPS</label>
                                <input type="text" class="form-control" name="empresa" id="empresa" readonly="readonly" placeholder="EPS..." />
                            </div>
                            <div class="form-group col-md-3">
                                <label>Tipo patologia</label>
                                <select class="form-control" required="" name="patologia" id="patologia">
                                    <option value="">[SELECCIONE]</option>
                                    <option value="HTA">HTA</option>
                                    <option value="DM">DM</option>
                                    <option value="ERC">ERC</option>
                                    <option value="NUEVO">NUEVO</option>
                                    <option value="EVENTO">EVENTO</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Fecha deseada</label>
                                <input type="date" class="form-control" name="fecha_deseada" id="fecha_deseada" required="" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Observacion</label>
                                <textarea type="text" class="form-control" name="nota" id="nota" required="" placeholder="Observacion..."></textarea>
                            </div>
                        </div>
                        <div class="form-row" id="historial_cita" style="display: none;">
                        </div>
                        <p style="color: blue;">Cups</p>
                        <hr>
                        <div id="mensaje" style="display: none;">
                            <p style='color:red;'>No puede seleccionar este servicio</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label>Codigo</label>
                                <input class="form-control" name="codigo" type="text" required="" id="codigo" placeholder="CODIGO..." onKeyUp="buscar_cups_codigo();">
                                <!-- Lista para autocompletar por codigo -->
                                <div id="lista_codigo" style="display: none;">
                                    <div id="respuesta_codigo"></div>
                                </div>
                            </div>
                            <div class="form-group col-md-10">
                                <label>Cups</label>
                                <input type="text" class="form-control" name="cup" id="cup" placeholder="CUPS..." onKeyUp="buscar_cups_nombre();" />
                                <!-- Lista para autocompletar por cups -->
                                <div id="lista_nombre" style="display: none;">
                                    <div id="respuesta_nombre"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <a class="btn btn-primary" id="add_cita">Crear agenda</a>
                            <!--a class="btn btn-primary" id="add_cita">Agendar Cita</a-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Fin Modal Agregar  Cita-->

    <!-- Modal Cancelar Cita-->
    <div class="modal fade bd-example-modal-lg-cancelar-cita" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Formulario Cancelar Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p style="color: blue;">Cancelar Cita</p>

                        <input name='idCita' id="idCita" hidden="" />
                        <div id="mens_cita_cancelar" style="display: none;"></div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Registre el motivo por el cual desea cancelar la cita</label>
                                <textarea class="form-control" name="motivo" id="motivo" type="text" required="" id="motivo" placeholder="Digite el motivo"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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

      function eliminar(id) {
          if (confirm('¿Usted desea eliminar la agenda? Recuerde que las citas asignadas al itinerario tambien seran eliminadas.')) {
              document.location.href = "<?php echo base_url() . 'index.php/CAgenda/eliminar/' ?>" + id;
          }
        }

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
                    buscar_agenda();

                    //$("#mens").html(result);
                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $('#mens_cita_cancelar').show();
            $("#mens_cita_cancelar").html(html);

        }

    });

        $("#add_cita").click(function() {

    idAgenda = $("#idAgenda").val();
    fecha_inicial = $("#fecha_inicial").val();
    fecha_fin = $("#fecha_fin").val();
    id_paciente = $("#id_paciente").val();
    cups_contratado = $("#cups_contratado").val();
    fecha_deseada = $("#fecha_deseada").val();
    nota = $("#nota").val();
    ageFecha = $("#ageFecha").val();
    patologia = $("#patologia").val();

    if (idAgenda != "" && fecha_inicial != "" && fecha_fin != "" && id_paciente != "" && cups_contratado != "" && fecha_deseada != "" && nota != "" && ageFecha != "" && patologia != "") {

        $.ajax({
            url: "<?php echo base_url() . 'index.php/CCita/agregar'; ?>",
            type: 'POST',
            data: {
                idAgenda: idAgenda,
                fecha_inicial: fecha_inicial,
                fecha_fin: fecha_fin,
                id_paciente: id_paciente,
                cups_contratado: cups_contratado,
                fecha_deseada: fecha_deseada,
                nota: nota,
                ageFecha: ageFecha,
                patologia: patologia
            },

            success: function(result) {
                // Limpiar el formulario y ocultar el modal
                buscar_agenda();
                $("#id_paciente").val("");
                $("#documento").val("");
                $("#tipo").val("");
                $("#nombre").val("");
                $("#apellido").val("");
                $("#fecha_nacimiento").val("");
                $("#sexo").val("");
                $("#direccion").val("");
                $("#telefono").val("");
                $("#regimen").val("");
                $("#empresa").val("");
                $('#idAgenda').val("");
                $('#fecha_inicial').val("");
                $('#fecha_fin').val("");
                $('#cups_contratado').val("");
                $('#fecha_deseada').val("");
                $('#nota').val("");
                $('#ageFecha').val("");
                $('#patologia').val("");
                $("#etiqueta").val("");
                $('#codigo').val("");
                $('#cup').val("");
                $('#mens_cita').hide();
                
                $('#exampleModal').modal('hide');
                
                // Mostrar el mensaje emergente después de cerrar el modal
                $('#exampleModal').on('hidden.bs.modal', function () {
                    alert("Paciente agendado");
                });
            }
        });

    } else {
        html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        $('#mens_cita').show();
        $("#mens_cita").html(html);
    }

    });




    $("#add_agenda").click(function() {

        profesional = $("#profesional").val();
        area = $("#area").val();
        sede = $("#sede").val();
        consultorio = $("#consultorio").val();
        fecha = $("#fecha").val();
        inicio = $("#inicio").val();
        fin = $("#fin").val();
        intervalo = $("#intervalo").val();
        modalidad = $("#modalidad").val();
        etiqueta = $("#etiqueta").val();
        brigada = $("#brigada").val();


        if (profesional != "" && area != "" && sede != "" && consultorio != "" && fecha != "" && inicio != "" && fin != "" && intervalo != "" && modalidad != "" && etiqueta != "" && brigada != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CAgenda/agregar'; ?>",
                type: 'POST',
                data: {
                    profesional: profesional,
                    area: area,
                    sede: sede,
                    consultorio: consultorio,
                    fecha: fecha,
                    inicio: inicio,
                    fin: fin,
                    intervalo: intervalo,
                    modalidad: modalidad,
                    etiqueta: etiqueta,
                    brigada: brigada
                },

                success: function(result) {

                    //console.log(result);
                    buscar_agenda();
                    $('#sede').val("");
                    $('#consultorio').val("");
                    $('#inicio').val("");
                    $('#fin').val("");
                    $('#intervalo').val("");
                    $('#modalidad').val("");
                    $("#etiqueta").val("");
                    $("#brigada").val("");
                    $("#mens").html(result);
                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $("#mens").html(html);

        }

    });

    //Cancelar cita

    var idCita = 0;

    function cancel(idCita) {

        idCita = idCita;
        $("#idCita").val(idCita);

    }


    //Cita

    var idProceso = 0;
    var idUsuario = 0;
    var ageFecha = ''; ///Fecha Cita
    var ageHoraInicio = '';
    var hora_final = '';
    var idAgenda = 0;

    function save_agenda(idProceso, idUsuario, ageFecha, fechaInit, fechaEnd, idAgenda) {
        idProceso = idProceso;
        idUsuario = idUsuario;
        ageFecha = ageFecha;
        fechaInit = fechaInit;
        fechaEnd = fechaEnd;
        idAgenda = idAgenda;


        $("#idAgenda").val(idAgenda);
        $("#fecha_inicial").val(fechaInit);
        $("#fecha_fin").val(fechaEnd);
        $("#ageFecha").val(ageFecha);

        //console.log(idAgenda);
    }


    ///Cups busqueda

    function buscar_cups_codigo() {

        var textoBusqueda = $("input#codigo").val();
        var documento = $("input#documento").val();
        var agenda = $("#idAgenda").val();

        //  alert(agenda)


        if (textoBusqueda != "") {
            $.post("<?= base_url("index.php/CCups_Contratado/cups_codigo_detalle") ?>", {
                valorBusqueda: textoBusqueda,
                documento: documento,
                agenda: agenda
            }, function(data) {
                // console.log(data);
                $('#lista_codigo').show();
                $("#respuesta_codigo").html(data);
            });
        } else {
            $("#cups_contratado").val("");
            $("#cup").val("");
            $('#lista_codigo').hide();
        };
    };

    function buscar_cups_nombre() {

        var textoBusqueda = $("input#cup").val();
        var documento = $("input#documento").val();
        var agenda = $("#idAgenda").val();

        if (textoBusqueda != "") {
            $.post("<?= base_url("index.php/CCups_Contratado/cups_nombre_detalle") ?>", {
                valorBusqueda: textoBusqueda,
                documento: documento,
                agenda: agenda
            }, function(data) {
                // console.log(data);
                $('#lista_nombre').show();
                $("#respuesta_nombre").html(data);
            });
        } else {
            $("#cups_contratado").val("");
            $("#codigo").val("");
            $('#lista_nombre').hide();
        };
    };

    // Valores asignados codigo y nombre cups

    function elemento_selecionado(object) {
        datos_cups = (object.id).split('&');

        paciente_categoria = datos_cups[5];
        categoria_cups = datos_cups[4];

        $('#cup').val(datos_cups[0]);
        $('#codigo').val(datos_cups[1]);
        $('#cups_contratado').val(datos_cups[2]);
        $('#lista_nombre').hide();
        $('#mensaje').hide();
        $('#lista_codigo').hide();

        //  $('#mensaje').show();
        /*if(paciente_categoria == 5){

            $('#cup').val("");
            $('#codigo').val("");
            $('#mensaje').show();

        }else if (paciente_categoria == 6){

            $('#cup').val(datos_cups[0]);
            $('#codigo').val(datos_cups[1]);
            $('#cups_contratado').val(datos_cups[2]);
            $('#lista_nombre').hide();
            $('#mensaje').hide();
            $('#lista_codigo').hide();

        }
        else if (paciente_categoria == 4) {

            $('#cup').val(datos_cups[0]);
            $('#codigo').val(datos_cups[1]);
            $('#cups_contratado').val(datos_cups[2]);
            $('#lista_nombre').hide();
            $('#mensaje').hide();
            $('#lista_codigo').hide();

        } else {

            if (paciente_categoria == 1 && paciente_categoria == categoria_cups) {

                //console.log(paciente_categoria +" "+ categoria_cups +"-1");

                $('#cup').val("");
                $('#codigo').val("");
                $('#mensaje').show();

            } else if (paciente_categoria == 2 && paciente_categoria == categoria_cups) {

                $('#cup').val(datos_cups[0]);
                $('#codigo').val(datos_cups[1]);
                $('#cups_contratado').val(datos_cups[2]);
                $('#lista_nombre').hide();
                $('#mensaje').hide();
                $('#lista_codigo').hide();

                //console.log(paciente_categoria +" "+ categoria_cups +"-2");

            } else if (paciente_categoria == 3 && categoria_cups == 1) {

                $('#cup').val(datos_cups[0]);
                $('#codigo').val(datos_cups[1]);
                $('#cups_contratado').val(datos_cups[2]);
                $('#lista_nombre').hide();
                $('#mensaje').hide();
                $('#lista_codigo').hide();

                //console.log(paciente_categoria +" "+ categoria_cups +"-3");

            } else if (paciente_categoria == 1 && categoria_cups == 2) {

                $('#cup').val(datos_cups[0]);
                $('#codigo').val(datos_cups[1]);
                $('#cups_contratado').val(datos_cups[2]);
                $('#lista_nombre').hide();
                $('#mensaje').hide();
                $('#lista_codigo').hide();

                //console.log(paciente_categoria +" "+ categoria_cups +"-4");

            } else {

                $('#cup').val("");
                $('#codigo').val("");
                $('#mensaje').show();

                //console.log(paciente_categoria +" "+ categoria_cups +"-5");

            }
        }*/
    }

    ///Traer paciente por documento


    $("#documento").change(function() {

        verificar_paciente();
    });

    function verificar_paciente() {

        var pacDocumento = $("#documento").val();

        $.ajax({
            url: '<?= base_url() ?>index.php/CCita/usuario_detalle',
            method: 'post',
            data: {
                pacDocumento: pacDocumento
            },
            dataType: 'json',

            success: function(data) {
                //console.log(response);
                var len = data.length;

                if (len > 0) {

                    $("#id_paciente").val(data[0].idPaciente);
                    $("#tipo").val(data[0].docNombre);
                    $("#nombre").val(data[0].pacNombre);
                    $("#apellido").val(data[0].pacApellido);
                    $("#fecha_nacimiento").val(data[0].pacFecNacimiento);
                    $("#sexo").val(data[0].pacSexo);
                    $("#direccion").val(data[0].pacDireccion);
                    $("#telefono").val(data[0].pacTelefono);
                    $("#regimen").val(data[0].regNombre);
                    $("#empresa").val(data[0].empNombre);

                    $("#codigo").val("");
                    $("#cup").val("");

                    var html = "<a class='btn btn-link' onclick = 'historial(" + data[0].idPaciente + ")'>HISTORIAL DE CITAS</a>";

                    $('#historial_cita').show();
                    $("#historial_cita").html(html);




                } else {

                    limpiar_formulario_paciente();

                }

            }
        });
    }

    function historial(id) {

        url = "<?php echo base_url() . 'index.php/CAgenda/historial/' ?>" + id;
        window.open(url);
    }

    // Limpiar formulario paciente


    function limpiar_formulario_paciente() {
        $("#id_paciente").val("");
        $("#documento").val("");
        $("#tipo").val("");
        $("#nombre").val("");
        $("#apellido").val("");
        $("#fecha_nacimiento").val("");
        $("#sexo").val("");
        $("#direccion").val("");
        $("#telefono").val("");
        $("#regimen").val("");
        $("#empresa").val("");
    }


    ///Agenda

    //$('#buttonConsultar').click(function(evento){
    function buscar_agenda() {
        var idUsuario = $('#profesional').val();
        var ageFecha = $('#fecha').val();
        var idProceso = $('#area').val();

        //console.log(idUsuario +" "+ ageFecha +" "+  idProceso);

        $.post("<?= base_url("index.php/CAgenda/mostrarAgenda") ?>", {
            usuario: idUsuario,
            fecha: ageFecha,
            proceso: idProceso
        }, function(data) {

            // console.log(data);
            $('#crear_agenda').show();
            $('#resultado').show();
            $("#resultado").html(data);
        });
    }
    //});
</script>