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
            <small class="texts"> HISTORIA CLÍNICA NUTRICIONISTA CONTROL PROGRAMA DE GESTIÓN <br> DEL RIESGO CARDIORENAL</small>
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
        <?php foreach ($antecedentes_personales as $a) { ?>


            <fieldset>
                <legend>HISTORIA CLÍNICA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div >
                            <strong>ENFERMEDAD(ES) DIAGNOSTICADA(S)</strong>
                            <br>
                            <?php
                            echo $a->hcEnfermedadDiagnostica; ?>
                           </div>
                </div>
            </div>
            </fieldset><br>
        <div style="border: ridge #0f0fef 1px;">
            <div class="caja2">
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
                   

                        <div >
                            <strong>IMC</strong>
                            <br>
                            <?=
                            $dato_historia[0]->hcIMC; ?>
                        </div>
                   
                   
                        <div >
                            <strong>CLASIFICACIÓN </strong>
                            <br>
                            <?=
                            $dato_historia[0]->hcClasificacion; ?>
                             </div>
                    </div>
                </div><br>
                <div style="border: ridge #0f0fef 1px;">
            <div class="caja12">
                <div >
                    <strong>TIEMPO DE COMIDA DESAYUNO</strong>
                   
                    <br>
                    <?php
                    echo $a->hcComida_desayuno; ?>
                </div>
                <div >
                    <strong>TIEMPO DE COMIDA 1/2 DESAYUNO</strong>
                    <br>
                    <?php
                    echo $a->hcComidamedio_desayuno; ?>
                </div>
                <div >
                    <strong>TIEMPO DE COMIDA ALMUERZO</strong>
                    <br>
                    <?php
                    echo $a->hcComida_almuerzo; ?>
                </div>
                <div >
                    <strong>TIEMPO DE COMIDA 1/2 TARDE</strong>
                    <br>
                    <?php
                    echo $a->hcComidamedio_almuerzo; ?>
                </div>
                <div >
                    <strong>TIEMPO DE COMIDA CENA</strong>
                    <br>
                    <?php
                    echo $a->hcComida_cena; ?>
                </div>
            </div>
        </div><br>

        <div style="border: ridge #0f0fef 1px;">
            <div class="caja12" >
                <div >
                    <strong>LÁCTEO</strong>
                    <br>
                    <?php
                    echo $a->hcLacteo; ?>
                </div>
                <div >
                    <strong>LÁCTEO, OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcLacteo_observacion; ?>
                </div>
                <div >
                    <strong>HUEVO</strong>
                    <br>
                    <?php
                    echo $a->hcHuevo; ?>
                </div>
                <div >
                    <strong>HUEVO OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcHuevo_observacion; ?>
                </div>
                <div >
                    <strong>EMBUTIDO</strong>
                    <br>
                    <?php
                    echo $a->hcEmbutido; ?>
                </div>
                <div >
                    <strong>OBSERVACIÓN EMBUTIDO</strong>
                    <br>
                    <?php
                    echo $a->hcEmbutido_observacion; ?>
                </div>
                <div >
                    <strong>CARNE ROJA</strong>
                    <br>
                    <?php
                    echo $a->hcCarneroja; ?>
                </div>
                <div >
                    <strong>CARNE BLANCA</strong>
                    <br>
                    <?php
                    echo $a->hcCarneblanca; ?>
                </div>
                <div >
                    <strong>CARNE VICERA</strong>
                    <br>
                    <?php
                    echo $a->hcCarnevicera; ?>
                </div>
                <div >
                    <strong>CARNE OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcCarneobservacion; ?>
                </div>
                <div >
                    <strong>LEGUMINOSAS SECAS</strong>
                    <br>
                    <?php
                    echo $a->hcLeguminosas; ?>
                </div>
                <div >
                    <strong>LEGUMINOSAS SECAS OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcLeguminosasobservacion; ?>
                </div>
                <div >
                    <strong>FRUTAS EN JUGO</strong>
                    <br>
                    <?php
                    echo $a->hcFrutas_jugo; ?>
                </div>
                <div >
                    <strong>FRUTAS EN PORCIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcFrutas_porcion; ?>
                </div>
                <div >
                    <strong>FRUTAS OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcFrutas_observacion; ?>
                </div>
                <div >
                    <strong>VERDURAS Y HORTALIZAS</strong>
                    <br>
                    <?php
                    echo $a->hcVerduras_hortalizas; ?>
                </div>
                <div >
                    <strong>VERDURAS Y HORTALIZAS OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcVh_observacion; ?>
                </div>
                <div >
                    <strong>CEREALES</strong>
                    <br>
                    <?php
                    echo $a->hcCereales; ?>
                </div>
                <div >
                    <strong>CEREALES, OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcCereales_observacion; ?>
                </div>
                <div >
                    <strong>RTP</strong>
                    <br>
                    <?php
                    echo $a->hcRTP; ?>
                </div>
                <div >
                    <strong>RTP OBSERVACIÓN</strong>
                    <br>
                    <?php
                    echo $a->hcRTP_observacion; ?>
                </div>
                <div >
                    <strong>AZÚCARES Y DULCES</strong>
                   <br>
                    <?php
                    echo $a->hcAzucar_dulce; ?>
                </div>
                <div >
                    <strong>AZÚCARES Y DULCES OBSERVACIÓN</strong>
                     <br>
                    <?php
                    echo $a->hcAd_observacion; ?>
                </div>
            </div>
        </div><br>

        <div style="border: ridge #0f0fef 1px;">
           
                <div class="form-group col-md-12">
                    <strong>DIAGNÓSTICO NUTRICIONAL</strong>
                    <br>
                    <?php
                    echo $a->hcDiagnostico_nutri; ?>
                </div>
			</div><br>
				<div style="border: ridge #0f0fef 1px;">
                <div class="form-group col-md-12">
                    <strong>PLAN A SEGUIR</strong>
                    <br>
                    <?php
                   echo $a->hcPlanSeguir;?>
                </div>
				</div><br>
				<div  style="border: ridge #0f0fef 1px;">
				 <div >
                    <strong>ANÁLISIS NUTRICIONAL</strong>
                     <br>
                  <?php
                   echo $a->hcAnalisisNutricional; ?>
              </div>
            </div>
      
                           
        <?php } ?> <br>
<div class="saltopagina">
<fieldset >
            <legend>DIAGNÓSTICO</legend>
            <div  style="margin: 10px;">
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


        <?php if (count($medicamento_historia) != 0) { ?>

            <fieldset>
                <legend>MEDICAMENTOS</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FÓRMULA MÉDICA <?php echo date("Y-m-d", time()); ?></center>
                                        </th>
                                    </tr>
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
            </fieldset>
</div>
       <br>

        <?php }
        if (count($remision_historia) != 0) { ?>

            <fieldset>
                <legend>REMISIÓN</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="7">
                                            <center>FÓRMULA DE REMISIÓN <?php echo date("Y-m-d", time()); ?></center>
                                        </th>
                                    </tr>
                                    <th>CÓDIGO</th>
                                    <th>REMISIÓN</th>
                                    <th>OBSERVACIÓN</th>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($remision_historia as $r) {

                                        echo "<tr>";
                                        echo "<td>"
                                            . $r->remCodigo . "</td>";
                                        echo "<td>" . $r->remNombre . "</td>";
                                        echo "<td>" . $r->remObservacion . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </fieldset><br>

        <?php }  ?>

        <?php } ?> <br>
            <!--fieldset>
            <legend>HISTORIA CLINICA</legend>
            <div style="margin: 10px;">
                <div class="form-row">
                    <div >
                        <strong>RAZON REFORMULACION</strong><br>
                        <?php
                        echo $h->hcRazonReformulacion; ?>

                    </div>
                    <div >
                        <strong>MOTIVO REFORMULACION</strong><br>
                        <?php
                        echo $h->hcMotivoReformulacion; ?>

                    </div>
                </div>
                <div class="form-row">
                    <div >
                        <strong>QUIEN RECLAMA</strong><br>
                        <?php
                        echo $h->hcReformulacionQuienReclama; ?>
                    </div>
                    <div >
                        <strong>NOMBRE RECLAMA</strong><br>
                        <?php
                        echo $h->hcReformulacionNombreReclama; ?>

                    </div>
                </div>
            </div>
        </fieldset--><br>
        
     
           
                <div class="form-group col-md-13">
            <fieldset>
                <legend>DIAGNOSTICO</legend>
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
                                    <th>CODIGO</th>
                                    <th>DIAGNOSTICO</th>
                                    <th>CLASIFICACION</th>
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
                <div class="form-row" style="margin: 10px; text-align:center;">
                    <div >
                        <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br> <?= $h->proNombre; ?><br>RM: <?= $h->usuRegistroProfesional; ?> </em>
                    </div>
                    <div ><br><br><br><br><br>
                        <strong>FIRMA PACIENTE: </strong>
                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
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
    flex-wrap: wrap;
  
    margin-bottom: 5px;
    padding-left: 10px;
    padding-right: 10px;
}

.caja12 > * {
    flex: 1 1 50%; /* Cada elemento ocupa el 50% del ancho del contenedor */
    box-sizing: border-box; /* Incluye padding y border en el tamaño del elemento */
    padding: 5px; 
    
    
   
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