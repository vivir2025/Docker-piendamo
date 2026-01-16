<!-- View to modify the IPS Stable Cups  -->

<div id=color class="container text-white">

    <?php echo form_open_multipart('CCups/Editar');
    foreach ($cups as $c) { ?>
        <input hidden id='id' name='id' value='<?= $c->idCups ?>' />
        <hr>
        <h5 style="color: white;">Cups</h5>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Codigo</label>
                <input class="form-control" name="codigo" type="text" required="" value="<?= $c->cupCodigo; ?>">
            </div>
            <div class="form-group col-md-10">
                <label>Nombre</label>
                <input class="form-control" name="nombre" type="text" required="" value="<?= $c->cupNombre; ?>">
            </div>
        </div>
        <hr>
        <div class="form-row">

            <div class="form-group col-md-6">
                <input type="submit" name="submit" value="Actualizar Cups" class="btn btn-primary" />
                <a href="<?= base_url("index.php/CCups") ?>" class="btn btn-danger">Regresar...</a>
            </div>
        </div>
    <?php } ?>




