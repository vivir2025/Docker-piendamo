<!-- This is the view where the linked EPS and their respective information are updated -->

<div class="container text-white">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">
        
    <?php echo form_open_multipart('CEmpresa/Editar');
    foreach ($empresa as $empre) { ?>
        <input hidden id='id' name='id' value='<?= $empre->idEmpresa ?>' />
        <h5 style="color: white;">EPS</h5>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Nit</label>
                <input class="form-control" name="nit" type="text" required="" value="<?= $empre->empNit; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Codigo Entidad Administradora</label>
                <input class="form-control" name="codigo1" type="text" required="" value="<?= $empre->empCodigoEAPB; ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Codigo Habilitacion</label>
                <input class="form-control" name="codigo2" type="text" required="" value="<?= $empre->empCodigo; ?>">
            </div>
        </div>
         <div class="form-row">
            <div class="form-group col-md-4">
                <label>Nombre</label>
                <input class="form-control" name="nombre" type="text" required="" value="<?= $empre->empNombre; ?>">
            </div>
            <div class="form-group col-md-4">
                <label>Direccion</label>
                <input class="form-control" name="direccion" type="text" required="" value="<?= $empre->empDireccion; ?>">
            </div>
            <div class="form-group col-md-4">
                <label>Telefono</label>
                <input class="form-control" name="telefono" type="text" required="" value="<?= $empre->empTelefono; ?>">
            </div>
        </div>
        <hr>
        <div class="form-row">

            <div class="form-group col-md-6">
                <input type="submit" name="submit" value="Actualizar EPS" class="btn btn-primary" />
                <a href="<?= base_url("index.php/CEmpresa") ?>" class="btn btn-danger">Regresar...</a>
            </div>
        </div>
    <?php } ?>
</div> 
<br><br><br><br><br><br><br><br>