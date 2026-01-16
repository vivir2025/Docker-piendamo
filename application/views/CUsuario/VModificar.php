<!-- This is the view where you can modify the required user information -->
 
<div class="container">
    <body style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">
        <?php echo form_open_multipart('CUsuario/Editar');
        foreach ($usuario as $usu) { ?>
            <input hidden id='id' name='id' value='<?= $usu->idUsuario ?>' />
            <hr>
            <h3 style="color: white;">USUARIO</h3>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-4 text-white">
                    <label for="inputPassword4">Documento</label>
                    <input class="form-control" name="documento" type="text" required="" value="<?= $usu->usuDocumento; ?>">
                </div>
                <div class="form-group col-md-4 text-white">
                    <label for="inputPassword4">Nombre</label>
                    <input class="form-control" name="nombre" type="text" required="" value="<?= $usu->usuNombre; ?>">
                </div>
                <div class="form-group col-md-4 text-white">
                    <label for="inputPassword4">Apellido</label>
                    <input class="form-control" name="apellido" type="text" required="" value="<?= $usu->usuApellido; ?>">
                </div>
            </div>
<br>
            <div class="form-row">

                <div class="form-group col-md-6 text-white">
                    <label for="inputEmail4">Telefono</label>
                    <input class="form-control" name="telefono" value="<?= $usu->usuTelefono; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-6 text-white">
                    <label for="inputEmail4">Correo</label>
                    <input class="form-control" name="correo" value="<?= $usu->usuCorreo; ?>" type="email" required="">
                </div>

            </div>
<br>
            <div class="form-row">

                <div class="form-group col-md-3 text-white">
                    <label for="inputEmail4">Rol</label>
                    <select class="form-control" name="rol" required="" id="rol" onChange="mostrar()">
                        <option value="">[Seleccione]</option>
                        <?php
                        foreach ($rol as $r) {
                            if ($usu->rol_idRol == $r->idRol) {
                                echo "<option selected='selected' value={$r->idRol}>{$r->rolNombre}</option>";
                            } else {
                                echo "<option value={$r->idRol}>{$r->rolNombre}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3 text-white" id="tipo_usuario" style="display: none;">
                    <label for="inputEmail4">Tipo Usuario</label>
                    <select class="form-control" name="especialidad">
                        <option value="">[Seleccione]</option>
                        <?php
                        foreach ($especialidad as $espe) {
                            if ($usu->especialidad_idEspecialidad == $espe->idEspecialidad) {
                                echo "<option selected='selected' value={$espe->idEspecialidad}>{$espe->espNombre}</option>";
                            } else {
                                echo "<option value={$espe->idEspecialidad}>{$espe->espNombre}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3 text-white" id="resolucion" style="display: none;">
                    <label for="inputEmail4">Resolucion</label>
                    <input class="form-control" name="resolucion" type="text" value="<?= $usu->usuRegistroProfesional; ?>">
                </div>
                <div class="form-group col-md-3" id="firma" style="display: none;">
                    <label for="inputEmail4">Firma</label>
                    <input class="form-control" name="firma" id="firma1" type="file" accept="image/*" onchange="ValidarTamaño(this);">
                </div>

            </div>
            <br>
            <div class="form-row">

                <div class="form-group col-md-4 text-white">
                    <label for="inputEmail4">Login</label>
                    <input class="form-control" name="login" value="<?= $usu->usuLogin; ?>" type="text" required="">
                </div>
                <div class="form-group col-md-4 text-white">
                    <label for="inputEmail4">Contraseña</label>
                    <input class="form-control" name="pwd" value="<?= $usu->usuClave; ?>" type="password" required="">
                </div>
                <div class="form-group col-md-4 text-white">
                    <label for="inputEmail4">Estado</label>
                    <select class="form-control" name="estado" required="">
                        <option value="">[Seleccione]</option>
                        <?php
                        foreach ($estado as $est) {
                            if ($usu->estado_idEstado == $est->idEstado) {
                                echo "<option selected='selected' value={$est->idEstado}>{$est->estNombre}</option>";
                            } else {
                                echo "<option value={$est->idEstado}>{$est->estNombre}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

            </div>
        
            <br>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <input type="submit" name="submit" value="Actualizar Usuario" class="btn btn-primary" />
                    <a href="<?= base_url("index.php/CUsuario") ?>" class="btn btn-danger">Regresar...</a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
<br>
<script type="text/javascript">



 window.onload = mostrar;

 function mostrar() {

    if ($("#rol").val() == 2) {
        $("#tipo_usuario").show();
        $("#resolucion").show();
        $("#firma").show();
    } else {

        $("#tipo_usuario").hide();
        $("#resolucion").hide();
        $("#firma").hide();
    }


}





function ValidarTamaño(obj) {
    var uploadFile = obj.files[0];
    var img = new Image();
    img.onload = function() {
        if (this.width.toFixed(0) != 302 && this.height.toFixed(0) != 70) {
            alert("La imagen debe ser de tamaño 302px por 70px.");
            $('#firma1').val("");
        }

    };
    img.src = URL.createObjectURL(uploadFile);
}
</script>