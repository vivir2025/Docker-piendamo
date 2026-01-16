
<!-- This view brings all the necessary for the invoice is only of choice according to the invoice ... -->
<div class="container">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);"  >
        
    <form action="<?= site_url('CFactura/guardar_factura') ?>" method="post">
        <?php foreach ($paciente as $pac) { ?>
            <input id='cita' hidden="" name='cita' value='<?= $pac->idCita ?>' />
            <input name="idPaciente" id="idPaciente" hidden="" value="<?= $pac->idPaciente; ?>">
            <input name="idCups" id="idCups"  value="<?= $pac->idCups; ?>" hidden>
            <h5 style="color: white;">PACIENTE</h5>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-3 text-white">
                    <label for="inputEmail4">Identificación</label>
                    <input class="form-control" name="documento" type="text" value="<?= $pac->pacDocumento; ?>" placeholder="Documento" required="" id="documento">
                </div>
                <div class="form-group col-md-3 text-white">
                    <label for="inputEmail4 ">Tipo Documento</label>
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
<div class="bg-light">
            <table class="table table-bordered">
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
                            <input class="form-control" required="required" type="text" value="<?= $pac->cupCodigo; ?>" />
                        </td>
                        <td>
                            <input class="form-control" required="required" type="text" value="<?= $pac->cupNombre; ?>" />
                        </td>

                        <td>
                            <input class="form-control" required="required" type="text" name="valor" value="<?= $pac->cupTarifa; ?>" />
                        </td>

                        <td>
                            <input class="form-control" required="required" type="text" name="total" value="<?= $pac->cupTarifa; ?>" />
                        </td>

                        <td>
                            <input class="form-control" required="required" type="text" name="autorizacion" id="autorizacion" placeholder="Autorizacion" />
                        </td>
                    </tr>
                </tbody>
            </table><br><br>
            <!-- Tabla captura de la información -->
            <div class="form-row">
                <div class="form-group col-md-7">
                    <table class="table table-bordered">
                        <tr>
                            <td>EPS:</td>
                            <td>
                                <input class="form-control" required="required" type="text" value="<?= $pac->empNombre; ?>" />
                            </td>
                            <td>CONTRATO:</td>
                            <td>
                                <select class="form-control" id="contrato" required="" name="contrato">
                                    <option value="">[Seleccione]</option>
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
                        <tr>
                            <td>PROFESIONAL:</td>
                            <td colspan="3">
                                <input class="form-control" type="text" required="required" value="<?= $pac->usuNombre . " " . $pac->usuApellido; ?>" />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <!-- Tabla captura de la información -->
                    <table class="table table-bordered">
                        <tr>
                            <td>Valor Copago:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="0" name="copago" />
                            </td>
                        </tr>
                        <tr>
                            <td>Valor Descuento %:</td>
                            <td>
                                <input class="form-control" type="text" required="required" value="0" name="descuento" />
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
                                <input class="form-control" type="text" required="required" value="0" name="comision" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


                <div class="form-group col-md-6">
                    <input type="submit" name="submit" value="Guardar" class="btn btn-primary" />
                </div>
            </div>
            <input type="" name="" id="id_cups" value="<?= $pac->idCups; ?>" hidden>

        <?php } ?>
    </form>
</div>
<script>
    $(document).ready(function() {

        $('#contrato').change(function() {

            var idContrato = $(this).val();

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

                    if (len > 0) {
                        if (cups.includes(id_cups)) {

                            $("#tipo_contrato").val(data[0].conTipo);

                        } else {
                            $("#contrato").val("");
                            $("#tipo_contrato").val("");
                            $("#autorizacion").val("");
                            alert("Servicio no se encuentra incluido en este contrato")

                        }


                    }
                }
            });

        });
    });
</script>