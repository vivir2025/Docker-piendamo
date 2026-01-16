<!-- view to press the rebill  -->
<div class="bg-white">
<div class="container">
    <br>
    <!-- Tabla captura de la información -->
    <div style="border: ridge #0f0fef 1px; text-align:center">

            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>
                <div class="form-group col-md-4" style=" margin: auto;">

                    <tr height="">
                        <td height="">
                            <div align="center">
                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                            </div>
                        </td>
                    </tr>
                    <tr height="">
                        <td height="">
                            <div align="center"><small>FORMATO DE FACTURACION EN IPS FUNDACION NACER PARA VIVIR</small></div>
                        </td>
                    </tr>
                </div>


                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/logo.png"); ?>" width="100px" /></td>
                    </tr>

                </div>


            </div>
        </div>
        <br><br>
    <div class="form-row">
        <table class="table table-bordered">
            <?php
            foreach ($datos_factura as $df) {

            ?>
                <tr>
                    <td>Fecha Fact:</td>
                    <td colspan="3"><?php echo date("Y-m-d", time()); ?></td>
                    <td>Periodo:</td>
                    <td colspan="3">Fecha Periodo</td>
                </tr>
                <tr>
                    <td>Nit:</td>
                    <td colspan="2"><?= $df->empNit; ?></td>
                    <td>Facturado a:</td>
                    <td colspan="2"><?= $df->empNombre; ?></td>
                    <td>Contrato:</td>
                    <td><?= $df->conNumero; ?></td>
                </tr>
                <tr>
                    <td>Identificacion:</td>
                    <td><?= $df->pacDocumento; ?></td>
                    <td>Paciente:</td>
                    <td><?= $df->pacNombre . " " . $df->pacApellido; ?></td>
                    <td>Fecha Nacimiento:</td>
                    <td><?= $df->pacFecNacimiento; ?></td>
                    <td>Genero:</td>
                    <td><?= $df->pacSexo; ?></td>
                </tr>
                <tr>
                    <td>Telefono:</td>
                    <td><?= $df->pacTelefono; ?></td>
                    <td colspan="2">Regimen:</td>
                    <td><?= $df->regNombre; ?></td>
                    <td>Tipo Afiliacion:</td>
                    <td colspan="2"><?= $df->tipNombre; ?></td>
                </tr>

                <tr>
                    <th>Codigo</th>
                    <th>Descrpcion</th>
                    <th>Valor</th>
                    <th>Copago</th>
                    <th>Descuento</th>
                    <th colspan="3">Total</th>

                <tr>
                    <td><?= $df->cupCodigo; ?></td>
                    <td><?= $df->cupNombre; ?></td>
                    <td><?= $df->tarifa; ?></td>
                    <td><?= $df->facCopago; ?></td>
                    <td><?= $df->facCopago; ?></td>
                    <td colspan="3"><?php
                                    $copago = $df->facCopago;
                                    $valor_cups = $df->tarifa;
                                    $total = $valor_cups + $copago;
                                    echo $total; ?></td>
                </tr>
                </tr>
                <tr>
                    <td colspan="8">Facturado por: <?= $this->session->userdata('nom_user'); ?></td>
                </tr>



            <?php

            } ?>
        </table>

        <table width="750" style="font-size: 11px !important" border="0" class="" align="center">
            <tr>
                <td>
                    <div align="center">_________________________</div>
                </td>
                <td>
                    <div align="center">_________________________</div>
                </td>
                <td>
                    <div align="center">_________________________</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center"><strong>Firma Cajero</strong></div>
                </td>
                <td>
                    <div align="center"><strong>Firma Profesional</strong></div>
                </td>
                <td>
                    <div align="center"><strong>Firma Usuario</strong></div>
                </td>
            </tr>
        </table>
    </div>

    <hr>
    <a class="btn btn-primary hidden-print" onclick="javascript:window.print();">Imprimir</a>
    <a class="btn btn-danger" href="<?= site_url('CHome') ?>">Ir al Home</a>

</div>
</div>