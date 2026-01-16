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
    <small class="texts"> HISTORIA CLÍNICA REFORMULACIÓN PROGRAMA DE GESTIÓN DEL RIESGO CARDIORRENAL</small>
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
            <div class="caja1" >
                <div class="caja3" >
                    <div class="caja4">
                        <strong >RAZÓN REFORMULACIÓN</strong><br>
                        <?php
                        echo $h->hcRazonReformulacion; ?>

                    </div>
                    <div class="caja5">
                        <strong>MOTIVO REFORMULACIÓN</strong><br>
                        <?php
                        echo $h->hcMotivoReformulacion; ?>

                    </div>
                </div>
                <div class="caja3" >
                    <div class="caja4">
                        <strong>QUIEN RECLAMA</strong><br>
                        <?php
                        echo $h->hcReformulacionQuienReclama; ?>
                    </div>
                    <div class="caja5" >
                        <strong>NOMBRE RECLAMA</strong><br>
                        <?php
                        echo $h->hcReformulacionNombreReclama; ?>

                    </div>
                </div>
            </div>
        </fieldset><br>
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
                <br>
            <fieldset>
                <legend  >DIAGNÓSTICO</legend>
                <div style="margin: 10px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                             <thead>
                                <tr>
                                    <th colspan="7">
                                        <center>FORMATO DIAGNOSTICAss</center>
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
                </div>
            </div>
        </fieldset>
        <br>
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
    text-align: lef;
    margin-bottom: 5px;
 
   
}
.caja4 {
text-align: justify;
width: 500px;

}
</style>
</html>