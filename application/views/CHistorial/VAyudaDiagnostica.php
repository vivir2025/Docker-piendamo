<!-- This is the view for printing patients' diagnostic aids -->
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
    <small class="texts">ESPECIAL CONTROL APERTURA PROGRAMA DE GESTIÓN DEL RIESGO CARDIORENAL</small>
    <small class="texts"><?= $dato_historia[0]->citFecha ?></small>
  </div>
  <div >
  <img class="img" src="<?= base_url("assets/img/logo.png"); ?>" >
  </div>
  </div>
</div>
    <br><br>
    <?php 
    
    if (count($cups_historia)==0) {
        echo"<h5 style='color: red;'>NO HAY DATOS PARA MOSTRAR</h5>";
    }else{

        foreach ($dato_historia as $h) { ?>
            <div style="border: ridge #0f0fef 1px;">
            <div class="caja1">
                <div class="caja2">
                    <div >
                        <strong>DOCUMENTO: </strong><br>
                        <?php
                        echo $h->pacDocumento;
                        ?>
                    </div>
                    <div >
                        <strong>NOMBRE: </strong><br>
                        <?php
                        echo $h->pacNombre ." ". $h->pacNombre2 ." ". $h->pacApellido ." ". $h->pacApellido2; ?>
                    </div>
                    <div >
                        <strong>FECHA NACIMIENTO Y EDAD</strong><br>
                        <?php echo $h->pacFecNacimiento . " - ";
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
                </div>
                <div class="caja2">
                    <div >
                        <strong>DIRECCIÓN: </strong><br>
                        <?php
                        echo $h->pacDireccion; ?>
                    </div>
                    <div >
                        <strong>TELÉFONO: </strong><br>
                        <?php
                        echo $h->pacTelefono; ?>
                    </div>
                    <div >
                        <strong>FECHA: </strong><br>
                        <?= $h->citFecha ?></small></div>
                    </div>
                </div>
            </div>
            </div>
            <br>
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

    <?php }
} ?>

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
