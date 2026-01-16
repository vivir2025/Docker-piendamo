

<!-- This is for manual invoicing without an address book, just insert manual data -->
    <div class="container">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);"  >
    <form>
        <div id="mens_vacio" style="display: none;"></div>
        <?php foreach ($paciente as $pac) { ?>
            <h5 style="color: white;">PACIENTE</h5>
            <input name="id_cups_contrato" id="id_cups_contrato" hidden="">
            <input name="idPaciente" id="idPaciente" hidden="" value="<?= $pac->idPaciente; ?>">
            <input name="idCups" id="idCups"  hidden="">
            <hr>
            <div class="form-row">
                <div class="form-group col-md-3 text-white">
                    <label for="inputEmail4">Identificación</label>
                    <input class="form-control" name="documento" type="text" value="<?= $pac->pacDocumento; ?>" placeholder="Documento" required="" id="documento">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label for="inputEmail4">Tipo Documento</label>
                    <input class="form-control" name="nombre" type="text" required="" value="<?= $pac->docNombre; ?>">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label for="inputEmail4">Fecha Nacimiento</label>
                    <input class="form-control" name="nombre" type="text" required="" value="<?= $pac->pacFecNacimiento; ?>">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label>Sexo</label>
                    <?php if ($pac->pacSexo == 'M') { ?>
                        <input class="form-control" type="text" required="" value="MASCULINO">
                    <?php } else {  ?>

                        <input class="form-control" type="text" required="" value="FEMENINO">

                    <?php } ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 text-white">
                    <label>Nombre</label>
                    <input class="form-control" name="nombre" type="text" required="" value="<?= $pac->pacNombre; ?>">
                </div>
                <div class="form-group col-md-6 text-white">
                    <label>Apellido</label>
                    <input class="form-control" name="apellido" type="text" required="" value="<?= $pac->pacApellido; ?>">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-3 text-white">
                    <label>Depto Residencia</label>
                    <input class="form-control" value="<?= $pac->depNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label>Municipio Residencia</label>
                    <input class="form-control" value="<?= $pac->munNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label>Direccion</label>
                    <input class="form-control" value="<?= $pac->pacDireccion; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label>Telefono</label>
                    <input class="form-control" value="<?= $pac->pacTelefono; ?>" type="text" required="">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-3 text-white">
                    <label>Zona Residencial</label>
                    <input class="form-control" value="<?= $pac->zonNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label>Regimen</label>
                    <input class="form-control" value="<?= $pac->regNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label>EPS</label>
                    <input class="form-control" value="<?= $pac->empNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label>Tipo Afiliacion</label>
                    <input class="form-control" value="<?= $pac->tipNombre; ?>" type="text" required="">
                </div>
            </div><br><br>
            <!-- Tabla captura de la información -->
            <div class="bg-white">
            <div class="form-row">
                <div class="form-group col-md-7">
                    <table class="table table-bordered ">
                        <tr>
                            <td>EPS:</td>
                            <td>
                                <input class="form-control" required="required" type="text" value="<?= $pac->empNombre; ?>" />
                            </td>
                            <td>CONTRATO:</td>
                            <td>
                                <select class="form-control" id="contrato" required="" name="contrato">
                                    <option value="0">[Seleccione]</option>
                                    <?php
                                    foreach ($contrato as $contra) {
                                        echo "<option value={$contra->idContrato}>{$contra->conNumero}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>DESCRIPCION:</td>
                            <td colspan="3">
                                <textarea class="form-control" id="tipo_contrato"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4 ">
                    <!-- Tabla captura de la información -->
                    <table class="table table-bordered">
                        <tr>
                            <td>Valor Copago:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="0" name="copago" id="copago" />
                            </td>
                        </tr>
                        <tr>
                            <td>Valor Descuento %:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="0" name="descuento" id="descuento" />
                            </td>
                        </tr>
                        <tr>
                            <td>Tipo de Factura:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="<?= $pac->tipNombre; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Comision:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="0" name="comision" id="comision" />
                            </td>
                        </tr>
                        <tr>
                            <td>Cantidad:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="1" name="cantidad" id="cantidad" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div><br><br>
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>FECHA</th>
                        <th>CODIGO</th>
                        <th>SERVICIO</th>
                        <th>VALOR</th>
                        <th>TOTAL</th>
                        <th>AUTORIZACION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo date("Y-m-d", time()); ?></td>

                        <td>
                            <input class="form-control" required="required" type="text" placeholder="Codigo" id="codigo" onKeyUp="buscar_cups_codigo();" />
                            <!-- Lista para autocompletar por codigo -->
                            <div id="lista_codigo" style="display: none;">
                                <div id="respuesta_codigo"></div>
                            </div>
                        </td>
                        <td>
                            <input class="form-control" required="required" type="text" placeholder="Cups" id="cup" onKeyUp="buscar_cups_nombre();" />

                            <!-- Lista para autocompletar por cups -->
                            <div id="lista_nombre" style="display: none;">
                                <div id="respuesta_nombre"></div>
                            </div>
                        </td>

                        <td>
                            <input class="form-control" required="required" type="text" name="valor" id="valor" placeholder="Valor" />
                        </td>

                        <td>
                            <input class="form-control" required="required" type="text" name="total" id="total" placeholder="Total" />
                        </td>

                        <td>
                            <input class="form-control" required="required" type="text" name="autorizacion" placeholder="Autorizacion" id="autorizacion" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="form-group col-md-6">
                    <a type="button" class="btn btn-outline-light bg-primary" id="guardar">Guardar</a>
                    <!--input type="submit" name="submit" value="Guardar" class="btn btn-primary" /-->
            </div>
        <?php } ?>
    </form>
</div>
<script>

// site_url('CFactura/guardar_factura_sin_agenda')

$("#guardar").click(function() {


        contrato = $("#contrato").val();
        copago = $("#copago").val();
        descuento = $("#descuento").val();
        valor = $("#valor").val();
        total = $("#total").val();
        autorizacion = $("#autorizacion").val();
        cantidad = $("#cantidad").val();
        comision = $("#comision").val();
        idPaciente = $("#idPaciente").val();
        idCups = $("#idCups").val();


        if (contrato != "" && copago != "" && descuento != "" && valor != "" && total != "" && autorizacion != "" && cantidad != "" && comision != "" && idPaciente != "" && idCups != "") {

            $.ajax({

                url: "<?php echo base_url() . 'index.php/CFactura/guardar_factura_sin_agenda'; ?>",
                type: 'POST',
                
                data: {
                    contrato: contrato,
                    copago: copago,
                    descuento: descuento,
                    valor: valor,
                    total: total,
                    autorizacion: autorizacion,
                    cantidad: cantidad,
                    comision: comision,
                    idPaciente:idPaciente,
                    idCups: idCups
                },

                dataType: 'json',

                success: function(result) {

                    $("#contrato").val("");
                    $('#copago').val("");
                    $('#descuento').val("");
                    $('#valor').val("");
                    $('#total').val("");
                    $('#autorizacion').val("");
                    $('#cantidad').val("");
                    $('#idCups').val("");

                    window.location.replace("<?php echo base_url() . 'index.php/CFactura/imprimir_servicio/' ?>" + result)
                }
            });

        } else {

            html = "<div class='alert alert-danger alert-with-icon' data-notify='container'><button type='button' aria-hidden='true' class='close' data-dismiss='alert' aria-label='Close'><i class='tim-icons icon-simple-remove'></i></button><span data-notify='icon' class='tim-icons icon-bell-55'></span><span data-notify='message'>Por favor, no deje campos vacios.</span></div>";

            $('#mens_vacio').show();
            $("#mens_vacio").html(html);

        }

    }); 


    $(document).ready(function() {

        $('#contrato').change(function() {
            var idContrato = $(this).val();

            $("#cup").val("");
            $("#codigo").val("");
            $("#valor").val("");
            $("#total").val("");
            $("#id_cups_contrato").val("");
            $("#idCups").val("");
            $('#lista_codigo').hide();
            $('#lista_nombre').hide();

            $.ajax({
                url: '<?= base_url() ?>index.php/CFactura/detalle_contrato',
                method: 'post',
                data: {
                    idContrato: idContrato
                },
                dataType: 'json',

                success: function(data) {
                    //console.log(data);
                    var len = data.length;

                    if (len > 0) {

                        //console.log(data[0].conTipo);
                        $("#id_cups_contrato").val(data[0].id_cups_contrato);
                        //$("#idCups").val(data[0].cups_idCups);
                        $("#tipo_contrato").val(data[0].conTipo);

                    }
                }
            });

        });
    });

    ///Cups busqueda

    function buscar_cups_codigo() {

        var contrato = $("#contrato").val();
        var textoBusqueda = $("input#codigo").val();


        //alert(contrato)

        if (textoBusqueda != "") {
            $.post("<?= base_url("index.php/CCups_Contratado/cups_codigo_contrato") ?>", {
                valorBusqueda: textoBusqueda,
                contrato: contrato
            }, function(data) {
                //console.log(data);
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

        var contrato = $("#contrato").val();
        var textoBusqueda = $("input#cup").val();

        if (textoBusqueda != "") {
            $.post("<?= base_url("index.php/CCups_Contratado/cups_nombre_contrato") ?>", {
                valorBusqueda: textoBusqueda,
                contrato: contrato
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

        $('#cup').val(datos_cups[0]);
        $('#codigo').val(datos_cups[1]);
        $('#cups_contratado').val(datos_cups[2]);
        $('#valor').val(datos_cups[3]);
        $('#total').val(datos_cups[3]);idCups
        $('#idCups').val(datos_cups[4]);
        $('#lista_nombre').hide();
        $('#lista_codigo').hide();
    }
</script>