<!-- This view is ready to view stories based on document number and everything related to the story -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/css/medi.css"); ?>">
</head>
<body>
    
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
    <small class="texts"> NEFROLOGIAPROGRAMA DE GESTIÓN DEL RIESGO CARDIO RENAL</small>
    <small class="texts"><?= $dato_historia[0]->citFecha ?></small>
  </div>
  <div >
  <img class="img" src="<?= base_url("assets/img/logo.png"); ?>" >
  </div>
  </div>
</div>
<br><br>
    <?php foreach ($dato_historia as $h) { ?>
        <fieldset>
            <legend>DATOS PACIENTE</legend>
            <div class="caja1">
                <div class="caja2">
                    <div>
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

            <div style="margin: 10px; text-align:center">
                <div class="caja12">
                    <div class="form-group col-md-6">
                        <strong>MOTIVO CONSULTA</strong><br>
                        <?php
                        echo $antecedentes_personales[0]->hcMotivoConsulta; ?>

                    </div>
                    <div class="form-group col-md-6">
                        <strong>ENFERMEDAD ACTUAL</strong><br>
                        <?php
                        echo $h->hcEnfermedadActual; ?>
                    </div>
                </div>
            </div>
        </fieldset><br>
  <?php foreach ($antecedentes_personales as $hap) { ?>

        <fieldset>
            <legend>ANTECEDENTES PERSONALES</legend>
            <div style="margin: 10px;">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>SISTEMA NERVIOSO: DOLORES DE CABEZA, CONVULSIONES, MAREOS, PARÁLISIS, TRASTORNOS MENTALES: </strong>
                        <?php
                        echo $hap->hcSistemaNerviosoNefroInter; ?>

                    </div>

                    <?php if ($hap->hcSistemaNerviosoNefroInter == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN SISTEMA NERVIOSO: DOLORES DE CABEZA, CONVULSIONES, MAREOS, PARÁLISIS, TRASTORNOS MENTALES </strong>


                            <?php echo $hap->descripcion_sistema_nervioso;  ?>

                        </div>
                    <?php } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>SISTEMA HEMOLINFATICO: ANEMIA, DESÓRDENES SANGUÍNEOS O PROBLEMAS DE COAGULACIÓN:</strong>
                        <?php
                        echo $hap->hcSistemaHemolinfatico; ?>
                    </div>

                    <?php if ($hap->hcSistemaHemolinfatico == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN SISTEMA HEMOLINFATICO: ANEMIA, DESÓRDENES SANGUÍNEOS O PROBLEMAS DE COAGULACIÓN </strong>

                            <?php echo $hap->descripcion_sistema_hemolinfatico;  ?>

                        </div>
                    <?php } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>APARATO DIGESTIVO: ÚLCERAS, GASTRITIS, CIRROSIS, DIVERTÍCULOS, COLITIS, HEMORROIDES </strong>

                        <?php
                        echo $hap->hcAparatoDigestivo; ?>

                    </div>
                    <?php if ($hap->hcAparatoDigestivo == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN APARATO DIGESTIVO: ÚLCERAS, GASTRITIS, CIRROSIS, DIVERTÍCULOS, COLITIS, HEMORROIDES</strong>
                            <?php
                            echo $hap->descripcion_aparato_digestivo; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>ÓRGANOS DE LOS SENTIDOS: CATARATAS, PTERIGIOS, VISIÓN CORTA, OTITIS, DESVIACIÓN DEL TABIQUE,<br> SINUSITIS, AMIGDALITIS </strong>

                        <?php
                        echo $hap->hcOrganoSentido; ?>

                    </div>

                    <?php if ($hap->hcOrganoSentido == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN ÓRGANOS DE LOS SENTIDOS: CATARATAS, PTERIGIOS, VISIÓN CORTA, OTITIS, DESVIACIÓN DEL TABIQUE, SINUSITIS, AMIGDALITIS</strong>

                            <?php
                            echo $hap->descripcion_organos_sentidos; ?>

                        </div>
                    <?php  } ?>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>ENDOCRINO-METABOLICOS: DIABETES, ENFERMEDADES DE LA TIROIDES, ALTERACIÓN DE LAS GRASAS,<br> O ÁCIDOS ÚRICO SANGUÍNEOS </strong>

                        <?php
                        echo $hap->hcEndocrinoMetabolico; ?>
                    </div>
                    <?php if ($hap->hcEndocrinoMetabolico == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN ENDOCRINO-METABOLICOS: DIABETES, ENFERMEDADES DE LA TIROIDES, ALTERACIÓN DE LAS GRASAS, O ÁCIDOS ÚRICO SANGUÍNEOS</strong>
                            <?php
                            echo $hap->descripcion_endocrino_metabolico; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>INMUNOLÓGICOS: LUPUS, ARTRITIS REUMATOIDES</strong>

                        <?php
                        echo $hap->hcInmunologico; ?>
                    </div>
                    <?php if ($hap->hcInmunologico == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN INMUNOLÓGICOS: LUPUS, ARTRITIS REUMATOIDES</strong>
                            <?php
                            echo $hap->descripcion_inmunologico; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>CÁNCER, TUMORES, RADIOTERAPIA O QUIMIOTERAPIA</strong>
                        <?php
                        echo $hap->hcCancerTumoresRadioterapiaQuimio; ?>

                    </div>
                    <?php if ($hap->hcCancerTumoresRadioterapiaQuimio == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN CÁNCER, TUMORES, RADIOTERAPIA O QUIMIOTERAPIA</strong>
                            <?php
                            echo $hap->descripcion_cancer_tumores_radio_quimioterapia; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>GLÁNDULAS MAMARIAS: DOLORES, MASAS, SECRECIONES</strong>
                        <?php
                        echo $hap->hcGlandulaMamaria; ?>

                    </div>
                    <?php if ($hap->hcGlandulaMamaria == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN GLÁNDULAS MAMARIAS: DOLORES, MASAS, SECRECIONES</strong>
                            <?php
                            echo $hap->descripcion_glandulas_mamarias; ?>
                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>HIPERTENSIÓN, DIABETES, ERC</strong>
                        <?php
                        echo $hap->hcHipertensionDiabetesErc; ?>
                    </div>
                    <?php if ($hap->hcHipertensionDiabetesErc == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN HIPERTENSIÓN, DIABETES, ERC</strong>
                            <?php
                            echo $hap->descripcion_hipertension_diabetes_erc; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>REACCIONES ALÉRGICAS: </strong>
                        <?php
                        echo $hap->hcReacionesAlergica; ?>

                    </div>
                    <?php if ($hap->hcReacionesAlergica == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN REACCIONES ALÉRGICAS</strong>
                            <?php
                            echo $hap->descripcion_reacion_alergica; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>CARDIO VASCULARES: HIPERTENSIÓN, INFARTOS, ANGINAS, SOPLOS, ARRITMIAS, ENFERMEDADES CORONARIAS </strong>

                        <?php
                        echo $hap->hcCardioVasculares; ?>

                    </div>
                    <?php if ($hap->hcCardioVasculares == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN CARDIO VASCULARES: HIPERTENSIÓN, INFARTOS, ANGINAS, SOPLOS, ARRITMIAS, ENFERMEDADES CORONARIAS</strong>
                            <?php
                            echo $hap->descripcion_cardio_vasculares; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>RESPIRATORIOS: ASMA, ENFISEMA, EFECCION LARÍNGEA O EN BRONQUIOS </strong>
                        <?php
                        echo $hap->hcRespiratorios; ?>

                    </div>
                    <?php if ($hap->hcRespiratorios == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN RESPIRATORIOS: ASMA, ENFISEMA, EFECCION LARÍNGEA O EN BRONQUIOS</strong>
                            <?php
                            echo $hap->descripcion_respiratorios; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>CRINARIAS: INSUFICIENCIA RENAL, CÁLCULOS, ORINA CON SANGRE, INFECCIONES FRECUENTES,<br> PRÓSTATAS ENFERMAS</strong>

                        <?php
                        echo $hap->hcCrinarias; ?>

                    </div>
                    <?php if ($hap->hcCrinarias == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN CRINARIAS: INSUFICIENCIA RENAL, CÁLCULOS, ORINA CON SANGRE, INFECCIONES FRECUENTES, PRÓSTATAS ENFERMAS</strong>
                            <?php
                            echo $hap->descripcion_crinarias; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>OSTEOARTICULARES: ENFERMEDADES DE LA COLUMNA, DOLOR DE RODILLA, DEFORMIDADES </strong>
                        <?php
                        echo $hap->hcOsteoarticulares; ?>

                    </div>
                    <?php if ($hap->hcOsteoarticulares == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN OSTEOARTICULARES: ENFERMEDADES DE LA COLUMNA, DOLOR DE RODILLA, DEFORMIDADES</strong>
                            <?php
                            echo $hap->descripcion_osteoarticulares; ?>
                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>INFECCIOSOS: HEPATITIS, TUBERCULOSIS, SIDA O VIH(+), ENFERMEDADES DE TRANSMISIÓN SEXUAL </strong>

                        <?php
                        echo $hap->hcInfecciosos; ?>

                    </div>
                    <?php if ($hap->hcInfecciosos == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN INFECCIOSOS: HEPATITIS, TUBERCULOSIS, SIDA O VIH(+), ENFERMEDADES DE TRANSMISIÓN SEXUAL</strong>
                            <?php
                            echo $hap->descripcion_infecciosos; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>CIRUGÍAS TRAUMAS(ACCIDENTES)</strong>
                        <?php
                        echo $hap->hcCirugiaTrauma; ?>

                    </div>
                    <?php if ($hap->hcCirugiaTrauma == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN CIRUGÍAS TRAUMAS(ACCIDENTES)</strong>
                            <?php
                            echo $hap->descripcion_cirugias_traumas; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>TRATAMIENTOS CON MEDICACIÓN</strong>
                        <?php
                        echo $hap->hcTratamientoMedicacion; ?>

                    </div>

                    <?php if ($hap->hcTratamientoMedicacion == 'SI') { ?>

                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN TRATAMIENTOS CON MEDICACIÓN</strong>
                            <?php
                            echo $hap->descripcion_tratamiento_medicacion; ?>
                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>ANTECEDENTES QUIRÚRGICOS: </strong>

                        <?php
                        echo $hap->hcAntecedenteQuirurgico; ?>
                    </div>
                    <?php if ($hap->hcAntecedenteQuirurgico == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN ANTECEDENTES QUIRÚRGICOS</strong>
                            <?php
                            echo $hap->descripcion_antecedentes_quirurgicos; ?>
                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>ANTECEDENTES FAMILIARES: </strong>
                        <?php
                        echo $hap->hcAntecedentesFamiliares; ?>

                    </div>
                    <?php if ($hap->hcAntecedentesFamiliares == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN ANTECEDENTES FAMILIARES</strong>
                            <?php
                            echo $hap->descripcion_antecedentes_familiares; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>CONSUMO DE TABACO</strong>
                        <?php
                        echo $hap->hcConsumoTabaco; ?>
                    </div>
                    <?php if ($hap->hcConsumoTabaco == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN CONSUMO DE TABACO</strong>
                            <?php
                            echo $hap->descripcion_consumo_tabaco; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>ANTECEDENTES DE ALCOHOL</strong>

                        <?php
                        echo $hap->hcAntecedentesAlcohol; ?>

                    </div>
                    <?php if ($hap->hcAntecedentesAlcohol == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN ANTECEDENTES DE ALCOHOL</strong>
                            <?php
                            echo $hap->descripcion_antecedentes_alcohol; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>SEDENTARISMO: </strong>

                        <?php
                        echo $hap->hcSedentarismo; ?>

                    </div>
                    <?php if ($hap->hcSedentarismo == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN SEDENTARISMO</strong>
                            <?php
                            echo $hap->descripcion_sedentarismo; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>GINECOLÓGICOS, TUMORES O MASA EN OVARIOS, ÚTERO, MENSTRUACIÓN ANORMAL: </strong>

                        <?php
                        echo $hap->hcGinecologico; ?>
                    </div>
                    <?php if ($hap->hcGinecologico == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN GINECOLÓGICOS, TUMORES O MASA EN OVARIOS, ÚTERO, MENSTRUACIÓN ANORMAL</strong>
                            <?php
                            echo $hap->descripcion_ginecologicos; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>CITOLOGÍA VAGINAL PATOLÓGICAS O ANORMALES</strong>

                        <?php
                        echo $hap->hcCitologiaVaginal; ?>

                    </div>
                    <?php if ($hap->hcCitologiaVaginal == 'SI') { ?>
                        <div class="form-group col-md-6">
                            <strong>DESCRIPCIÓN CITOLOGÍA VAGINAL PATOLÓGICAS O ANORMALES</strong>
                            <?php
                            echo $hap->descripcion_citologia_vaginal; ?>

                        </div>
                    <?php  } ?>
                </div>
                <div class="caja2">
                    <div >
                        <strong>MENARQUIA: </strong>
                        <?php
                        echo $hap->hcMenarquia; ?>

                    </div>
                    <div >
                        <strong>GESTACIONES: </strong>

                        <?php
                        echo $hap->hcGestaciones; ?>

                    </div>
                    <div >
                        <strong>PARTOS: </strong>
                        <?php
                        echo $hap->hcParto; ?>

                    </div>
                    <div >
                        <strong>ABORTOS: </strong>
                        <?php
                        echo $hap->hcAborto; ?>

                    </div>
                    <div >
                        <strong>CESARÍAS: </strong>
                        <?php
                        echo $hap->hcCesaria; ?>

                    </div>
                </div>
                <div class="caja12">
                    <div>
                        <strong>MÉTODOS ANTICONCEPTIVOS</strong>
                        <?php
                        echo $hap->hcMetodoConceptivo; ?>

                    </div>
                    <div >
                        <strong>MÉTODO ANTICONCEPTIVO ¿CUAL?</strong>
                        <?php
                        echo $hap->hcMetodoConceptivoCual; ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>OBSERVACIONES ANTECEDENTES PERSONALES</strong>

                        <?php
                        echo $hap->hcAntecedentePersonal; ?>

                    </div>
                </div>


            </div>
        </fieldset>
        <?php } ?><br>
        <fieldset>
            <legend>REVISIÓN POR SISTEMA</legend>

            <div class="caja12">
                <div>
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
                    <div>
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
                        <strong>TÓRAX: </strong>
                        <?php
                        echo $h->hcTorax; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIONES TÓRAX:</strong>
                        <?php
                        echo $h->hcObsTorax; ?>
                    </div>
                </div>
                <div >
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
                        <strong>NEUROLÓGICO Y ESTADO MENTAL: </strong>
                             <?php
                             echo $antecedentes_personales[0]->hcNeurologicoEstadoMental; ?>
                    </div>
                    <div >
                        <strong>OBSERVACIONES NEUROLÓGICO Y ESTADO MENTAL:</strong>
                         <?php
                                echo $antecedentes_personales[0]->hcObsNeurologicoEstadoMental; ?>
                     </div>
                </div>        
            </div>
        </fieldset><br>
        <fieldset>
            <legend>EXAMEN FÍSICO</legend>

            <div class="caja12">
                <div >
                    <div >
                        <strong>PESO KG: </strong>

                        <?php
                        echo $h->hcPeso; ?>

                    </div>
                    <div >
                        <strong>TALLA CM: </strong>

                        <?php
                        echo $h->hcTalla; ?>

                    </div>
                
                    <div >
                        <strong>IMC: </strong>
                        <?php
                        echo $h->hcIMC; ?>

                    </div>
                    <div >
                        <strong>PERIMETRO ABDOMINAL: </strong>

                        <?php
                        echo $h->hcPerimetroAbdominal; ?>

                    </div>
                </div>
                <div >
                    <div >
                        <strong>PRESIÓN ARTERIAL SISTÓLICA: </strong>
                        <?php
                        echo $h->hcPresionArterialSistolicaSentadoPie; ?>

                    </div>
                    <div >
                        <strong>PRESIÓN ARTERIAL DIASTÓLICA: </strong>
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
                </div>
            </div>
        </fieldset><br>

        <div style="border: ridge #0f0fef 1px;">
            <div class="form-row" style="margin: 10px;">
                <div class="form-group col-md-12">
                    <strong>ANÁLISIS PLAN</strong><br>
                    <?php
                    echo $h->hcObservacionesGenerales; ?>
                </div>
            </div>
        </div><br>
        <fieldset>
            <legend>CLASIFICACIÓN</legend>
            <div class="caja12">

                <div >
                    <div >
                        <strong>CLASIFICACIÓN HTA: </strong>
                        <?php
                        echo $h->hcClasificacionHta; ?>

                    </div>
                    <div >
                        <strong>CLASIFICACIÓN DM: </strong>
                        <?php
                        echo $h->hcClasificacionDm; ?>
                    </div>
                
                    <div >
                        <strong>CLASIFICACIÓN ERC ESTADO: </strong>
                        <?php
                        echo $h->hcClasificacionErcEstado; ?>
                    </div>
                </div>
                <div >
                    <div >
                        <strong>CLASIFICACIÓN ERC CATEGORÍA DE ALBUMINURIA PERSISTENTE: </strong>
                        <?php
                        echo $h->hcClasificacionErcCategoriaAmbulatoriaPersistente; ?>
                    </div>
                    <div >
                        <strong>CLASIFICACIÓN RCV: </strong>
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
            <div class="caja13">
                <div >
                    <?php

                    echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>
                    <strong>FIRMA DIGITAL</strong><br>
                    <strong>PROFESIONAL: </strong>
                    <em><?= $h->usuNombre . " " . $h->usuApellido; ?> <br> <?= $h->proNombre; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                </div>
                <div ><br><br><br><br><br>
                    <strong>FIRMA PACIENTE: </strong>
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
   text-align: center  ;
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
.caja12 {
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
    padding-left: 50px;
    padding-right: 50px;
 
   
}
.caja13 {
    display: flex;
    justify-content: space-around;
    margin-bottom: 5px;
    margin-top: 15px;
    padding-left: 50px;
    padding-right: 50px;
    text-align: center;
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