<!-- This is the view where the cups are updated  -->
<div class="container text-white">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">
    <?php echo form_open_multipart('CCups_Contratado/Editar');
    foreach ($cups_contratado as $cc) { ?>
        <input hidden id='id' name='id' value='<?= $cc->id_cups_contrato ?>' />
        <h5 style="color: white;">Actualizar Cups al Contrato</h5>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>N° Contrato</label>
                <input class="form-control" readonly="" name="numero" type="text" required="" value="<?= $cc->conNumero; ?>">
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-9">
                <label>Cups</label>
                <select class="form-control" name="cups" id="cups" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($cups as $c) {
                        if ($c->idCups == $cc->cups_idCups) {
                            echo "<option selected='selected' value={$c->idCups}>{$c->cupNombre}</option>";
                        } else {
                            echo "<option value={$c->idCups}>{$c->cupNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Tarifa</label>
                <input class="form-control" name="valor" required="" type="text" value="<?= $cc->cupTarifa; ?>">
            </div>
        </div>  
         <div class="form-row">
            <div class="form-group col-md-12">
                <label>Categoria</label>
                <select class="form-control" name="categoria" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($categoria as $cate) {
                        if ($cate->id_cat_cups == $cc->id_categoria_cups) {
                            echo "<option selected='selected' value={$cate->id_cat_cups}>{$cate->catNombre}</option>";
                        } else {
                            echo "<option value={$cate->id_cat_cups}>{$cate->catNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>  
        <hr>
        <div class="form-row">

            <div class="form-group col-md-6">
                <input type="submit" name="submit" value="Actualizar Cups" class="btn btn-primary" />
            </div>
        </div>
    <?php } ?>
</div>