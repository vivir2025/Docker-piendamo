<!-- View where you modify or update patient information -->
<div class="container text-white">
    <?php echo form_open_multipart('CPaciente/Editar');
    foreach ($paciente as $pac) { ?>
        <input hidden id='id' name='id' value='<?= $pac->idPaciente ?>' />
        <h5 style="color: WHITE;">PACIENTE</h5>
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputPassword4">Tipo Documento</label>
                <select class="form-control" name="tipo" id="tipo" required="">
                    <?php
                    foreach ($tipo_documento as $tipo_doc) {
                        if ($pac->pacTipDocumento == $tipo_doc->idTipDocumento) {
                            echo "<option selected='selected' value={$tipo_doc->idTipDocumento}>{$tipo_doc->docNombre}</option>";
                        } else {
                            echo "<option value={$tipo_doc->idTipDocumento}>{$tipo_doc->docNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Identificación</label>
                <input class="form-control" name="identificacion" type="number" value="<?= $pac->pacDocumento; ?>" placeholder="Documento" required="" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Correo</label>
                <input class="form-control" name="correo" type="email" required="" value="<?= $pac->pacCorreo; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Primer Nombre</label>
                <input class="form-control" name="nombre" type="text" required="" value="<?= $pac->pacNombre; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Segundo Nombre</label>
                <input class="form-control" name="nombre2" type="text" value="<?= $pac->pacNombre2; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Primer Apellido</label>
                <input class="form-control" name="apellido" type="text" required="" value="<?= $pac->pacApellido; ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Segundo Apellido</label>
                <input class="form-control" name="apellido2" type="text" value="<?= $pac->pacApellido2; ?>">
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="inputEmail4">Fecha Nacimiento</label>
                <input class="form-control" name="fecha_nacimiento" value="<?= $pac->pacFecNacimiento; ?>" type="date" required="">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Sexo</label>
                <?php if ($pac->pacSexo == 'M') { ?>
                    <select name="sexo" required="" class="form-control">
                        <option value="<?= $pac->pacSexo; ?>">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select>

                <?php } else {  ?>

                    <select name="sexo" required="" class="form-control">
                        <option value="<?= $pac->pacSexo; ?>">FEMENINO</option>
                        <option value="M">MASCULINO</option>
                    </select>

                <?php } ?>
            </div>

            <div class="form-group col-md-3">
                <label for="inputEmail4">Depto Nacimiento</label>
                <select id="departamento" class="form-control" required="" name="departamento_nacimiento">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($departamento as $dep) {
                        if ($pac->depto_nacimiento == $dep['idDepartamento']) {
                            echo "<option selected='selected' value='" . $dep['idDepartamento'] . "' >"


                                . $dep['depNombre'] . "</option>";
                        } else {
                            echo "<option value='" . $dep['idDepartamento'] . "' >"


                                . $dep['depNombre'] . "</option>";
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Municipio Nacimiento</label>
                <select id="municipio" class="form-control" required="" name="municipio_nacimiento">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($municipio as $mun) {
                        if ($pac->municipio_nacimiento == $mun->idMunicipio) {
                            echo "<option selected='selected' value={$mun->idMunicipio}>{$mun->munNombre}</option>";
                        } else {
                            echo "<option value={$mun->idMunicipio}>{$mun->munNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

        </div>
        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="inputEmail4">Domicilio</label>
                <input class="form-control" name="domicilio" type="text" value="<?= $pac->pacDireccion; ?>" required="">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Telefono</label>
                <input class="form-control" name="telefono" type="text" value="<?= $pac->pacTelefono; ?>" required="">
            </div>

            <div class="form-group col-md-3">
                <label for="inputEmail4">Depto Residencia</label>
                <select class="form-control" required="" name="departamento_residencia">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($departamento as $dep) {
                        if ($pac->depto_nacimiento == $dep['idDepartamento']) {
                            echo "<option selected='selected' value='" . $dep['idDepartamento'] . "' >"


                                . $dep['depNombre'] . "</option>";
                        } else {
                            echo "<option value='" . $dep['idDepartamento'] . "' >"


                                . $dep['depNombre'] . "</option>";
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Municipio Residencia</label>
                <select class="form-control" required="" name="municipio_residencia">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($municipio as $mun) {
                        if ($pac->municipio_residencia == $mun->idMunicipio) {
                            echo "<option selected='selected' value={$mun->idMunicipio}>{$mun->munNombre}</option>";
                        } else {
                            echo "<option value={$mun->idMunicipio}>{$mun->munNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="inputEmail4">Zona Residencial</label>
                <select class="form-control" required="" name="zona_residencial">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($zona_residencial as $zona) {
                        if ($pac->id_zona_residencia == $zona->zona_residencial) {
                            echo "<option selected='selected' value={$zona->zona_residencial}>{$zona->zonNombre}</option>";
                        } else {
                            echo "<option value={$zona->zona_residencial}>{$zona->zonNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Regimen</label>
                <select class="form-control" required="" name="regimen">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($regimen as $reg) {
                        if ($pac->regimen_idRegimen == $reg->idRegimen) {
                            echo "<option selected='selected' value={$reg->idRegimen}>{$reg->regNombre}</option>";
                        } else {
                            echo "<option value={$reg->idRegimen}>{$reg->regNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="inputEmail4">Eps</label>
                <select class="form-control" required="" name="empresa">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($empresa as $empre) {
                        if ($pac->empresa_idEmpresa == $empre->idEmpresa) {
                            echo "<option selected='selected' value={$empre->idEmpresa}>{$empre->empNombre}</option>";
                        } else {
                            echo "<option value={$empre->idEmpresa}>{$empre->empNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Tipo Afiliacion</label>
                <select class="form-control" required="" name="tipo_afiliacion">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($tipo_afiliacion as $tipo) {
                        if ($pac->id_tipo_afiliacion == $tipo->tip_afi) {
                            echo "<option selected='selected' value={$tipo->tip_afi}>{$tipo->tipNombre}</option>";
                        } else {
                            echo "<option value={$tipo->tip_afi}>{$tipo->tipNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-3">
                <label for="inputEmail4">Raza</label>
                <select class="form-control" name="raza" id="raza" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($raza as $r) {
                        if ($pac->raza_idRaza == $r->idRaza) {
                            echo "<option selected='selected' value={$r->idRaza}>{$r->razNombre}</option>";
                        } else {
                            echo "<option value={$r->idRaza}>{$r->razNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Estado Civil</label>
                <input class="form-control" name="estado_civil" type="text" required="" value="<?= $pac->pacEstCivil; ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="inputEmail4">Escolaridad</label>
                <select class="form-control" name="escolaridad" id="escolaridad" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($escolaridad as $esco) {
                        if ($pac->escolaridad_idEscolaridad == $esco->idEscolaridad) {
                            echo "<option selected='selected' value={$esco->idEscolaridad}>{$esco->escNombre}</option>";
                        } else {
                            echo "<option value={$esco->idEscolaridad}>{$esco->escNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
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
            <div class="form-group col-md-12">
                <label>Ocupacion</label>
                <select class="form-control" name="ocupacion" required="" id="cups">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($ocupacion as $ocu) {
                        if ($pac->pacOcupacion == $ocu->idOcupacion) {
                            echo "<option selected='selected' value={$ocu->idOcupacion}>{$ocu->ocuNombre}</option>";
                        } else {
                            echo "<option value={$ocu->idOcupacion}>{$ocu->ocuNombre}</option>";
                        }
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

            <div class="form-group col-md-3">
                <label for="inputEmail4">Nombre Completo</label>
                <input class="form-control" name="acudiente" type="text" value="<?= $pac->nombre_acudiente; ?>" required="">
            </div>

            <div class="form-group col-md-3">
                <label for="inputEmail4">Tipo Parentesco</label>
                <select class="form-control" name="tipo_parentesco" required="">
                    <option value="">[Seleccione]</option>
                    <?php
                    foreach ($parentesco as $paren) {
                        if ($pac->parentesco_idParentesco == $paren->idParentesco) {
                            echo "<option selected='selected' value={$paren->idParentesco}>{$paren->tipParNombre}</option>";
                        } else {
                            echo "<option value={$paren->idParentesco}>{$paren->tipParNombre}</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Telefono</label>
                <input class="form-control" name="telefono_acudiente" type="text" value="<?= $pac->telefono_acudiente; ?>" required="">
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Direccion</label>
                <input class="form-control" name="direccion_acudiente" value="<?= $pac->direccion_acudiente; ?>" type="text" required="">
            </div>
        </div>
         <h5 style="color: white;">Acompañante</h5>
     <hr>
     <div class="form-row">

         <div class="form-group col-md-6">
             <label for="inputEmail4">Nombre Completo</label>
             <input class="form-control" name="acompanante" type="text" placeholder="Nombre Completo" required=""  value="<?= $pac->pacAcompananteNombre; ?>">
         </div>
         <div class="form-group col-md-6">
             <label for="inputEmail4">Telefono</label>
             <input class="form-control" name="telefono_acompanante" type="text" placeholder="Telefono" required="" value="<?= $pac->pacAcompananteTelefono; ?>">
         </div>
       
	<div class="form-group col-md-6">
                       <label for="inputEmail4">AUXILIAR</label>
                             <select class="form-control"  name="auxiliar_idauxiliar" >
                                <option value="">[Seleccione]</option>
                                <?php
                                foreach ($auxiliar as $aux) {
                                    if ($pac->auxiliar_idauxiliar == $aux->idauxiliar) {
                                        echo "<option selected='selected' value={$aux->idauxiliar}>{$aux->nombreauxiliar}</option>";
                                    } else {
                                        echo "<option value={$aux->idauxiliar}>{$aux->nombreauxiliar}</option>";
                                    }
                                }
                                ?>
                            </select>
                             
                        
                        </div> 
	  <div class="form-group col-md-6">
                            <label for="inputEmail4">NOVEDAD</label>
                           	<select class="form-control" name="novedad_idnovedad"   >
                               <option value="">[Seleccione]</option>
                                <?php
                                foreach ($novedad as $nov) {
                                    if ($pac->novedad_idnovedad == $nov->idnovedad) {
                                        echo "<option selected='selected' value={$nov->idnovedad}>{$nov->tipo_novedad}</option>";
                                    } else {
                                        echo "<option value={$nov->idnovedad}>{$nov->tipo_novedad}</option>";
                                    }
                                }
                                ?>
                            </select>
                            </div>
                                
		 
                            <div class="form-group col-md-12">
                <label>Observacion</label>
                <textarea class="form-control" value="<?= $pac->pacObservacion; ?>" name="observacion" rows="2"><?= $pac->pacObservacion; ?></textarea>
            </div>
            <input type="hidden" name="Fecha_Actua" id="fecha_auto">
            </div>
        <hr>
        <div class="form-row">

            <div class="form-group col-md-6">
                <input type="submit" name="submit" value="Actualizar" class="btn btn-primary" />
                <a href="<?= base_url("index.php/CPaciente") ?>" class="btn btn-danger">Regresar...</a>
            </div>
        </div>
    <?php } ?>
</div>
<script>
// Escucha el evento 'DOMContentLoaded' para asegurarse de que el script se ejecute cuando el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    // Función que se ejecutará al hacer clic en el botón "Actualizar"
    function actualizarFecha() {
        // Obtiene la fecha actual en el formato deseado (por ejemplo, YYYY-MM-DD)
        var fecha_actual = new Date().toISOString().split('T')[0];
        
        // Asigna la fecha actual al campo oculto
        var fechaAuto = document.getElementById('fecha_auto');
        fechaAuto.value = fecha_actual;
    }

    // Obtiene el botón de "Actualizar"
    var btnActualizar = document.querySelector('input[type="submit"][name="submit"]');
    
    // Agrega un event listener para el clic en el botón "Actualizar"
    btnActualizar.addEventListener('click', actualizarFecha);
});
</script>