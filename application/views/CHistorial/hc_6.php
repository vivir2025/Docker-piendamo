<!-- This view is ready to view stories based on document number and everything related to the story -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
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
</style>

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
    <small class="texts">HISTORIA CLÍNICA TRABAJO SOCIAL PROGRAMA DE GESTIÓN DEL  <br>RIESGO CARDIORENAL</small>
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
            <div class="caja2" >
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
       
            <?php foreach ($antecedentes_personales as $hap) { ?>
        <fieldset>
            <legend>HISTORIA CLÍNICA</legend>
            <div class="caja12">
                <div >
                    <div >
                        <strong>MOTIVO DE CONSULTA</strong><br>
                        <?php
                        echo $hap->hcMotivoConsulta; ?>
                    </div>
                    <div >
                        <strong>ESTRUCTURA FAMILIAR</strong><br>
                        <?php
                        echo $hap->hcEstructuraFamiliar; ?>
                        
                    </div>
            
                    <div >
                        <strong>N° DE FAMILIAS QUE HABITAN EN LA VIVIENDA</strong><br>
                        <?php
                        echo $hap->hcCantidadHabitantes; ?>

                    </div>
                    <div >
                        <strong>N° DE PERSONAS QUE CONFORMAN NÚCLEO FAMILIAR</strong><br>
                        <?php
                        echo $hap->hcCantidadConformanFamilia; ?>
                        
                    </div>
               
                    <div >
                        <strong>COMPOSICIÓN FAMILIAR</strong><br>
                        <?php
                        echo $hap->hcComposicionFamiliar; ?>
                        
                    </div>
                    <div >
                        <strong>TIPO DE VIVIENDA</strong><br>
                        <?php
                        echo $hap->hcTipoVivienda; ?>
                    </div>
               
                    <div >
                        <strong>TENENCIA DE LA VIVIENDA</strong><br>
                        <?php
                        echo $hap->hcTenenciaVivienda; ?>
                        
                    </div>
                    <div >
                        <strong>MATERIAL PREDOMINANTE DE LAS PAREDES</strong><br>
                        <?php
                        echo $hap->hcMaterialParedes; ?>
                        
                    </div>
                
                    <div >
                        <strong>MATERIAL PREDOMINANTE DE LOS PISOS</strong><br>
                        <?php
                        echo $hap->hcMaterialPisos; ?>
                        
                    </div>
                    <div >
                        <strong>ESPACIOS DE LA SALA</strong>
                        <br>
                        <?php
                        echo $hap->hcEspaciosSala; ?>
                    </div>
               
                    <div >
                        <strong>COMEDOR</strong>
                        <br>
                        <?php
                        echo $hap->hcComedor; ?>
                    </div>
                    <div >
                        <strong>BAÑO</strong>
                        <br>
                        <?php
                        echo $hap->hcBanio; ?>
                    </div>
                
                    <div >
                        <strong>COCINA</strong>
                        <br>
                        <?php
                        echo $hap->hcCocina; ?>
                    </div>
                    <div >
                        <strong>PATIO</strong>
                        <br>
                        <?php
                        echo $hap->hcPatio; ?>
                    </div>
              
                    <div >
                        <strong>N° DE DORMITORIOS</strong>
                        <br>
                        <?php
                        echo $hap->hcCantidadDormitorios; ?>
                    </div>
                
                    <div >
                        <strong>N° DE PERSONAS QUE OCUPAN CADA CUARTO PARA DORMIR</strong>
                        <br>
                        <?php
                        echo $hap->hcCantidadPersonasOcupanCuarto; ?>
                    </div>
              
                    <div >
                        <strong>ENERGÍA ELÉCTRICA</strong><br>
                        <?php
                        echo $hap->hcEnergiaElectrica; ?>
                    </div>
                    <div>
                        <strong>ALCANTARILLADO</strong><br>
                        <?php
                        echo $hap->hcAlcantarillado; ?>
                    </div>
               
                    <div >
                        <strong>GAS NATURAL DOMICILIARIO</strong>
                        <br>
                        <?php
                        echo $hap->hcGasNatural; ?>
                    </div>
                    <div >
                        <strong>CENTRO DE ATENCIÓN EN SALUD</strong><br>
                        <?php
                        echo $hap->hcCentroAtencion; ?>
                        
                    </div>
                
                    <div >
                        <strong>ACUEDUCTO</strong>
                        <br>
                        <?php
                        echo $hap->hcAcueducto; ?>
                    </div>
                 
                    <div >
                        <strong>CENTRO CULTURALES (BIBLIOTECAS, LUDOTECA)</strong><br>
                        <?php
                        echo $hap->hcCentroCulturales; ?>
                        
                    </div>
               
                    <div>
                        <strong>VENTILACIÓN</strong>
                        <br>
                        <?php
                        echo $hap->hcVentilacion; ?>
                    </div>
                    <div >
                        <strong>ORGANIZACIÓN</strong>
                        <br>
                        <?php
                        echo $hap->hcOrganizacion; ?>
                    </div>
                    </div>
                <!-- aqui termina -->
                 <div >
              
                    <div >
                        <strong>CENTRO DE EDUCACIÓN (ESCUELAS, COLEGIOS)</strong>
                        <br>
                        <?php
                        echo $hap->hcCentroEducacion; ?>
                    </div>
                    <div >
                        <strong>CENTRO DE RECREACIÓN Y ESPARCIMIENTO (PARQUES)</strong>
                        <br>
                        <?php
                        echo $hap->hcCentroRecreacionEsparcimiento; ?>
                    </div>
               
                    <div >
                        <strong>DINÁMICA FAMILIAR</strong>
                        <br>
                        <?php
                        echo $hap->hcDinamicaFamiliar; ?>
                    </div>
                    <div>
                        <strong>DIAGNÓSTICO</strong>
                        <br>
                        <?php
                        echo $hap->hcDiagnostico; ?>
                    </div>
               
                    <div >
                        <strong>ACCIONES A SEGUIR</strong>
                        <br>
                        <?php
                        echo $hap->hcAccionesSeguir; ?>
                    </div>
                   
                </div>
            </div>
        </fieldset>

        <?php } ?> <br>
        <div class="saltopagina">
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
                <div class="form-row" style="margin: 10px;">
                    <div class="form-group col-md-12">
                        <strong>NOTA ADICIONAL: </strong>
                        <?php echo $h->hcAdicional; ?>
                    </div>
                </div>
            </div><br>
        <div style="border: ridge #0f0fef 1px;">
            <div class="caja13">

                <div>
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