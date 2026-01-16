
<!-- This is the view that is displayed to modify the stipulated contracts of the company ... -->
 

<div class="container text-white">
    <?php echo form_open_multipart('CContrato/Editar');
    foreach ($contrato as $contra) { ?>
        <input hidden id='id' name='id' value='<?= $contra->idContrato ?>' />
        <h5 style="color: white;">Contrato</h5>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>N° Contrato</label>
                <input class="form-control" name="numero" type="text" required="" value="<?= $contra->conNumero; ?>">
            </div>

            <div class="form-group col-md-4">
                <label>Plan Beneficio</label>
                <?php if ($contra->conPlanBeneficio == 'POST') { ?>
                    <select name="plan" required="" class="form-control">
                        <option value="<?= $contra->conPlanBeneficio; ?>"><?= $contra->conPlanBeneficio; ?></option>
                        <option value="NO POS">NO POS</option>
                    </select>

                <?php } else {  ?>

                    <select name="plan" required="" class="form-control">
                        <option value="<?= $contra->conPlanBeneficio; ?>"><?= $contra->conPlanBeneficio; ?></option>
                        <option value="POS">POS</option>
                    </select>

                <?php } ?>
            </div>

            <div class="form-group col-md-4">
                <label>Poliza</label>
                <input class="form-control" name="poliza" type="text" required="" value="<?= $contra->conPoliza; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Contratante</label>
                <select class="form-control" name="empresa" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($empresa as $empre) {
                        if ($contra->empresa_idEmpresa == $empre->idEmpresa) {
                            echo "<option selected='selected' value={$empre->idEmpresa}>{$empre->empNombre}</option>";
                        } else {
                            echo "<option value={$empre->idEmpresa}>{$empre->empNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Valor Contrato</label>
                <input class="form-control" name="Valor" type="text" value="<?= $contra->conValor; ?>">
            </div>
            <div class="form-group col-md-3">
                <label>Porcentaje Descuento</label>
                <input class="form-control" name="descuento" type="text" value="<?= $contra->conPorDescuento; ?>">
            </div>
            <div class="form-group col-md-3">
                <label>Tipo</label>
                <?php if ($contra->conTipo == 'PGP') { ?>
                    <select name="tipo" required="" class="form-control">
                        <option value="<?= $contra->conTipo; ?>"><?= $contra->conTipo; ?></option>
                        <option value="EVENTO">EVENTO</option>
                    </select>

                <?php } else {  ?>

                    <select name="tipo" required="" class="form-control">
                        <option value="<?= $contra->conTipo; ?>"><?= $contra->conTipo; ?></option>
                        <option value="PGP">PGP</option>
                    </select>
                <?php } ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Copago</label>
                <?php if ($contra->conCopago == 'SI') { ?>
                    <select name="copago" required="" class="form-control">
                        <option value="<?= $contra->conCopago; ?>"><?= $contra->conCopago; ?></option>
                        <option value="NO">NO</option>
                    </select>

                <?php } else {  ?>

                    <select name="copago" required="" class="form-control">
                        <option value="<?= $contra->conCopago; ?>"><?= $contra->conCopago; ?></option>
                        <option value="SI">SI</option>
                    </select>

                <?php } ?>

            </div>
            <div class="form-group col-md-3">
                <label>Fecha Inicio</label>
                <input class="form-control" name="fecha_inicio" type="date" value="<?= $contra->conFechaInicio; ?>">
            </div>
            <div class="form-group col-md-3">
                <label>Fecha Finalizacion</label>
                <input class="form-control" name="fecha_fin" type="date" value="<?= $contra->conFechaFin; ?>">
            </div>
             <div class="form-group col-md-3">
                <label>Estado</label>
                <?php if ($contra->conEstado == 'ACTIVO') { ?>
                    <select name="estado" required="" class="form-control">
                        <option value="<?= $contra->conEstado; ?>"><?= $contra->conEstado; ?></option>
                        <option value="INACTIVO">INACTIVO</option>
                    </select>

                <?php } else {  ?>

                    <select name="estado" required="" class="form-control">
                        <option value="<?= $contra->conEstado; ?>"><?= $contra->conEstado; ?></option>
                        <option value="ACTIVO">ACTIVO</option>
                    </select>

                <?php } ?>

            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Descripcion</label>
                <textarea class="form-control" required="" name="descripcion" value="<?= $contra->conDescripcion; ?>"><?= $contra->conDescripcion; ?></textarea> 
             </div>
        </div>    
        <hr>
        <div class="form-row">

            <div class="form-group col-md-6">
                <input type="submit" name="submit" value="Actualizar Contrato" class="btn btn-primary" />
                <a href="<?= base_url("index.php/CContrato") ?>" class="btn btn-danger">Regresar...</a>
            </div>
        </div>
    <?php } ?>
</div>