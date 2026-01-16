<!-- This is the view where I list and search for the different users  -->
<div class="container text-white">
    <!-- Button trigger modal -->
    <h5 style="color:#FFFFFF">LISTA DE USUARIOS</h5>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
        Agregar Usuario</button><br><br>


    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <?php echo form_open_multipart('CUsuario/agregar'); ?>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header"style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">
                    <h5 class="modal-title text-white" id="myLargeModalLabel " >Formulario Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body " enctype="multipart/form-data"style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">
                    <p style="color: white;">Usuario</p>
                    <div class="form-row">
                        <div class="form-group col-md-4 text-white">
                            <label for="inputEmail4">Documento</label>
                            <input class="form-control" name="documento" type="text" placeholder="Documento" required="">
                        </div>
                        <div class="form-group col-md-4 text-white">
                            <label for="inputEmail4">Nombre</label>
                            <input class="form-control" name="nombre" type="text" placeholder="Nombre" required="">
                        </div>
                        <div class="form-group col-md-4 text-white">
                            <label for="inputEmail4">Apellido</label>
                            <input class="form-control" name="apellido" type="text" placeholder="Apellido" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 text-white">
                            <label for="inputEmail4">Telefono</label>
                            <input class="form-control" name="telefono" type="text" placeholder="Telefono" required="">
                        </div>
                        <div class="form-group col-md-6 text-white">
                            <label for="inputEmail4">Correo</label>
                            <input class="form-control" name="correo" type="email" placeholder="Correo" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 text-white">
                            <label for="inputEmail4">Rol</label>
                            <select class="form-control" required="" name="rol" id="rol" onChange="mostrar(this.value);">
                                <option value="">[Seleccione]</option>
                                <?php
                                foreach ($rol as $r) {
                                    echo "<option value={$r->idRol}>{$r->rolNombre}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4" id="tipo_usuario" style="display: none;">
                            <label for="inputEmail4">Tipo Usuario</label>
                            <select class="form-control" name="especialidad" id="especialidad"> 
                                <option value="">[Seleccione]</option>
                                <?php
                                foreach ($especialidad as $espe) {
                                    echo "<option value={$espe->idEspecialidad}>{$espe->espNombre}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-4" id="resolucion" style="display: none;">
                            <label for="inputEmail4">Resolucion</label>
                            <input onkeyup="validar()" class="inputFormu form-control" name="resolucion" id="resolucion" type="text" placeholder="Resolucion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 text-white">
                            <label for="inputEmail4">Login</label>
                            <input class="form-control" name="login" type="text" placeholder="Login" required="" minlength="7">
                        </div>
                        <div class="form-group col-md-3 text-white">
                            <label for="inputEmail4">Contraseña</label>
                            <input class="form-control" name="pwd" type="password" placeholder="Contraseña" required="" minlength="7">
                        </div>
                        <div class="form-group col-md-6" id="firma" style="display: none;">
                            <label for="inputEmail4">Firma</label>
                            <input class="form-control" name="firma" id="firma1" type="file" accept="image/*" onchange="ValidarTamaño(this);">
                        </div>
                    </div>
                </div>
                <div class="modal-footer"style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <input id="boton" type="submit" name="submit" value="Agregar" class="btn btn-primary" />
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="example" class="table table-bordered bg-light" style="width:100%">
            <thead>
                <tr>
                    <th>Resolucion</th>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>Area</th>
                    <th>Estado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuario as $usu) {
                ?>

                    <tr>
                        <td><?= $usu->usuRegistroProfesional; ?></td>
                        <td><?= $usu->usuDocumento ?></td>
                        <td><?= $usu->usuNombre . " " . $usu->usuApellido; ?></td>
                        <td><?= $usu->rolNombre; ?></td>
                        <td><?= $usu->estNombre; ?></td>
                        <td>
                            <a class="btn btn-info" href="<?= base_url("index.php/CUsuario/modRecuperar/$usu->idUsuario") ?>">Actualizar</a>
                        </td>

                        <td>
                            <?php if ($usu->estado_idEstado == 1) { ?>
                                <a class="btn btn-danger" onclick="eliminar('<?php echo $usu->idUsuario; ?>')"> Eliminar</a>

                            <?php }

                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Resolucion</th>
                    <th>Identificacion</th>
                    <th>Nombre</th>
                    <th>Area</th>
                    <th>Estado</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<style>#prueba:hover {
color: #F21414;
}
</style>


<script type="text/javascript">
    /*$("#firma1").change(function() {
        $("button").prop("disabled", this.files.length == 0);
    });*/

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


    function eliminar(id) {
        if (confirm('¿Desea eliminar el registro?')) {
            document.location.href = "<?php echo base_url() . 'index.php/CUsuario/eliminar/' ?>" + id;
        }
    }

    function validar() {
        var validado = true;
        elementos = document.getElementsByClassName("inputFormu");
        //select = $("#especialidad").val();

        //alert(select)
        ///for (i = 0; i < elementos.length; i++) {
        /*if (elementos[i].value == "" || elementos[i].value == null) {
            validado = false
        }*/
        //}
        if (elementos == "" || elementos == null) {
            validado = false
        }else {
            validado = true
        }

        if (validado) {
            document.getElementById("boton").disabled = false;

        } else {
            document.getElementById("boton").disabled = true;
            //Salta un alert cada vez que escribes y hay un campo vacio
            //alert("Hay campos vacios")   
        }
    }

    function mostrar(id) {
        if (id == 2) {

            $("#tipo_usuario").show();
            $("#resolucion").show();
            $("#firma").show();

            document.getElementById("boton").disabled = true;

        } else {

            $("#tipo_usuario").hide();
            $("#resolucion").hide();
            $("#firma").hide();

            document.getElementById("boton").disabled = false;
        }
    }

    
</script>