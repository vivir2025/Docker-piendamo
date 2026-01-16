<!-- View of adding the contracted CUPS with their respective information -->
<div class="container text-white">
    <h5 style="color: white;">Agregar Cups al Contrato</h5>
    <body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">
    <hr>
    <?php echo form_open_multipart('CCups_Contratado/agregar');
    foreach ($contrato as $contra) { ?>
    <input hidden id='id' name='id' value='<?= $contra->idContrato ?>' />
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Contrato</label>
            <input class="form-control" readonly="" name="numero" type="text" required="" value="<?= $contra->conNumero; ?>">
        </div>
    </div>
     <?php } ?>
    <div class="form-row">
        <div class="form-group col-md-9">
            <label>Cups</label>
            <select class="form-control" name="cups" id="cups" required="">
                <option value="">[Seleccione]</option>
                <?php
                foreach ($cups as $c) {
                    echo "<option value={$c->idCups}>{$c->cupNombre}</option>";
                }
                ?>
                
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Tarifa</label>
            <input class="form-control" name="valor" type="text" placeholder="Valor" required="">
        </div>
    </div> 
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Categoria</label>
            <select class="form-control" name="categoria" required="">
                <option value="">[Seleccione]</option>
                <?php
                foreach ($categoria as $cate) {
                    echo "<option value={$cate->id_cat_cups}>{$cate->catNombre}</option>";
                }
                ?>             
            </select>
        </div>
    </div>  
    <hr>
    <div class="form-row">

        <div class="form-group col-md-12">
            <input type="submit" name="submit" value="Agregar Cups" class="btn btn-primary" />
            <a href="<?= base_url("index.php/CContrato") ?>" class="btn btn-danger">Regresar...</a>
        </div>
    </div>  
</div>
<br> <br> <br> <br> <br> <br> <br> <br> <br> 