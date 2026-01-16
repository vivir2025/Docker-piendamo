<!-- This view is ready to view stories based on document number and everything related to the story -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/css/medi.css"); ?>">
</head>
<div class="bg-white">
<div class="mx-auto" style="width: 1300px;">
    <!--h5 style="color: blue;">HISTORIA CLINICA APERTURA PROGRAMA DE GESTION DEL RIESGO CARDIORENAL</h5-->
    <?php foreach ($dato_historia as $h) { ?>
        <div >
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



            <br><br>

      
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

        </fieldset>
        <br>

        <fieldset>
            <legend>ANTECEDENTES</legend>
            <div >

                <div class="caja2">
                    <div >
                        <strong>DISCAPACIDAD FÍSICA</strong><br>
                        <?php
                        echo $h->hcDiscapacidadFisica; ?>

                    </div>
                    <div >
                        <strong>DISCAPACIDAD VISUAL</strong><br>
                        <?php
                        echo $h->hcDiscapacidadVisual; ?>

                    </div>


                    <div >
                        <strong>DISCAPACIDAD MENTAL</strong><br>
                        <?php
                        echo $h->hcDiscapacidadMental; ?>

                    </div>
                    <div >
                        <strong>DISCAPACIDAD AUDITIVA</strong><br>
                        <?php
                        echo $h->hcDiscapacidadAuditiva; ?>

                    </div>

                    <div >
                        <strong>DISCAPACIDAD INTELECTUAL</strong><br>
                        <?php
                        echo $h->hcDiscapacidadIntelectual; ?>

                    </div>
                </div>

            </div>
        </fieldset><br>

        <div style="border: ridge #0f0fef 1px;">
            <div class="caja2" >
                <div >
                    <strong>DROGODEPENDIENTE?</strong>
                    <br>
                    <?php
                    echo $h->hcDrogoDependiente; ?>
                </div>
                <div >
                    <strong>DROGODEPENDIENTE CUAL</strong>
                    <br>
                    <?php
                    echo $h->hcDrogoDependienteCual; ?>
                </div>
            </div>
        </div><br>

        <div style="border: ridge #0f0fef 1px;">
        <div class="caja1" >
            <div class="caja2" >
                <div >
                    <strong>PESO KG</strong>
                    <br>
                    <?php
                    echo $h->hcPeso; ?>
                </div>
                <div >
                    <strong>TALLA CM</strong>
                    <br>
                    <?php
                    echo $h->hcTalla; ?>
                </div>

                <div >
                    <strong>IMC</strong>
                    <br>
                    <?php
                    echo $h->hcIMC; ?>
                </div>
                <div >
                    <strong>CLASIFICACIÓN</strong>
                    <br>
                    <?php
                    echo $h->hcClasificacion; ?>
                </div>
            </div>
				<div class="caja2">
                    
                    <div >
                        <strong>PERIMETRO ABDOMINAL: </strong>
                        <?php
                        echo $h->hcPerimetroAbdominal; ?>


                    </div>
                    <div >
                        <strong>OBSERVACIONES PERIMETRO ABDOMINAL: </strong>
                        <?php
                        echo $h->hcObsPerimetroAbdominal; ?>

                    </div>
                </div>
            </div>
        </div><br>



        <fieldset>
            <legend>ANTECEDENTES FAMILIARES</legend>
            <div class="caja12" >
                <div >
                    <div >
                        <strong>¿HIPERTENSIÓN ARTERIAL?:</strong>

                        <?php
                        echo $h->hcHipertensionArterial; ?>
                    </div>
                    <div >
                        <strong>PARENTESCO Y DESCRIPCIÓN HIPERTENSIÓN ARTERIAL:</strong>

                        <?php
                        echo $h->hcParentescoHipertension; ?>
                    </div>
               

                    <div >
                        <strong>¿DIABETES MELLITUS?</strong>

                        <?php
                        echo $h->hcDiabetesMellitus; ?>
                    </div>
                    <div >
                        <strong>PARENTESCO Y DESCRIPCIÓN DIABETES MELLITUS:</strong>

                        <?php
                        echo $h->hcParentescoMellitus; ?>
                    </div>
               

                    <div >
                        <strong>¿ARTRITIS?: </strong>

                        <?php
                        echo $h->hcArtritis; ?>
                    </div>
                    <div >
                        <strong>PARENTESCO Y DESCRIPCIÓN ARTRITIS: </strong>

                        <?php
                        echo $h->hcParentescoArtritis; ?>
                    </div>
            
                    <div >
                        <strong>¿ENF. CARDIOVASCULAR?: </strong>

                        <?php
                        echo $h->hcEnfermedadCardiovascular; ?>
                    </div>
                    <div >
                        <strong>PARENTESCO Y DESCRIPCION ENF. CARDIOVASCULAR: </strong>

                        <?php
                        echo $h->hcParentescoCardiovascular; ?>
                    </div>
                

              
                    <div >
                        <strong>ANTECEDENTES METABÓLICOS:</strong>

                        <?php
                        echo $h->hcAntecedenteMetabolico; ?>
                    </div>

                    <div >
                        <strong>PARENTESCO Y DESCRIPCIÓN ANTECEDENTES METABÓLICOS: </strong>

                        <?php
                        echo $h->hcParentescoMetabolico; ?>
                    </div>
                </div>
                <!-- aqui termina y comienza -->
                <div >

                    <div>
                        <strong>CÁNCER (MAMA, ESTÓMAGO, PRÓSTATA, COLON):</strong>

                        <?php
                        echo $h->hcCancerMamaEstomagoProstataColon; ?>
                    </div>
                    <div >
                        <strong>PARENTESCO Y DESCRIPCIÓN CÁNCER:</strong>

                        <?php
                        echo $h->hcParentescoCancer; ?>
                    </div>


                    <div >
                        <strong>LEUCEMIA: </strong>
                        <?php
                        echo $h->hcLucemia; ?>
                    </div>
                    <div >
                        <strong>PARENTESCO Y DESCRIPCIÓN LEUCEMIA: </strong>

                        <?php
                        echo $h->hcParentescoLucemia; ?>
                    </div>
               

                    <div >
                        <strong>VIH: </strong>

                        <?php
                        echo $h->hcVih; ?>
                    </div>

                    <div >
                        <strong>PARENTESCO Y DESCRIPCION VIH:</strong>

                        <?php
                        echo $h->hcParentescoVih; ?>
                    </div>

               

                    <div >
                        <strong>OTROS: </strong>

                        <?php
                        echo $h->hcOtro; ?>
                    </div>
                    <div >
                        <strong>PARENTESCO Y DESCRIPCIÓN OTRO: </strong>

                        <?php
                        echo $h->hcParentescoOtro; ?>
                    </div>
                </div>
            </div>

        </fieldset><br>

        <fieldset>
            <legend>ANTECEDENTES PERSONALES</legend>
            <div class="caja12" >
                
                <div >
                    <div >
                        <strong>ENFERMEDAD CARDIOVASCULAR:</strong>
                        <?php
                        echo $h->hcEnfermedadCardiovascularPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN ENFERMEDAD CARDIOVASCULAR:</strong>
                        <?php
                        echo $h->hcObsPersonalEnfermedadCardiovascular; ?>
                    </div>
              
                    <div >
                        <strong>ENFERMEDAD ARTERIAL PERIFÉRICA: </strong>
                        <?php
                        echo $h->hcArterialPerifericaPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN ARTERIAL PERIFÉRICA:</strong>
                        <?php
                        echo $h->hcObsPersonalArterialPeriferica; ?>
                    </div>
              
                    <div >
                        <strong>ENFERMEDAD CAROTÍDEA:</strong>
                        <?php
                        echo $h->hcCarotideaPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN ENFERMEDAD CAROTÍDEA:</strong>
                        <?php
                        echo $h->hcObsPersonalCarotidea; ?>
                    </div>
               
                    <div >
                        <strong>ANEURISMA AORTA: </strong>
                        <?php
                        echo $h->hcAneurismaAortaPersonal; ?>
                    </div>
                    <div >
                    <strong>OBSERVACIÓN ANEURISMA AORTA:</strong>
                        <?php
                        echo $h->hcObsPersonalAneurismaAorta; ?>
                    </div>
                
                    <div >
                        <strong>SÍNDROME CORONARIO AGUDO-ANGINA: </strong>
                        <?php
                        echo $h->hcSindromeCoronarioAgudoanginaPersonal; ?>
                    </div>
                    <div>
                        <strong>OBSERVACIÓN SÍNDROME CORONARIO:</strong>
                        <?php
                        echo $h->hcObsPersonalSindromeCoronario; ?>
                    </div>
              
                    <div >
                        <strong>ARTRITIS: </strong>
                        <?php
                        echo $h->hcArtritisPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN ARTRITIS: </strong>
                        <?php
                        echo $h->hcObsPersonalArtritis; ?>
                    </div>
               
                    <div >
                        <strong>INFARTO AGUDO MIOCARDIO: </strong>
                        <?php
                        echo $h->hcIamPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN INFARTO AGUDO MIOCARDIO: </strong>
                        <?php
                        echo $h->hcObsPersonalIam; ?>
                    </div>
               
                    <div >
                        <strong>REVASCUL CORONARIA: </strong>
                        <?php
                        echo $h->hcRevasculCoronariaPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN REVASCULARIZACIÓN:</strong>
                        <?php
                        echo $h->hcObsPersonalRevasculCoronaria; ?>
                    </div>
                </div>
                <!-- aqui termina -->
                <div >
                    <div>
                        <strong>INSUFICIENCIA CARDIACA: </strong>
                        <?php
                        echo $h->hcInsuficienciaCardiacaPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN INSUFICIENCIA CARDIACA:</strong>
                        <?php
                        echo $h->hcObsPersonalInsuficienciaCardiaca; ?>
                    </div>
                
                    <div >
                        <strong>AMPUTACIÓN PIE DIABÉTICO: </strong>
                        <?php
                        echo $h->hcAmputacionPieDiabeticoPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN AMPUTACIÓN PIE DIABÉTICO: </strong>
                        <?php
                        echo $h->hcObsPersonalAmputacionPieDiabetico; ?>
                    </div>
              
                    <div >
                        <strong>ENFERMEDAD PULMONARES (TB-TB-MDR) OTRAS: </strong>
                        <?php
                        echo $h->hcEnfermedadPulmonarPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN ENFERMEDAD PULMONAR: </strong>
                        <?php
                        echo $h->hcObsPersonalEnfermedadPulmonar; ?>
                    </div>
               
                    <div >
                        <strong>VÍCTIMA DE MALTRATO/VIOLENCIA SEXUAL: </strong>
                        <?php
                        echo $h->hcVictimaMaltratoPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN VÍCTIMA SEXUAL: </strong>
                        <?php
                        echo $h->hcObsPersonalMaltratoPersonal; ?>
                    </div>
                
                    <div>
                        <strong>ANTECEDENTES QUIRÚRGICOS:</strong>
                        <?php
                        echo $h->hcAntecedentesQuirurgicos; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN ANTECEDENTES QUIRÚRGICOS:</strong>
                        <?php
                        echo $h->hcObsPersonalAntecedentesQuirurgicos; ?>
                    </div>
              
                    <div >
                        <strong>ACANTOSIS NIGRICANS: </strong>
                        <?php
                        echo $h->hcAcontosisPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN ACANTOSIS NIGRICANS:</strong>
                        <?php
                        echo $h->hcObsPerrsonalAcontosis; ?>
                    </div>
                
                    <div >
                        <strong>OTROS: </strong>
                        <?php
                        echo $h->hcOtroPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN OTROS: </strong>
                        <?php
                        echo $h->hcObsPersonalOtro; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>

        <fieldset>
            <legend>TEST MORISKY</legend>

            <div class="caja12">
                <div >
                    <div >
                        <strong>OLVIDA ALGUNA VEZ TOMAR SUS MEDICAMENTOS: </strong>
                        <?php
                        echo $h->hcOlvidaTomarMedicamentos; ?>
                    </div>
                    <div >
                        <strong>TOMAR LOS MEDICAMENTOS A LA HORA INDICADA: </strong>
                        <?php
                        echo $h->hcTomaMedicamentosHoraIndicada; ?>
                    </div>
               
                    <div >
                        <strong>CUANDO SE ENCUENTRA BIEN ¿DEJA DE TOMAR SUS MEDICAMENTOS?: </strong>
                        <?php
                        echo $h->hcCuandoEstaBienDejaTomarMedicamentos; ?>
                    </div>
                </div>
                <div>

                    <div >
                        <strong>SI ALGUNA VEZ SE SIENTE MAL ¿DEJA DE TOMARLOS?: </strong>
                        <?php
                        echo $h->hcSienteMalDejaTomarlos; ?>
                    </div>
               

                    <div >
                        <strong>VALORACIÓN POR PSICOLOGÍA:</strong>
                        <?php
                        echo $h->hcValoracionPsicologia; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>
        <fieldset>
            <legend>OTROS TRATAMIENTOS</legend>

            <div style="margin: 10px;">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>RECIBE TRATAMIENTO ALTERNATIVO?: </strong>
                        <?php
                        echo $h->hcRecibeTratamientoAlternativo; ?>
                    </div>
                    <div class="form-group col-md-6">
                        <strong>¿RECIBE TRATAMIENTO CON PLANTAS MEDICINALES?:</strong>
                        <?php
                        echo $h->hcRecibeTratamientoConPlantasMedicinales; ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>¿RECIBE O REALIZA RITUALIDAD POR MEDICINA TRADICIONAL?:</strong>
                        <?php
                        echo $h->hcRecibeRitualMedicinaTradicional; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>

        <fieldset>
            <legend>REVISIÓN POR SISTEMA</legend>
            <div class="caja12">
                <div >
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

                </div>

                <div >
                    <div >
                        <strong>GASTROINTESTINAL: </strong>
                        <?php
                        echo $h->hcGastrointestinal; ?>
                    </div>

                    <div>
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
            <legend>EXAMEN FÍSICO</legend>

            <div class="caja12" >
                <div >
                    <div >
                        <strong>PRESIÓN ARTERIAL SISTÓLICA: </strong>
                        <?php
                        echo $h->hcPresionArterialSistolicaSentadoPie; ?>

                    </div>
                    <div >
                        <strong>PRESION ARTERIAL DISTOLICA: </strong>
                        <?php
                        echo $h->hcPresionArterialDistolicaSentadoPie; ?>
                    </div>
              
                    <div >
                        <strong>FRECUENCIA CARDIACA: </strong>
                        <?php
                        echo $h->hcFrecuenciaCardiaca; ?>

                    </div>
                    <div >
                        <strong>FRECUENCIA RESPIRATORIA: </strong>
                        <?php
                        echo $h->hcFrecuenciaRespiratoria; ?>

                    </div>
              
                    <div >
                        <strong>CABEZA: </strong>
                        <?php
                        echo $h->hcEfCabeza; ?>

                    </div>
                    <div >
                        <strong>OBSERVACIONES CABEZA: </strong>
                        <?php
                        echo $h->hcObsCabeza; ?>
                    </div>
               
                    <div >
                        <strong>AGUDEZA VISUAL: </strong>
                        <?php
                        echo $h->hcAgudezaVisual; ?>

                    </div>
                    <div >
                        <strong>OBSERVACIONES AGUDEZA VISUAL: </strong>
                        <?php
                        echo $h->hcObsAgudezaVisual; ?>

                    </div>
               
                    <div >
                        <strong>CUELLO: </strong>
                        <?php
                        echo $h->hcCuello; ?>


                    </div>
                    <div >
                        <strong>OBSERVACIONES CUELLO: </strong>
                        <?php
                        echo $h->hcObsCuello; ?>
                    </div>
               
                    <div >
                        <strong>TORAX: </strong>
                        <?php
                        echo $h->hcTorax; ?>


                    </div>
                    <div >
                        <strong>OBSERVACIONES TÓRAX:</strong>
                        <?php
                        echo $h->hcObsTorax; ?>
                    </div>
             
                    <div >
                        <strong>MAMAS: </strong>
                        <?php
                        echo $h->hcMamas; ?>


                    </div>
                    <div >
                        <strong>OBSERVACIONES MAMAS: </strong>
                        <?php
                        echo $h->hcObsMamas; ?>

                    </div>
                
                    <div >
                        <strong>ABDOMEN: </strong>
                        <?php
                        echo $h->hcAbdomen; ?>


                    </div>
                    <div >
                        <strong>OBSERVACIONES ABDOMEN: </strong>
                        <?php
                        echo $h->hcObsAbdomen; ?>

                    </div>
                </div>
                <!-- Aqui termina -->
                <div >
                    <div >
                        <strong>GENITO URINARIO: </strong>
                        <?php
                        echo $h->hcGenitoUrinario; ?>


                    </div>
                    <div >
                        <strong>OBSERVACIONES GENITO URINARIO: </strong>
                        <?php
                        echo $h->hcObsGenitoUrinario; ?>

                    </div>
              
                    <div >
                        <strong>EXTREMIDADES: </strong>
                        <?php
                        echo $h->hcExtremidades; ?>

                    </div>
                    <div >
                        <strong>OBSERVACIONES EXTREMIDADES: </strong>
                        <?php
                        echo $h->hcObsExtremidades; ?>
                    </div>
               
                    <div >
                        <strong>PIEL Y ANEXOS PULSOS: </strong>
                        <?php
                        echo $h->hcPielAnexosPulsos; ?>

                    </div>
                    <div >
                        <strong>OBSERVACIONES PIEL Y ANEXOS PULSOS: </strong>
                        <?php
                        echo $h->hcObsPielAnexosPulsos; ?>
                    </div>
               
                    <div >
                        <strong>SISTEMA NERVIOSO: </strong>
                        <?php
                        echo $h->hcSistemaNervioso; ?>

                    </div>
                    <div >
                        <strong>OBSERVACIONES SISTEMA NERVIOSO: </strong>
                        <?php
                        echo $h->hcObsSistemaNervioso; ?>

                    </div>
              
                    <div >
                        <strong>ORIENTACIÓN: </strong>
                        <?php
                        echo $h->hcOrientacion; ?>


                    </div>
                    <div >
                        <strong>OBSERVACIONES ORIENTACIÓN:</strong>
                        <?php
                        echo $h->hcObsOrientacion; ?>

                    </div>
               
                    <div >
                        <strong>HALLAZGOS POSITIVOS AL EXAMEN FISICO: </strong>
                        <?php
                        echo $h->hcHallazgoPositivoExamenFisico; ?>

                    </div>
                </div>
            </div>
        </fieldset><br>
        <fieldset>
            <legend>FACTORES DE RIESGO</legend>

            <div class="caja12">
                <div>
                    <div >
                        <strong>NÚMERO DE PORCIONES DE FRUTAS Y VERDURAS DIARIAS:</strong>
                        <?php
                        echo $h->hcNumeroFrutasDiarias; ?>
                    </div>
                    <div >
                        <strong>ELEVADO CONSUMO DE GRASAS SATURADAS: </strong>
                        <?php
                        echo $h->hcElevadoConsumoGrasaSaturada; ?>
                    </div>
               
                    <div >
                        <strong>ADICIONA SAL DESPUÉS DE PREPARADOS LOS ALIMENTOS:</strong>
                        <?php
                        echo $h->hcAdicionaSalDespuesPrepararComida; ?>
                    </div>
                    <div >
                        <strong>DISLIPIDEMIA: </strong>
                        <?php
                        echo $h->hcDislipidemia; ?>
                    </div>

                </div>

                <div >
                    <div >
                        <strong>CONDICIÓN CLÍNICA ASOCIADA:</strong>
                        <?php
                        echo $h->hcCondicionClinicaAsociada; ?>

                    </div>
                    <div >
                        <strong>LESIÓN DE ÓRGANO BLANCO:</strong>
                        <?php
                        echo $h->hcLesionOrganoBlanco; ?>

                    </div>
                    <?php if ($h->hcDescripcionLesionOrganoBlanco == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN LESIÓN DE ÓRGANO BLANCO:</strong>
                            <?php
                            echo $h->hcDescripcionLesionOrganoBlanco; ?>

                        </div>
                    <?php  } ?>
                </div>
            </div>
        </fieldset><br>
        <fieldset>
            <legend>EXÁMENES</legend>
            <div >
                <div class="caja12" >
                    <div>
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
                        <strong>ECOGRAFÍA RENAL</strong><br>
                        <?php
                        echo $h->hcEcografiaRenal; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>

        <fieldset>
            <legend>CLASIFICACIÓN</legend>

        <div class="caja12">
			<div >
                    <div >
                        <strong>HIPERTENSIÓN ARTERIAL: </strong>
                        <?php
                        echo $h->hcHipertensionArterialPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN HIPERTENSIÓN ARTERIAL: </strong>
                        <?php
                        echo $h->hcObsPersonallHipertensionArterial; ?>
                    </div>
               
                    <div >
                        <strong>CLASIFICACIÓN HTA: </strong>
                        <?php
                        echo $h->hcClasificacionHta; ?>

                    </div>
              
                    <div >
                        <strong>DIABETES MELLITUS:</strong>
                        <?php
                        echo $h->hcDiabetesMellitusPersonal; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIÓN DIABETES MELLITUS: </strong>
                        <?php
                        echo $h->hcObsPersonalMellitus; ?>
                    </div>
         </div>

		 <div >
				<div >
                        <strong>CLASIFICACIÓN DM:</strong>
                        <?php
                        echo $h->hcClasificacionDm; ?>

                    </div>
				
                    <div >
                        <strong>CLASIFICACIÓN ERC ESTADIO: </strong>
                        <?php
                        echo $h->hcClasificacionErcEstado; ?>
                    </div>
                    <div >
                        <strong>CLASIFICACIÓN  ERC CATEGORÍA DE ALBUMINURIA PERSISTENTE: </strong>
                        <?php
                        echo $h->hcClasificacionErcCategoriaAmbulatoriaPersistente; ?>

                    </div>
              
                    <div >
                        <strong>CLASIFICACIÓN RIESGO CARDIO VASCULAR:</strong>
                        <?php
                        echo $h->hcClasificacionRcv; ?>
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

            <div class="caja12">
                <div >
                    <div >
                        <strong>ALIMENTACIÓN: </strong>
                        <?php
                        echo $h->hcAlimentacion; ?>
                    </div>
                    <div >
                        <strong>DISMINUCIÓN DE CONSUMO DE SAL/AZÚCAR: </strong>
                        <?php
                        echo $h->hcDisminucionConsumoSalAzucar; ?>
                    </div>
                
                    <div >
                        <strong>FOMENTO DE ACTIVIDAD FÍSICA: </strong>
                        <?php
                        echo $h->hcFomentoActividadFisica; ?>
                    </div>
                    <div >
                        <strong>IMPORTANCIA DE ADHERENCIA A TRATAMIENTO: </strong>
                        <?php
                        echo $h->hcOmportanciaAdherenciaTratamiento; ?>
                    </div>
              
                    <div >
                        <strong>CONSUMO DE FRUTAS Y VERDURAS: </strong>
                        <?php
                        echo $h->hcConsumoFrutasVerduras; ?>
                    </div>
                </div>
                <div >
                    <div >
                        <strong>MANEJO DEL ESTRÉS: </strong>
                        <?php
                        echo $h->hcManejoEstres; ?>
                    </div>
               
                    <div >
                        <strong>DISMINUCIÓN DE CONSUMO CIGARRILLO: </strong>
                        <?php
                        echo $h->hcDisminucionConsumoCigarrillo; ?>
                    </div>
                    <div >
                        <strong>DISMINUCIÓN DE PESO: </strong>
                        <?php
                        echo $h->hcDisminucionPeso; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>
        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-12">
                    <strong>OBSERVACIONES GENERALES</strong><br>
                    <?php
                    echo $h->hcObservacionesGenerales; ?>

                </div>
            </div>
        </div><br>
        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-12">
                    <strong>FINALIDAD: </strong>
                    <?php
                    echo $h->finalidad_idFinalidad; ?>
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
                                echo "<td>" .$num++. "</td>";
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
        <div class="caja13">
            <div >
               <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br> <?= $h->proNombre; ?><br>RM: <?= $h->usuRegistroProfesional; ?> </em>
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
