<!-- This view is ready to view stories based on document number and everything related to the story -->
<!DOCTYPE html>
<html lang="en">
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
    <small class="texts"> HISTORIA CLINICA FISIOTERAPIA PRIMERA VEZ APERTURA PROGRAMA <br>
                        DE GESTION DEL RIESGO CARDIORENAL</small>
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
                    <div>
                        <strong>NOMBRE</strong><br>
                        <?php
                        echo $h->nom_abreviacion . " " . $h->pacDocumento . "<br>";
                        echo $h->pacNombre . " " . $h->pacNombre2 . " " . $h->pacApellido . " " . $h->pacApellido2; ?>
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
                        <strong>ESATDO CIVIL</strong><br>
                        <?php echo $h->pacEstCivil; ?>
                    </div>
                    <div >
                        <strong>TELEFONO</strong><br>
                        <?php echo $h->pacTelefono; ?>
                    </div>
                </div>
                <div class="caja2">
                    <div >
                        <strong>DIRECCION</strong><br>
                        <?php
                        echo $h->depNombre . " - " . $h->munNombre . "<br>" . $h->pacDireccion; ?>
                    </div>
                    <div>
                        <strong>ASEGURADORA</strong><br>
                        <?php
                        echo $h->empNombre; ?>
                    </div>

                    <div >
                        <strong>REGIMEN</strong><br>
                        <?php echo $h->regNombre; ?>
                    </div>
                    <div >
                        <strong>OCUPACION</strong><br>
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
                        <strong>TELEFONO</strong><br>
                        <?php
                        echo $h->hcAcuTelefono; ?>
                    </div>
                </div>

            </fieldset><br>
            <fieldset>
                <legend>MOTIVO CONSULTA</legend>
                <div style="margin: 10px;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                      
                        <?php echo $antecedentes_personales[0]->hcMotivoConsulta; ?>                
                        
                    </div>
                     
                </div>
            </fieldset><br>
            <fieldset>
            <legend>DATOS FISICOS</legend>
            <div class="caja2">
                   
                
                    <div >
                        <strong>PESO KG</strong>
                        <?php echo $h->hcPeso; ?>
                    
                    </div>
                    <div >
                        <strong>TALLA CM</strong>
                        <?php echo $h->hcTalla; ?>
                    
                    </div>

                    <div >
                        <strong>IMC</strong>
                        <?php echo $h->hcIMC; ?>
                    
                    
                    </div>
                    <div >
                        <strong>PERIMETRO ABDOMINAL</strong>
                       
                        <?php echo $h->hcPerimetroAbdominal; ?>
                    
                    </div>
                </div>
                </fieldset><br>    

    <fieldset>
    <?php foreach ($antecedentes_personales as $a) { ?>
        <legend>EVALUACIÓNES</legend>
        <div class="caja12">
            <div >
                <div >
                <strong>ACTITUD POSTURAL</strong>
                <br>
                <?php echo $a->hcActitud; ?>
                </div>

                <div >
                <strong>EVALUACIÓN DE SENSIBILIDAD</strong>
                <br>
                <?php echo $a->hcEvaluaciond; ?>
                </div>
            
                <div >
                <strong>EVALUACIÓN DE PIEL</strong>
                <br>
                <?php echo $a->hcEvaluacionp; ?>
                </div>


                <div >
                <strong>ESTADO</strong>
                <br>
                <?php echo $a->hcEstado; ?>
                </div>
            </div>

            <div >
                <div >
                <strong>EVALUACIÓN DEL DOLOR</strong>
                <br>
                <?php echo $a->hcEvaluacion_dolor; ?>
                 </div>
           
                <div >
                <strong>EVALUACIÓN OSTEOARTICULAR</strong>
                <br>
                <?php echo $a->hcEvaluacionos; ?>
                </div>
            
                <div >
                <strong>EVALUACIÓN NEUROMUSCULAR</strong>
                <br>
                <?php echo $a->hcEvaluacionneu; ?> 
                 </div>
    
                     
                 <div >
                <strong>PADECE DE UNA ENFERMEDAD CONCOMITANTE</strong>
                <br>
                <?php echo $a->hcComitante; ?>
                </div>
            </div>
        </div>
            <?php } ?> <div></div>
</fieldset><br>

<fieldset>

<legend>PLAN DE TRATAMIENTO</legend>
       <div style="margin: 10px;">
         <div class="form-row">
         <div class="form-group col-md-6">
         <?php echo $a->hcPlanSeguir; ?>
       </div>
    </div>
</div><br>
</fieldset><br>

    <div style="border: ridge #0f0fef 1px;">
        <div class="form-row" style="margin: 10px;">
            <div class="form-group col-md-12">
                <strong>FINALIDAD</strong>
                <input class="form-control input-sm" name="finalidad" type="text" required="" value="NO APLICA" readonly="">
            </div>
        </div>
    </div><br>
    </fieldset>
    </fieldset> 
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
                        <strong>FINALIDAD: </strong>
                        <?php echo $h->finalidad_idFinalidad; ?>
                    </div>
                </div>
            </div><br>


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
                                                <center>FÓRMULA MÉDICA</center>
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
                </fieldset><br>
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
                                                <center>FÓRMULA DE REMISIÓN</center>
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
            <?php }
            if (count($cups_historia) != 0) { ?>
                <fieldset>
                    <legend>AYUDAS DIAGNÓSTICAS</legend>
                    <div style="margin: 10px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">
                                                <center>FORMATO AYUDA DIAGNOSTICA</center>
                                            </th>
                                        </tr>
                                        <th>CÓDIGO</th>
                                        <th>CUPS</th>
                                        <th>OBSERVACIONES</th>
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
            <?php } ?>


   
            <div style="border: ridge #0f0fef 1px;">
                <div class="caja13">
                    <div >
                        <?php

                        echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?><br>

                        <strong>FIRMA DIGITAL</strong><br>
                        <strong>PROFESIONAL: </strong>
                        <em><?= $h->usuNombre . " " . $h->usuApellido; ?><br> <?= $h->proNombre; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em>
                    </div>
                    <div ><br><br><br><br><br>
                        <strong>FIRMA PACIENTE: </strong>
                        <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                    </div>
                </div>
            </div>

    <?php
            }
            ?>


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
