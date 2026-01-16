<!-- This view is ready to view stories based on document number and everything related to the story -->
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/css/medi.css"); ?>">
</head>
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
</style>
<body>
    
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
    <small class="texts"> CONTROL PROGRAMA DE GESTIÓN DEL RIESGO CARDIO RENAL</small>
    <small class="texts"><?= $dato_historia[0]->citFecha ?></small>
  </div>
  <div >
  <img class="img" src="<?= base_url("assets/img/logo.png"); ?>" >
  </div>
  </div>
</div>
<br><br>

<div >
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

        </fieldset><br>
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

        </fieldset><br>


        <fieldset>
            <legend>HISTORIA CLÍNICA</legend>

            <div class="h_clinica">
                <div >
                    <div >
                        <strong>PRESIÓN ARTERIAL SISTÓLICA: </strong>
                        <?php echo $h->hcPresionArterialSistolicaSentadoPie; ?>
                    </div>
                    <div >
                        <strong>PRESIÓN ARTERIAL DIASTÓLICA: </strong>
                        <?php echo $h->hcPresionArterialDistolicaSentadoPie; ?>
                    </div>
              
                
                    <div >
                        <strong>FRECUENCIA CARDIACA: </strong>
                        <?php echo $h->hcFrecuenciaCardiaca; ?>
                    </div>
                    <div >
                        <strong>FRECUENCIA RESPIRATORIA: </strong>
                        <?php echo $h->hcFrecuenciaRespiratoria; ?>
                    </div>
              
            
                    <div >
                        <strong>PERIMETRO ABDOMINAL: </strong>
                        <?php echo $h->hcPerimetroAbdominal; ?>
                    </div>
                    <div >
                        <strong>INSULINO REQUIRIENTE: </strong>
                        <?php echo $h->insulina_requiriente; ?>

                    </div>
                </div>
              <!-- hasta aqui llega la primera caja con 6 campos con flex -->
                <div >
                    <div >
                        <strong>PESO KG: </strong>
                        <?php echo $h->hcPeso; ?>
                    </div>
                    <div >
                        <strong>TALLA CM: </strong>
                        <?php echo $h->hcTalla; ?>
                    </div>
              
             
                    <div >
                        <strong>IMC: </strong>
                        <?php echo $h->hcIMC; ?>
                    </div>
                    <div >
                        <strong>CLASIFICACIÓN: </strong>
                        <?php echo $h->hcClasificacion; ?>
                    </div>
              
          

                    <div >
                        <strong>TASA DE FILTRACIÓN GLOMERULAR CKD-EPI: </strong>
                        <?php echo $h->tasa_filtracion_glomerular_ckd_epi; ?>

                    </div>
                    <div >
                        <strong>TASA DE FILTRACIÓN GLOMERULAR Cockcroft-Gault: </strong>
                        <?php echo $h->tasa_filtracion_glomerular_gockcroft_gault; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>

        <fieldset>
            <legend>EXAMEN FÍSICO POR SISTEMA</legend>

            <div class="h_clinica" >
               <div class="h1_clinica">
                    <div >
                        <strong>CABEZA: </strong>
                        <?php echo $h->hcEfCabeza; ?>

                    </div>
                    <div >
                        <strong>OJOS (AGUDEZA VISUAL): </strong>
                        <?php echo $h->hcAgudezaVisual; ?>
                    </div>
            
             
                    <div >
                        <strong>OÍDOS: </strong>
                        <?php echo $h->hcOidos; ?>
                    </div>
                    <div >
                        <strong>NARIZ Y SENOS PARANASALES: </strong>
                        <?php echo $h->hcNarizSenosParanasales; ?>
                    </div>
               
               
                    <div >
                        <strong>CAVIDAD ORAL: </strong>
                        <?php echo $h->hcCavidadOral; ?>
                    </div>
                    <div >
                        <strong>CUELLO: </strong>
                        <?php echo $h->hcCuello; ?>
                    </div>
              
                    <div >
                        <strong>CARDIO RESPIRATORIO: </strong>
                        <?php echo $h->hcCardioRespiratorio; ?>
                    </div>
                    <div >
                        <strong>MAMAS: </strong>
                        <?php echo $h->hcMamas; ?>
                    </div>
               
                    <div >
                        <strong>GASTROINTESTINAL: </strong>
                        <?php echo $h->hcGastrointestinal; ?>
                    </div>
               
                    <div >
                        <strong>GENITO URINARIO: </strong>
                        <?php echo $h->hcGenitoUrinario; ?>

                    </div>
           </div>
           <div class="h1_clinica">
                    <div >
                        <strong>MÚSCULO ESQUELÉTICO: </strong>
                        <?php echo $h->hcMusculoEsqueletico; ?>
                    </div>
                
                    <div >
                        <strong>PIEL Y ANEXOS PULSOS: </strong>
                        <?php echo $h->hcPielAnexosPulsos; ?>
                    </div>
                    <div >
                        <strong>INSPECCIÓN Y SENSIBILIDAD EN PIES: </strong>
                        <?php echo $h->hcInspeccionSensibilidadPies; ?>

                    </div>
                
                    <div >
                        <strong>NERVIOSO: </strong>
                        <?php echo $h->hcSistemaNervioso; ?>
                    </div>
                    <div >
                        <strong>CAPACIDAD COGNITIVA, ORIENTACIÓN: </strong>
                        <?php echo $h->hcCapacidadCongnitivaOrientacion; ?>
                    </div>
               
                    <div >
                        <strong>REFLEJO AQUILIAR: </strong>
                        <?php echo $h->hcReflejoAquiliar; ?>
                    </div>

                    <div >
                        <strong>REFLEJO PATELAR: </strong>
                        <?php echo $h->hcReflejoPatelar; ?>
                    </div>
               
                    <div >
                        <strong>LESIÓN DE ÓRGANO BLANCO: </strong>
                        <?php echo $h->hcLesionOrganoBlanco; ?>
                    </div>
                    <div >
                        <strong>ANT DISLIPIDEMIA FAMILIAR: </strong>
                        <?php echo $h->hcDislipidemia; ?>
                    </div>
                </div>
            </div>
            </fieldset><br>
            <fieldset>
                <legend>EXAMENES</legend>
                
                    <div class="caja2">
                        <div >
                            <strong>ELECTROCARDIOGRAMA</strong><br>
                            <?php
                            echo $h->hcElectrocardiograma; ?>
                        </div>
                        <div >
                            <strong>ECOCARDIOGRAMA</strong><br>
                            <?php
                            echo $h->hcEcocardiograma; ?>
                        </div>
                        <div >
                            <strong>ECOGRAFIA RENAL</strong><br>
                            <?php
                            echo $h->hcEcografiaRenal; ?>
                        </div>
                    </div>
               
            </fieldset><br>
              <fieldset>
                    <legend>REVISIÓN POR SISTEMA</legend>
                    <div class="h2_clinica" >
                       <div>
                            <div >
                                <strong>GENERAL: </strong>
                                <?php
                                echo $h->hcGeneral; ?>
                            </div>
                            <div >
                                <strong>CABEZA: </strong>
                                <?php
                                echo $h->hcCabeza; ?>
                            </div>

                       

                    

                            <div >
                                <strong>RESPIRATORIO: </strong>
                                <?php
                                echo $h->hcRespiratorio; ?>
                            </div>

                            <div >
                                <strong>CARDIOVASCULAR: </strong>
                                <?php
                                echo $h->hcCardiovascular; ?>
                            </div>
                            <div >
                            <strong>CLASIFICACIÓN ERC CATEGORÍA DE ALBUMINURIA PERSISTENTE:</strong>
                            <?php echo $h->hcClasificacionErcCategoriaAmbulatoriaPersistente; ?>
                        </div>

                     </div>
                     <div >
                            <div >
                                <strong>GASTROINTESTINAL: </strong>
                                <?php
                                echo $h->hcGastrointestinal; ?>
                            </div>

                            <div >
                                <strong>OSTEOATROMUSCULAR: </strong>
                                <?php
                                echo $h->hcOsteoatromuscular; ?>
                            </div>

                        

                            <div >
                                <strong>SISTEMA NERVIOSO CENTRAL: </strong>
                                <?php
                                echo $h->hcSnc; ?>
                            </div>
                        </div>
                    </div>
                </fieldset><br>

            <fieldset>
                <legend>CLASIFICACIÓN</legend>

                <div class="h2_clinica" >
                <div >				
						<div >
                        <strong>HIPERTENSIÓN ARTERIAL: </strong>
                        <?php echo $h->hcHipertensionArterialPersonal; ?>
						</div>

						<div >
                            <strong>CLASIFICACIÓN HTA: </strong>
                            <?php echo $h->hcClasificacionHta; ?>
                        </div>
			
				
					 <div >
                        <strong>DIABETES MELLITUS:</strong>
                        <?php echo $h->hcDiabetesMellitusPersonal; ?>
                    </div>
					 <div >
                            <strong>CLASIFICACIÓN DM: </strong>
                            <?php echo $h->hcClasificacionDm; ?>
                      </div>
                 </div>
                 <div >
                        <div >
                            <strong>CLASIFICACIÓN ERC ESTADO: </strong>
                            <?php echo $h->hcClasificacionErcEstado; ?>
                        </div>
                       
               
                        <div >
                            <strong>CLASIFICACIÓN RCV: </strong>
                            <?php echo $h->hcClasificacionRcv; ?>
                        </div>
                            <div >
                                <strong>CLASIFICACIÓN ESTADO METABÓLICO: </strong>
                                <?php
                                echo $h->hcClasificacionEstadoMetabolico; ?>

                            </div>
                  </div>
                        
				</div>
                </fieldset><br>

                <fieldset>
                    <legend>EDUCACIÓN</legend>

                    <div class="h2_clinica">
                        <div>
                            <div >
                                <strong>ALIMENTACIÓN: </strong>
                                <?php echo $h->hcAlimentacion; ?>

                            </div>
                            <div >
                                <strong>FOMENTO DE ACTIVIDAD FÍSICA: </strong>
                                <?php echo $h->hcFomentoActividadFisica; ?>
                            </div>
                        
                            <div >
                                <strong>IMPORTANCIA DE ADHERENCIA A TRATAMIENTO: </strong>
                                <?php echo $h->hcOmportanciaAdherenciaTratamiento; ?>
                            </div>
                        
                            <div >
                                <strong>DISMINUCIÓN DE CONSUMO DE SAL/AZÚCAR: </strong>
                                <?php echo $h->hcDisminucionConsumoSalAzucar; ?>
                            </div>
                        </div>
                        <div >
                            <div >
                                <strong>DISMINUCION DE CONSUMO CIGARRILLO: </strong>
                                <?php echo $h->hcDisminucionConsumoCigarrillo; ?>
                            </div>
                      
                            <div >
                                <strong>DISMINUCIÓN DE PESO: </strong>
                                <?php echo $h->hcDisminucionPeso; ?>

                            </div>
                            <div >
                                <strong>CONSUMO DE FRUTAS Y VERDURAS: </strong>
                                <?php echo $h->hcConsumoFrutasVerduras; ?>
                            </div>
                     </div>

                       
            
                </div>
            </fieldset><br>

            <fieldset>
                <legend>ADHERENCIA FARMACOLÓGICA VALORACIÓN TEST DE MORISKY</legend>
                <div class="h2_clinica" >
                    <div>
                    <div >
                            <strong>CUANDO SE ENCUENTRA BIEN ¿DEJA DE TOMAR SUS MEDICAMENTOS?: </strong>
                            <?php echo $h->hcCuandoEstaBienDejaTomarMedicamentos; ?>
                        </div>


                        <div >
                            <strong>CUANDO SE ENCUENTRA MAL ¿DEJA DE TOMAR SUS MEDICAMENTOS?: </strong>
                            <?php echo $h->hcSienteMalDejaTomarlos; ?>
                        </div>  
                 </div>
                 <div >
                      

                        <div >
                            <strong>OLVIDA ALGUNA VEZ TOMAR SUS MEDICAMENTOS: </strong>
                            <?php echo $h->hcOlvidaTomarMedicamentos; ?>
                        </div>
                        <div >
                            <strong>TOMA LOS MEDICAMENTOS A LA HORA INDICADA</strong>
                            <?php echo $h->hcTomaMedicamentosHoraIndicada; ?>

                        </div>
                   </div>
                </div>
            </fieldset><br>
            <div style="border: ridge #0f0fef 1px;">
                <div  style="margin: 10px;">
                    <div class="tr" >
                        <strong>OTRAS OBSERVACIONES</strong><br>
                        <?php echo $h->hcObservacionesGenerales; ?>
                    </div>
                </div>
            </div><br>
            <div style="border: ridge #0f0fef 1px;">
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>FINALIDAD: </strong>
                        <?php echo $h->finalidad_idFinalidad; ?>
                    </div>
                </div>
            </div><br>
            <fieldset>
            <legend>REMISIÓN</legend>
            <div style="margin: 10px;">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO REMISIÓN</center>
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
                
                <div class="firma" >
                    <div >
                    <div>
                            <?php
                            echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?>
                    </div>
                    <div > <strong >FIRMA DIGITAL</strong> </div>
                    <div> <strong > PROFESIONAL: </strong> <em ><?= $h->usuNombre . " " . $h->usuApellido; ?><br> <?= $h->proNombre; ?><br>RM: <?= $h->usuRegistroProfesional; ?> </em> </div>
                    

                    </div>

                   
               
                        <div class="firma1">
                            <strong>FIRMA PACIENTE: </strong>
                            <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                        </div>
          

        <?php } ?>
    </div>

    <script type="text/javascript">

        window.print();
        window.onmousemove = function() {
          window.close();
      }

  </script>
  </body>
<style>
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
</html>