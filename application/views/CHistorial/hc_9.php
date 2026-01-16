<!-- This view is ready to view stories based on document number and everything related to the story -->
<head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
            <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/css/medi.css"); ?>">
        </head>
        <div class="bg-white" >
        <div  >
        <div style="border: ridge #0f0fef 1px; ">
        <div class="border">
        <div >
        <img class="img" src="<?= base_url("assets/img/logo.png"); ?>"  />
        </div>
        <div class="text" >
            <h3 class="texts">FUNDACIÓN NACER PARA </h3>
            <h3 class="texts">VIVIR IPS</h3>
            <small class="texts">NIT: 900817959-1</small>
            <small class="texts"> HISTORIA CLÍNICA NUTRICIONISTA PRIMERA VEZ PROGRAMA <br> DE GESTIÓN DEL RIESGO CARDIORENAL</small>
            <small class="texts"><?= $dato_historia[0]->citFecha ?></small>
        </div>
        <div >
        <img class="img" src="<?= base_url("assets/img/logo.png"); ?>" >
        </div>
        </div>
        </div>
<br><br>

<div class="mx-auto" style="width: 1300px;">
    <?php foreach ($dato_historia as $h) { ?>
        <fieldset>
            <legend>DATOS PACIENTE</legend>
            <div class="caja1">
                <div class="caja2">
               
                <div >
                    <strong>NOMBRE</strong><br>
                    <?php
                    echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                     echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido. " " . $h->pacApellido2; ?>
                </div>
                <div >
                    <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                    <?php echo $h->pacFecNacimiento . "<br>";
                    list($anio, $mes, $dia) = explode("-", $h->pacFecNacimiento);
                    $anio_dif = date("Y") - $anio;
                    $mes_dif = date("m") - $mes;
                    $dia_dif = date("d") - $dia;

                    if ($dia_dif < 0 || $mes_dif < 0) {
                        $anio_dif--;
                                //return $anio_dif;
                    }

                    echo $anio_dif . "Años";
                    ?>
                </div>
                <div >
                    <strong>SEXO</strong><br>
                    <?php if ($h->pacSexo == "M") {
                        echo "MASCULINO";
                    } else {
                        echo "FEMENINO";
                    } ?>
                </div>
                <div >
                    <strong>ESTADO CIVIL</strong><br>
                    <?php echo $h->pacEstCivil; ?>
                </div>
 

                <div >
                    <strong>TELÉFONO</strong><br>
                    <?php echo $h->pacTelefono; ?>
                </div>
     </div>
     <div class="caja2">
                <div >
                    <strong>DIRECCIÓN</strong><br>
                    <?php
                    echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                </div>
               
 

     
                <div >
                    <strong>ASEGURADORA</strong><br>
                    <?php
                    echo $h->empNombre; ?>
                </div>

                <div >
                    <strong>RÉGIMEN</strong><br>
                    <?php echo $h->regNombre; ?>
                </div>
                <div >
                    <strong>OCUPACIÓN</strong><br>
                    <?php echo $h->ocuNombre; ?>
                </div>
                <div >
                    <strong>BRIGADA</strong><br>
                    <?php echo $h->zonNombre; ?>
                </div>
       </div>
                
            </div>

        </fieldset>
      
        <br>
        <fieldset>
        <legend>ACUDIENTE</legend>
            <div class="caja2">
                <div >
                    <strong>NOMBRE ACOMPAÑANTE</strong><br>
                    <?php
                    echo $h->hcAcompanante; ?>
                </div>
                <div >
                    <strong>PARENTESCO</strong><br>
                    <?php
                    echo $h->hcAcuParentesco; ?>
                </div>
                <div >
                    <strong>TELÉFONO</strong><br>
                    <?php
                    echo $h->hcAcuTelefono; ?>
                </div>
            </div>

        </fieldset>
       
        <br>
        <?php foreach ($antecedentes_personales as $a){ ?>
                
           
         <fieldset>
                <legend>HISTORIA CLÍNICA</legend>
                <div class="caja12">
                    <div >
                        <div >
                            <strong>MOTIVO DE CONSULTA</strong>
                            <br>
                        <?php
                        echo $a->hcMotivoConsulta; ?>
                        </div>
                        <div >
                            <strong>ENFERMEDAD(ES) DIAGNOSTICADA(S)</strong>
                            <br>
                        <?php
                        echo $a->hcEnfermedadDiagnostica; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>HABITO INTESTINAL</strong>
                            <br>
                        <?php
                        echo $a->hcHabitoIntestinal; ?>
                        </div>
                        <div >
                            <strong>1. QUIRÚRGICOS</strong>
                            <br>
                        <?php
                        echo $a->hcQuirurgicos; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>QUIRÚRGICOS, OBSERVACIONES</strong>
                            <br>
                        <?php
                        echo $a->hcQuirurgicosObservaciones; ?>
                        </div>
                        <div >
                            <strong>2. ALÉRGICOS</strong>
                            <br>
                        <?php
                        echo $a->hcAlergicos; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>ALÉRGICOS, OBSERVACIONES</strong>
                            <br>
                        <?php
                        echo $a->hcAlergicosObservaciones; ?>
                        </div>
                        <div >
                            <strong>3. FAMILIARES</strong>
                            <br>
                        <?php
                        echo $a->hcFamiliares; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>FAMILIARES OBSERVACIONES</strong>
                            <br>
                        <?php
                        echo $a->hcFamiliaresObservaciones; ?>
                        </div>
                        <div >
                            <strong>4. PSA</strong>
                            <br>
                        <?php
                        echo $a->hcPsa; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>PSA OBSERVACIONES</strong>
                            <br>
                        <?php
                        echo $a->hcPsaObservaciones; ?>
                        </div>
                        <div >
                            <strong>5. FARMACOLÓGICOS</strong>
                            <br>
                        <?php
                        echo $a->hcFarmacologicos; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>FARMACOLÓGICOS OBSERVACIONES</strong>
                            <br>
                        <?php
                        echo $a->hcFarmacologicosObservaciones; ?>
                        </div>
                        <div >
                            <strong>6. SUEÑO</strong>
                            <br>
                        <?php
                        echo $a->hcSueno; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>SUEÑO OBSERVACIONES</strong>
                            <br>
                        <?php
                        echo $a->hcSuenoObservaciones; ?>
                        </div>
                        <div >
                            <strong>7. TABAQUISMO</strong>
                            <br>
                        <?= $dato_historia[0]->hcTabaquismo; ?>
                        </div>
                    </div>

                    <div >
                        <div >
                            <strong>TABAQUISMO OBSERVACIONES</strong>
                            <br>
                        <?php
                        echo $a->hcTabaquismoObservaciones; ?>
                        </div>
                        <div >
                            <strong>8. EJERCICIO</strong>
                            <br>
                        <?php
                        echo $a->hcEjercicio; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>EJERCICIO OBSERVACIONES</strong>
                            <br>
                        <?php
                        echo $a->hcEjercicioObservaciones; ?>
                        </div>
                        <div >
                            <strong>MÉTODO ANTICONCEPTIVO</strong>
                            <br>
                        <?php
                        echo $a->hcMetodoConceptivo; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>MÉTODO ANTICONCEPTIVO ¿CUAL?</strong>
                            <br>
                        <?php
                        echo $a->hcMetodoConceptivoCual; ?>
                        </div>
                        <div >
                            <strong>EMBARAZO ACTUAL</strong>
                             <br>
                        <?php
                        echo $a->hcEmbarazoActual; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>SEMANAS DE GESTACIÓN</strong>
                            <br>
                        <?php
                        echo $a->hcSemanasGestacion; ?>
                        </div>
                        <div >
                            <strong>CLIMATERIO</strong>
                             <br>
                        <?php
                        echo $a->hcClimatero; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>TOLERANCIA VÍA ORAL</strong>
                            <br>
                        <?php
                        echo $a->hcToleranciaViaOral; ?>
                        </div>
                        <div >
                            <strong>PERCEPCIÓN DEL APETITO</strong>
                            <br>
                        <?php
                        echo $a->hcPercepcionApetito; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>PERCEPCIÓN APETITO OBSERVACIÓN</strong>
                            <br>
                        <?php
                        echo $a->hcPercepcionApetitoObservacion; ?>
                        </div>
                        <div >
                            <strong>ALIMENTOS PREFERIDOS</strong>
                            <br>
                        <?php
                        echo $a->hcAlimentosPreferidos; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>ALIMENTOS RECHAZADOS</strong>
                            <br>
                        <?php
                        echo $a->hcAlimentosRechazados; ?>
                        </div>
                        <div >
                            <strong>SUPLEMENTOS O COMPLEMENTOS NUTRICIONALES Y/O VITAMÍNICOS</strong>
                            <br>
                        <?php
                        echo $a->hcSuplementoNutricionales; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>¿HA LLEVADO ALGUNA DIETA ESPECIAL?</strong>
                            <br>
                        <?php
                        echo $a->hcDietaEspecial; ?>
                        </div>
                        <div >
                            <strong>DIETA ESPECIAL CUAL</strong>
                            <br>
                        <?php
                        echo $a->hcDietaEspecialCual; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>DESAYUNO HORA</strong>
                            <br>
                        <?php
                        echo $a->hcDesayunoHora; ?>
                        </div>
                        <div >
                            <strong>DESAYUNO HORA OBS</strong>
                            <br>
                        <?php
                        echo $a->hcDesayunoHoraObservacion; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>MEDIA MAÑANA HORA</strong>
                            <br>
                        <?php
                        echo $a->hcMediaMañanaHora; ?>
                        </div>
                        <div >
                            <strong>MEDIA MAÑANA OBS</strong>
                            <br>
                        <?php
                        echo $a->hcMediaMañanaHoraObservacion; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>ALMUERZO HORA</strong>
                            <br>
                        <?php
                        echo $a->hcAlmuerzoHora; ?>
                        </div>
                        <div >
                            <strong>ALMUERZO OBS</strong>
                            <br>
                        <?php
                        echo $a->hcAlmuerzoHoraObservacion; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>MEDIA TARDE HORA</strong>
                            <br>
                        <?php
                        echo $a->hcMediaTardeHora; ?>
                        </div>
                        <div >
                            <strong>MEDIA TARDE OBS</strong>
                            <br>
                        <?php
                        echo $a->hcMediaTardeHoraObservacion; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>CENA HORA</strong>
                            <br>
                        <?php
                        echo $a->hcCenaHora; ?>
                        </div>
                        <div >
                            <strong>CENA OBS</strong>
                            <br>
                        <?php
                        echo $a->hcCenaHoraObservacion; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>REFRIGERIO NOCTURNO HORA</strong>
                           <br>
                        <?php
                        echo $a->hcRefrigerioNocturnoHora; ?>
                        </div>
                        <div >
                            <strong>REFRIGERIO NOCTURNO OBS</strong>
                            <br>
                        <?php
                        echo $a->hcRefrigerioNocturnoHoraObservacion; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>PESO KG</strong>
                            <br>
                        <?=
                         $dato_historia[0]->hcPeso; ?>
                        </div>
                        <div >
                            <strong>TALLA CM</strong>
                           <br>
                        <?=
                         $dato_historia[0]->hcTalla; ?>
                        </div>
                    </div>

                    <div >

                        <div >
                            <strong>IMC</strong>
                            <br>
                        <?=
                         $dato_historia[0]->hcIMC; ?>
                        </div>
                        <div >
                            <strong>PERIMETRO ABDOMINAL</strong>
                            <br>
                        <?=
                         $dato_historia[0]->hcPerimetroAbdominal; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>CLASIFICACIÓN ESTADO NUTRICIONAL</strong>
                            <br>
                        <?=
                        $dato_historia[0]->hcClasificacion; ?>
                        </div>
                        <div >
                            <strong>PESO IDEAL</strong>
                            <br>
                        <?php
                        echo $a->hcPesoIdeal; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>INTERPRETACIÓN</strong>
                            <br>
                        <?php
                        echo $a->hcInterpretacion; ?>
                        </div>
                        <div >
                            <strong>META A MESES</strong>
                            <br>
                        <?php
                        echo $a->hcMetaMeses; ?>
                        </div>
                    </div>
                    <div >
                        <div >
                            <strong>ANÁLISIS NUTRICIONAL</strong>
                            <br>
                        <?php
                        echo $a->hcAnalisisNutricional; ?>
                        </div>
						</div>
					<div >
                        <div >
                            <strong>PLAN A SEGUIR</strong>
                            <br>
                        <?php
                        echo $a->hcPlanSeguir; ?>
                        </div>
                    </div>
                </div>
            </fieldset>
            <?php } ?> <br>
        <!--fieldset>
           <legend>MEDICAMENTO</legend>
           <div style="margin: 10px;">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered" id="data">
                        <thead>
                            <th>MEDICAMENTO</th>
                            <th>CANTIDAD</th>
                            <th>DOSIS</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($medicamento_historia as $mh) {

                                echo "<tr>";
                                echo "<td>" . $mh->medNombre . "</td>";
                                echo "<td>" . $mh->hisMedCantidad . "</td>";
                                echo "<td>" . $mh->hisMedDosis . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </fieldset><br-->
        <fieldset>
            <legend>REMISIÓN</legend>
            <div style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO REMISION</center>
                                    </th>
                                </tr>
                                <th>CÓDIGO</th>
                                <th>NOMBRE</th>
                                <th>OBSERVACIÓN</th>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($remision_historia as $dh) {

                                    echo "<tr>";
                                    echo "<td>" . $dh->remCodigo . "</td>";
                                    echo "<td>" . $dh->remNombre . "</td>";
                                    echo "<td>" . $dh->remObservacion . "</td>";
                                    echo "</tr>";
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </fieldset><br>
        <fieldset>
            <legend>AYUDA DIAGNOSTICAS</legend>
            <div style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO AYUDA DIAGNOSTICAS</center>
                                    </th>
                                </tr>
                                <th>CÓDIGO</th>
                                <th>CUPS</th>
                                <th>OBSERVACIÓN</th>
                            </thead>
                            <tbody>

                                
                                <?php
                                foreach ($cups_historia as $ch) {

                                    echo "<tr>";
                                    echo "<td>" . $ch->cupCodigo . "</td>";
                                    echo "<td>" . $ch->cupNombre . "</td>";
                                    echo "<td>" . $ch->cupObservacion . "</td>";
                                    echo "</tr>";
                                }
                                ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </fieldset><br>
        <fieldset>
            <legend>MEDICAMENTO</legend>
            <div style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO MEDICAMENTO</center>
                                    </th>
                                </tr>
                                <th>MEDICAMENTO</th>
                                <th>DOSIS</th>
                                <th>CANTIDAD</th>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($medicamento_historia as $dh) {

                                    echo "<tr>";
                                    echo "<td>" . $dh->medNombre . "</td>";
                                    echo "<td>" . $dh->hisMedDosis . "</td>";
                                    echo "<td>" . $dh->hisMedCantidad . "</td>";
                                    echo "</tr>";
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </fieldset><br>
        <fieldset>
            <legend>DIAGNÓSTICO</legend>
            <div style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO DIAGNOSTICA</center>
                                    </th>
                                </tr>
                                <th>#</th>
                                <th>CÓDIGO</th>
                                <th>DIAGNÓSTICO</th>
                                <th>CLASIFICACIÓN</th>
                                <th>TIPO</th>
                            </thead>
                            <tbody>

                                <?php
                                $num = 1;
                                foreach ($diagnostico_historia as $dh) {

                                    echo "<tr>";
                                    echo "<td>" . $num++ . "</td>";
                                    echo "<td>" . $dh->diaCodigo . "</td>";
                                    echo "<td>" . $dh->diaNombre . "</td>";
                                    echo "<td>" . $dh->his_dia_tipo . "</td>";
                                    echo "<td>" . $dh->hcTipoDiagnostico . "</td>";
                                    echo "</tr>";
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </fieldset><br>
         <div style="border: ridge #0f0fef 1px;">
                <div  style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>NOTA ADICIONAL: </strong>
                        <?php echo $h->hcAdicional; ?>
                    </div>
                </div>
            </div><br>
        <div style="border: ridge #0f0fef 1px;">
            <div  class="caja13">
                <div >
                    <strong>PROFESIONAL QUE ATIENDE</strong><br>
                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br> <?= $h->proNombre; ?> <br>RM:<br><?= $h->usuRegistroProfesional; ?><br>Firma Digital:<br> <?php echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?> </em>
                </div>
                <div >
                    <strong>FIRMA PACIENTE</strong><br>
                    <em><?= "CC - " . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                </div>
            </div>
        </div>

    <?php } ?>

</div>

<script type="text/javascript">

    window.print();
    window.onmousemove = function() {
      window.close();
  }

</script>
<style type="text/css">

@media all {
    div.saltopagina {
        display: none;
    }
}

@media print {
    div.saltopagina {
        display: block;
        page-break-before: always;
    }
}

fieldset {
    border: 1px ridge #0f0fef;
    /* Borde */
}

legend {
    text-align: left;
    /* Puedes cambiarlo por center o right */
    width: inherit;
    /* Or auto */
    padding: 0 10px;
    /* To give a bit of padding on the left and right */
    border-bottom: none;
    font-size: 16px;
}
.caja1 {
    display: flex;
    flex-direction: column;
    padding: 20px;
    margin-bottom: 1px;
    text-align: center  ;
}
.caja2 {
    display: flex;
   justify-content: space-around;
   margin-bottom: 5px;
}
.caja3 {
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
 
   
}
.caja12 {
    display: flex;
    flex-wrap: wrap; /* Permite que los elementos se envuelvan a la siguiente línea si es necesario */
    margin-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
}

.caja12 > * {
    flex: 1 1 50%; /* Cada elemento ocupa el 50% del ancho del contenedor */
    box-sizing: border-box; /* Incluye padding y border en el tamaño del elemento */
    padding: 5px; /* Opcional, para agregar espacio entre los elementos */
}


.caja13 {
    display: flex;
    justify-content: space-around;
    margin-bottom: 5px;
    margin-top: 15px;
    padding-left: 50px;
    padding-right: 50px;
    text-align: center  ;
 
   
}
.caja4 {
text-align: justify;
width: 500px;

}
.body {
    background-color: white;
}
.h_clinica {
    
    display: flex;
    justify-content: space-between;
   padding-left: 10px;
   padding-right: 10px;

}
.h1_clinica{
    padding: 10px;
}
.h2_clinica {
    display: flex;
    justify-content: space-between;
   padding-left: 10px;
   padding-right: 10px;
   gap: -20px;
}
.tr {
    text-align: justify;
}
</style>