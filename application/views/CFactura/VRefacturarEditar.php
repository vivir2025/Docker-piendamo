<!-- This is the view to meditate or update the invoice ... -->
<div class="container text-light">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);"  >
    
    <form action="<?= site_url('CFactura/refacturar') ?>" method="post">
        <?php foreach ($factura as $f) { 

            if ($f->cita_idCita == 'NULL') { ?>
                <input id='cita' hidden="" name='cita' value='NULL'/>
            <?php } else { ?>
                <input id='cita' hidden="" name='cita' value='<?= $f->cita_idCita ?>'/>

            <?php } ?>
            <input id='id' hidden="" name='id' value='<?= $f->idFactura ?>'/>

            <input id='idPaciente' hidden="" name='idPaciente' value='<?= $f->paciente_idPaciente ?>'/>

            <input id='idFactura_cup' name='idFactura_cup' hidden="" value='<?= $f->id_fac_cup ?>'/>

            <input id='idCup' name='idCup' value='<?= $f->cups_idCups ?>' hidden/>

            <!--input id='cita' hidden="" name='cita' value='<?= $pac->idCita ?>'/-->
            <h5 style="color: white;">PACIENTE</h5>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Identificación</label>
                    <input class="form-control" name="documento" type="text" value="<?= $f->pacDocumento; ?>" placeholder="Documento" required="" id="documento">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Tipo Documento</label>
                    <input class="form-control" name="nombre" type="text" required="" value="<?= $f->docNombre; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Fecha Nacimiento</label>
                    <input class="form-control" name="nombre" type="text" required="" value="<?= $f->pacFecNacimiento; ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Sexo</label>
                    <?php if ($f->pacSexo == 'M') { ?>
                        <input class="form-control" type="text" required="" value="MASCULINO">
                    <?php } else {  ?>

                        <input class="form-control" type="text" required="" value="FEMENINO">

                    <?php } ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre</label>
                    <input class="form-control" name="nombre" type="text" required="" value="<?= $f->pacNombre; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Apellido</label>
                    <input class="form-control" name="apellido" type="text" required="" value="<?= $f->pacApellido; ?>">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-3">
                    <label>Depto Residencia</label>
                    <input class="form-control" value="<?= $f->depNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3">
                    <label>Municipio Residencia</label>
                    <input class="form-control" value="<?= $f->munNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3">
                    <label>Direccion</label>
                    <input class="form-control" value="<?= $f->pacDireccion; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3">
                    <label>Telefono</label>
                    <input class="form-control" value="<?= $f->pacTelefono; ?>" type="text" required="">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-3">
                    <label>Zona Residencial</label>
                    <input class="form-control" value="<?= $f->zonNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3">
                    <label>Regimen</label>
                    <input class="form-control" value="<?= $f->regNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3">
                    <label>EPS</label>
                    <input class="form-control" value="<?= $f->empNombre; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-3">
                    <label>Tipo Afiliacion</label>
                    <input class="form-control" value="<?= $f->tipNombre; ?>" type="text" required="">
                </div>
            </div><br><br>
            <!-- Tabla captura de la información -->
            <div class="bg-white">
            <div class="form-row ">
                <div class="form-group col-md-7">
                    <table class="table table-bordered">
                        <tr>
                            <td>EPS:</td>
                            <td>
                                <input class="form-control" required="required" type="text" value="<?= $f->empNombre; ?>" />
                            </td>
                            <td>CONTRATO:</td>
                            <td>
                                <select class="form-control" id="contrato" required="" name="contrato">
                                    <option value="0">[Seleccione]</option>

                                    <?php
                                    foreach ($contrato as $c) {
                                        if ($f->contrato_idContrato == $c->idContrato) {
                                            echo "<option selected='selected' value={$c->idContrato}>{$c->conNumero}</option>";
                                        } else {
                                            echo "<option value={$c->idContrato}>{$c->conNumero}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>DESCRIPCION:</td>
                            <td colspan="3">
                                <textarea class="form-control" id="tipo_contrato"><?= $f->conTipo; ?></textarea>
                            </td>
                        </tr>
                        <?php if ($cita != 'NULL'){ ?>

                            <tr>
                                <td>PROFESIONAL:</td>
                                <td colspan="3">
                                    <input class="form-control" type="text" required="required" value="<?= $cita[0]->usuNombre . " " . $cita[0]->usuApellido; ?>" />
                                </td>
                            </tr>

                            
                            
                        <?php } ?>
                    </table>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <!-- Tabla captura de la información -->
                    <table class="table table-bordered">
                        <tr>
                            <td>Valor Copago:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="<?= $f->facCopago; ?>" name="copago" />
                            </td>
                        </tr>
                        <tr>
                            <td>Valor Descuento %:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="<?= $f->facDescuento; ?>" name="descuento" />
                            </td>
                        </tr>
                        <tr>
                            <td>Tipo de Factura:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="<?= $f->tipNombre; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Comision:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="<?= $f->facComision; ?>" name="comision" />
                            </td>
                        </tr>

                        <?php if($f->cita_idCita == NULL){?>
                            <tr>
                                <td>Cantidad:</td>
                                <td>
                                    <input class="form-control" type="text" required="required" value="<?= $f->facCantidad; ?>" name="cantidad" id="cantidad" />
                                </td>
                            </tr>
                        <?php }else { ?>

                           <input class="form-control" type="text" required="required" value="NULL" name="cantidad" id="cantidad" hidden="" />
                       <?php } ?>
                   </table>
               </div>
           </div><br>
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
                    <td><input class="form-control" required="required" type="text" value="<?= $f->facFecha; ?>" name="fecha" readonly/></td>

                    <td>
                        <input class="form-control" required="required" type="text" value="<?= $f->cupCodigo; ?>"  id="codigo" placeholder="Codigo" onKeyUp="buscar_cups_codigo();"/>
                        <!-- Lista para autocompletar por codigo -->
                        <div id="lista_codigo" style="display: none;">
                            <div id="respuesta_codigo"></div>
                        </div>
                    </td>
                    <td>
                        <input class="form-control" required="required" type="text" value="<?= $f->cupNombre; ?>" id="cup" placeholder="Nombre" onKeyUp="buscar_cups_nombre();"/>
                        <!-- Lista para autocompletar por cups -->
                        <div id="lista_nombre" style="display: none;">
                            <div id="respuesta_nombre"></div>
                        </div>
                    </td>

                    <td>
                        <input class="form-control" required="required" type="text" name="valor" value="<?= $f->tarifa; ?>" id="valor"/>
                    </td>

                    <td>
                        <input class="form-control" required="required" type="text" name="total" value="<?= $f->tarifa; ?>" id="total"/>
                    </td>

                    <td>
                        <input class="form-control" required="required" type="text" name="autorizacion" id="autorizacion" value="<?= $f->facAutorizacion; ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <div class="form-group col-md-6">
                <input type="submit" name="submit" value="Guardar" class="btn btn-primary" />
            </div>
        </div>
        <input type="" name="" id="id_cups" value="<?= $f->idCups; ?>" hidden>

    <?php } ?>
</form>
</div>
<script>
    $(document).ready(function() {

        $('#contrato').change(function() {

            $("#autorizacion").val("");
            $("#codigo").val("");
            $("#cup").val("");
            $("#total").val("0");
            $("#valor").val("0");
            $("#id_cups").val("");
            $("#tipo_contrato").val("");

            var idContrato = $(this).val();

            //alert(idContrato)

            

            $.ajax({
                url: '<?= base_url() ?>index.php/CFactura/detalle_contrato',
                method: 'post',
                data: {
                    idContrato: idContrato
                },
                dataType: 'json',

                success: function(data) {

                    const cups = data.map(function(alias) {
                        return alias.cups_idCups;
                    });
                    var id_cups = $("#id_cups").val();

                    var len = data.length;

                    //alert(len)

                    if (len > 0) {
                       // if (cups.includes(id_cups)) {

                        $("#tipo_contrato").val(data[0].conTipo);

                    } else {
                        $("#contrato").val("0");
                        $("#tipo_contrato").val("");
                        $("#autorizacion").val("");
                        $("#codigo").val("");
                        $("#cup").val("");
                        $("#total").val("0");
                        $("#valor").val("0");
                        alert("Servicio no se encuentra incluido en este contrato")

                       // }


                   }
               }
           });

        });
    });


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

     // Valores asignados codigo y nombre cups

     function elemento_selecionado(object) {
        datos_cups = (object.id).split('&');

        $('#cup').val(datos_cups[0]);
        $('#codigo').val(datos_cups[1]);
        $('#cups_contratado').val(datos_cups[2]);
        $('#valor').val(datos_cups[3]);
        $('#total').val(datos_cups[3]);
        $('#idCup').val(datos_cups[4]);
        $('#lista_nombre').hide();
        $('#lista_codigo').hide();
    }


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

</script>