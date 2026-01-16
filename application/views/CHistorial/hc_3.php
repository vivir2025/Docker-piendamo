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
            <small class="texts"> PSICOLOGÍA CLÍNICA APERTURA PROGRAMA DE GESTIÓN DEL RIESGO <br> CARDIORENAL</small>
            <small class="texts"><?= $dato_historia[0]->citFecha ?></small>
        </div>
        <div >
        <img class="img" src="<?= base_url("assets/img/logo.png"); ?>" >
        </div>
        </div>
        </div>
        <br>


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
<?php foreach ($antecedentes_personales as $hap) { ?>

            <fieldset>
                <legend>HISTORIA CLÍNICA</legend>
                <div class="caja12">
                    <div >
                        <div class="form-group col-md-6">
                            <strong>1. MOTIVO CONSULTA</strong><br>
                            <?php
                            echo $hap->hcMotivoConsulta; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>2. ESTRUCTURA FAMILIAR (FAMILIARES O PERSONAS CON LAS QUE CONVIVE EL PACIENTE)</strong><br>
                            <?php
                            echo $hap->hcEstructuraFamiliar; ?>
                        </div>
                    
                        <div class="form-group col-md-6">
                            <strong>3. RED DE APOYO FAMILIAR QUE CONSIDERA EL PACIENTE (FAMILIAR O FAMILIARES A LOS QUE EL PACIENTE CONSIDERE COMO SU RED DE APOYO)</strong><br>
                            <?php
                            echo $hap->hcPsicologiaRedApoyo; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>4. COMPORTAMIENTO EN CONSULTA</strong><br>
                            <?php
                            echo $hap->hcPsicologiaComportamientoConsulta; ?>
                        </div>
                    </div>
                    <div >
                        <div class="form-group col-md-6">
                            <strong>5. TRATAMIENTO ACTUAL Y ADHERENCIA (DESCRIPCIÓN DEL PACIENTE SOBRE EL TRATAMIENTO Y LA ADHERENCIA AL MISMO)</strong><br>
                             <?php
                            echo $hap->hcPsicologiaTratamientoActualAdherencia; ?>
                        </div>
                        <div class="form-group col-md-6">
                            <strong>6. DESCRIPCIÓN DEL PROBLEMA (DESCRIPCIÓN DEL PACIENTE DE LA SITUACIÓN QUE LO AFECTA)</strong><br>
                            <?php
                            echo $hap->hcPsicologiaDescripcionProblema; ?>
                        </div>
                  
                        <div class="form-group col-md-6">
                            <strong>7. ANÁLISIS Y CONCLUSIONES</strong><br>
                            <?php
                            echo $hap->hcAnalisisConclusiones; ?>
                        </div>
                         <div class="form-group col-md-6">
                            <strong>8. PLAN DE INTERVENCIÓN Y RECOMENDACIONES</strong><br>
                            <?php
                            echo $hap->hcPsicologiaPlanIntervencionRecomendacion; ?>
                        </div>
                    </div>
                </div>
            </fieldset>
            <?php } ?> <br>

        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-12">
                    <strong>FINALIDAD: </strong>
                    <?php
                    echo $h->finalidad_idFinalidad; ?>
                </div>
            </div>
        </div><br>
        <!--fieldset>
            <legend>REMISION</legend>
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
                                <th>CODIGO</th>
                                <th>NOMBRE</th>
                                <th>OBSERVACION</th>
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
        </fieldset><br-->
        <fieldset>
            <legend>DIAGNÓSTICO</legend>
            <div style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO DIAGNOSTICA <?php echo date("Y-m-d", time()); ?></center>
                                    </th>
                                </tr>
                                <th>CÓDIGO</th>
								<th>DIAGNÓSTICO</th>
								<th>CLASIFICACIÓN</th>
								<th>TIPO</th>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($diagnostico_historia as $dh) {

                                    echo "<tr>";
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
                    <div class="form-group col-md-6">
                        <strong>CAUSA EXTERNA: </strong>
                        <?php echo $h->hcCausaExterna; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>
         <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>NOTA ADICIONAL: </strong>
                        <?php echo $h->hcAdicional; ?>
                    </div>
                </div>
            </div><br>
        <div style="border: ridge #0f0fef 1px;">
            <div class="caja13" >
                <div class="form-group col-md-6">
                  <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br> <?= $h->proNombre; ?><br>RM: <?= $h->usuRegistroProfesional; ?> </em>
                    </div>
                <div class="form-group col-md-6">
                    <strong>FIRMA PACIENTE</strong><br>
                    <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
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
    justify-content: space-between;
    margin-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
 
   
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