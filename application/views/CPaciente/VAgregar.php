<!-- This is the view where patients and their life information are aggregated ... -->
<div class="container">  

        <?php echo form_open_multipart('CPaciente/agregar'); ?>
        <h5 style="color: white;">Paciente</h5>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4 text-white">
                <label for="inputPassword4">Tipo Documento</label>
                <select class="form-control" name="tipo" id="tipo" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($tipo_documento as $tipo_doc) {
                            echo "<option value={$tipo_doc->idTipDocumento}>{$tipo_doc->docNombre}</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-4 text-white">
                <label for="inputEmail4">Identificación</label>
                <input class="form-control" name="identificacion" type="number" maxlength="10" placeholder="Documento" required="" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
            </div>
            <div class="form-group col-md-4 text-white">
                <label>Correo</label>
                <input class="form-control" name="correo" type="email" required="" placeholder="Correo">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 text-white">
                <label>Primer Nombre</label>
                <input class="form-control" name="nombre" type="text" placeholder="Primer Nombre" required="">
            </div>
            <div class="form-group col-md-3 text-white">
                <label>Segundo Nombre</label>
                <input class="form-control" name="nombre2" type="text" placeholder="Segundo Nombre">
            </div>
            <div class="form-group col-md-3 text-white">
                <label>Primer Apellido</label>
                <input class="form-control" name="apellido" type="text" placeholder="Primer Apellido" required="">
            </div>
            <div class="form-group col-md-3 text-white">
                <label>Segundo Apellido</label>
                <input class="form-control" name="apellido2" type="text" placeholder="Segundo Apellido">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Fecha Nacimiento</label>
                <input class="form-control" name="fecha_nacimiento" type="date" id="fecha_nacimiento" required="" onchange="getEdad();">
            </div>
            <div class="form-group col-md-2 text-white">
                <label for="inputEmail4">Edad</label>
                <input class="form-control" type="text" placeholder="Edad" required="" id="edad" readonly="">
            </div>
            <div class="form-group col-md-2 text-white">
                <label for="inputEmail4">Sexo</label>
                <select class="form-control" name="sexo" id="sexo" required="">
                    <option value="">[Seleccione]</option>
                    <option value="M">MASCULINO</option>
                    <option value="F">FEMENINO</option>
                </select>
            </div>

            <div class="form-group col-md-2 text-white">
                <label for="inputEmail4">Depto Nacimiento</label>
                <select class="form-control" required="" name="departamento_nacimiento" id='sel_depa_nacimiento'>
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($departamento as $dep) {

                            echo "<option value='" . $dep['idDepartamento'] . "' >" . $dep['depNombre'] .  "</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Municipio Nacimiento</label>
                <div id="municipio_nacimiento"></div>
            </div>

        </div>
        <div class="form-row">

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Domicilio</label>
                <input class="form-control" name="domicilio" type="text" id="inputEmail4" placeholder="Domicilio" required="">
            </div>
            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Telefono</label>
                <input class="form-control" name="telefono" type="text" id="inputEmail4" placeholder="Telefono" required="">
            </div>

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Depto Residencia</label>
                <select class="form-control" required="" name="departamento_residencia" id='sel_depa_residencia'>
                    <option value="">[Seleccione]</option>

                    <?php
                        foreach ($departamento as $dep) {

                            echo "<option value='" . $dep['idDepartamento'] . "' >" . $dep['depNombre'] .  "</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-3 text-white">
                <label>Municipio Residencia</label>
                <div id="municipio_residencia"></div>
            </div>

        </div>
        <div class="form-row">

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Zona Residencial</label>
                <select class="form-control" required="" name="zona_residencial">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($zona_residencial as $zona) {
                            echo "<option value={$zona->zona_residencial}>{$zona->zonNombre}</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Regimen</label>
                <select class="form-control" required="" name="regimen">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($regimen as $reg) {
                            echo "<option value={$reg->idRegimen}>{$reg->regNombre}</option>";
                        }
                        ?>
                </select>
            </div>

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Eps</label>
                <select class="form-control" required="" name="empresa">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($empresa as $empre) {
                            echo "<option value={$empre->idEmpresa}>{$empre->empNombre}</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Tipo Afiliacion</label>
                <select class="form-control" required="" name="tipo_afiliacion">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($tipo_afiliacion as $tipo) {
                            echo "<option value={$tipo->tip_afi}>{$tipo->tipNombre}</option>";
                        }
                        ?>
                </select>
            </div>

        </div>
        <div class="form-row">

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Raza</label>
                <select class="form-control" name="raza" id="raza" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($raza as $r) {
                            echo "<option value={$r->idRaza}>{$r->razNombre}</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Estado Civil</label>
                <input class="form-control" name="estado_civil" type="text" id="inputEmail4" placeholder="Estado Civil" required="">
            </div>

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Escolaridad</label>
                <select class="form-control" name="escolaridad" id="escolaridad" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($escolaridad as $esco) {
                            echo "<option value={$esco->idEscolaridad}>{$esco->escNombre}</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-3 text-white">
            <label for="inputEmail4">Brigada</label>
            <select class="form-control" name="Brigada_idBrigada" id="Brigada_idBrigada" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($brigada as $b) {
                        if ($pac->Brigada_idBrigada == $b->idBrigada) {
                            echo "<option selected='selected' value={$b->idBrigada}>{$b->briNombre}</option>";
                        } else {
                            echo "<option value={$b->idBrigada}>{$b->briNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-12 text-white">
                <label>Ocupacion</label>
                <select class="form-control" required="" name="ocupacion" id="cups">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($ocupacion as $ocu) {
                            echo "<option value={$ocu->idOcupacion}>{$ocu->ocuNombre}</option>";
                        }
                        ?>
                </select>
            </div>

        </div>

        <div class="form-row">

        
            
            
        </div>
        <h5 style="color: white;">Responsable</h5>
        <hr>
        <div class="form-row">

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Nombre Completo</label>
                <input class="form-control" name="acudiente" type="text" placeholder="Nombre Completo" required="">
            </div>

            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Tipo Parentesco</label>
                <select class="form-control" name="tipo_parentesco" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                        foreach ($parentesco as $paren) {
                            echo "<option value={$paren->idParentesco}>{$paren->tipParNombre}</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Telefono</label>
                <input class="form-control" name="telefono_acudiente" type="text" placeholder="Telefono" required="">
            </div>
            <div class="form-group col-md-3 text-white">
                <label for="inputEmail4">Direccion</label>
                <input class="form-control" name="direccion_acudiente" type="text" placeholder="Direccion" required="">
            </div>
        </div>
        <h5 style="color: white;">Acompañante</h5>
        <hr>
        <div class="form-row">

            <div class="form-group col-md-6 text-white">
                <label for="inputEmail4">Nombre Completo</label>
                <input class="form-control" name="acompanante" type="text" placeholder="Nombre Completo" required="">
            </div>
            <div class="form-group col-md-6 text-white">
                <label for="inputEmail4">Telefono</label>
                <input class="form-control" name="telefono_acompanante" type="text" placeholder="Telefono" required="">
            </div>
  	<div class="form-group col-md-6 text-white">
    <label for="inputEmail4">AUXILIAR</label>
                        <select class="form-control"  name="auxiliar_idauxiliar"  required="" >
                        <option value="">[Seleccione]</option>
                    <?php
                        foreach ($auxiliar as $aux) {
                            echo "<option value={$aux->idauxiliar}>{$aux->nombreauxiliar}</option>";
                        }
                        ?>
                </select>
            </div> 
        <div class="form-group col-md-6 text-white">
                <h5 style="color: white;">Novedad</h5>
                <select class="form-control"  name="novedad_idnovedad"  required="" >
                        <option value="">[Seleccione]</option>
                    <?php
                        foreach ($novedad as $nov) {
                            echo "<option value={$nov->idnovedad}>{$nov->tipo_novedad}</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="form-group col-md-12 text-white">
                <label>Observacion</label>
                <textarea class="form-control" name="observacion" required="" rows="2" placeholder="Observacion"></textarea>
            </div>
        <hr>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-6 text-white">
                <input type="submit" name="submit" value="Agregar Paciente" class="btn btn-primary" />
                <a href="<?= base_url("index.php/CPaciente") ?>" class="btn btn-primary">Regresar...</a>

            </div>
        </div>
    </div>   
</body>    
    <script type='text/javascript'>
        function getEdad() {

            var fecha = document.getElementById("fecha_nacimiento").value;

            var birthdate = new Date(fecha);
            var cur = new Date();
            var diff = cur - birthdate;
            var age = Math.floor(diff / 31557600000);

            $("#edad").val(age);

        }

        $(document).ready(function() {

            $('#sel_depa_residencia').change(function() {
                var idDepartamento = $(this).val();
                $.ajax({
                    url: '<?= base_url() ?>index.php/CPaciente/mostrarMunicipio',
                    method: 'post',
                    data: {
                        idDepartamento: idDepartamento
                    },
                    dataType: 'json',
                    success: function(response) {

                        //console.log(response);

                        agregarMunicipioResidencia(response);
                    }
                });
            });
        });

        $(document).ready(function() {

            $('#sel_depa_nacimiento').change(function() {
                var idDepartamento = $(this).val();
                $.ajax({
                    url: '<?= base_url() ?>index.php/CPaciente/mostrarMunicipio',
                    method: 'post',
                    data: {
                        idDepartamento: idDepartamento
                    },
                    dataType: 'json',
                    success: function(response) {

                        //console.log(response);

                        agregarMunicipioNacimiento(response);
                    }
                });
            });
        });


        function agregarMunicipioResidencia(response) {
            var html = "<select id='municipio_residencia' name='municipio_residencia' class='form-control'>";
            for (key in response) {
                html += "<option value='" + response[key].idMunicipio + "'>" + response[key].munNombre + "</option>";
            }
            html += "</select>";
            $('#municipio_residencia').html(html);
        }

        function agregarMunicipioNacimiento(response) {
            var html = "<select id='municipio_nacimiento' name='municipio_nacimiento' class='form-control'>";
            for (key in response) {
                html += "<option value='" + response[key].idMunicipio + "'>" + response[key].munNombre + "</option>";
            }
            html += "</select>";
            $('#municipio_nacimiento').html(html);
        }
</script>