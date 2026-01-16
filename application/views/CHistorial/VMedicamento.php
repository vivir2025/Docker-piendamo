
<!-- This view is where you print me the medications formulated for the patient -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/css/medi.css"); ?>">
</head>
<body>
    
<div>
<div >
    <?php 

    if (count($medicamento_historia)==0) {
        echo"<h5 style='color: red;'>NO HAY DATOS PARA MOSTRAR</h5>";
    }else{

        foreach ($dato_historia as $h) { ?>

          

                <div style="border: ridge #0f0fef 1px; ">
               <div class="border">
                    
                           <div >

                                                        
                                <img class="img" src="<?= base_url("assets/img/logo.png"); ?>"  />


                                </div>
                                <div class="text" >



                                        <h3 class="texts">FUNDACIÓN NACER PARA </h3>
                                        <h3 class="texts">VIVIR IPS</h3>

                                
                                
                                        <small class="texts">NIT: 900817959-1</small>
                                    

                                

                                        <small class="texts"><?= $h->proNombre; ?> APERTURA PROGRAMA DE GESTIÓN DEL RIESGO CARDIORENAL</small>
                                        <small class="texts"><?= $h->citFecha ?></small>
                                

                                </div>


                                <div >


                                <img class="img" src="<?= base_url("assets/img/logo.png"); ?>" >


                                </div>
                                </div>
               
                </div>

          
            <br><br>

            <div style="border: ridge #0f0fef 1px;">
                <div class="border">
                    <div >
                        <strong  class="heads">DOCUMENTO: </strong><br>
                        <?php
                        echo $h->pacDocumento;
                        ?>
                    </div>
                    <div >
                        <strong  class="heads">NOMBRE: </strong><br>
                        <?php
                        echo $h->pacNombre ." ". $h->pacNombre2 ." ". $h->pacApellido ." ". $h->pacApellido2; ?>
                    </div>
                    <div >
                        <strong class="heads">FECHA NACIMIENTO Y EDAD</strong>
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
                    <div >
                        <strong  class="heads">DIRECCIÓN: </strong><br>
                        <?php
                        echo $h->pacDireccion; ?>
                    </div>
                    <div >
                        <strong  class="heads">TELÉFONO: </strong><br>
                        <?php
                        echo $h->pacTelefono; ?>
                    </div>
                    <div >
                        <strong  class="heads">FECHA: </strong><br>
                        <?= $h->citFecha ?></small></div>
                    </div>
                </div>
            </div>
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
        </fieldset>
        <br>
        
        <?php
// Ordenar el array por el campo 'medNombre' de manera alfabética
usort($medicamento_historia, function($a, $b) {
    return strcmp($a->medNombre, $b->medNombre);
});
?>

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
                        <th>#</th>
                        <th>MEDICAMENTO</th>
                        <th>DOSIS</th>
                        <th>CANTIDAD</th>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        foreach ($medicamento_historia as $dh) {
                            echo "<tr>";
                            echo "<td>" . $num++. "</td>";
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


       

            <div style="border: ridge #0f0fef 1px;">
                
                    <div class="firma" >
                        <div >
                        <div>
                                <?php
                                echo '<img alt="Image placeholder" width="302px" height="70px" src="data:image/jpeg;base64,' . base64_encode($h->usuFirma) . '"/>'; ?>
                        </div>
                        <div > <strong >FIRMA DIGITAL</strong> </div>
                        <div> <strong > PROFESIONAL: </strong> <em ><?= $h->usuNombre . " " . $h->usuApellido; ?><br> <?= $h->proNombre; ?><br>RM: <?= $h->usuRegistroProfesional; ?></em> </div>
                        

                        </div>

                       
                   
                            <div class="firma1">
                                <strong>FIRMA PACIENTE: </strong>
                                <em><?= $h->nom_abreviacion . "-" . $h->pacDocumento . " " . $h->pacNombre . " " . $h->pacApellido ?></em>
                            </div>
              
            </div>



    <?php } 
} ?>



<script type="text/javascript">

    window.print();
    window.onmousemove = function() {
      window.close();
  }

</script>
    
</body>
</html>