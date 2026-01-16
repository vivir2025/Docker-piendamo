<!-- Tabla presentación de la información -->

<!-- This is the view where we search by document number to see what date the appointment is for and the status -->


<div class="container bg-light">

    <!-- Button trigger modal -->
    <h5 style="color: blue;">HISTORIAL DE CITAS</h5>
    <hr>
    <?php
    if (count($historial)==0) {
        echo "<h3 style='color:blue';>NO HAY HISTORIAL DE CITAS</h3>";
    }else{?>
        <div class="table-responsive">
            <table id="example" class="table table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Medico</th>
                        <th>Tipo de Historia</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($historial as $h) {
                        ?>

                        <tr>
                            <td><?= $h->citFecha; ?></td>
                            <td><?= $h->usuNombre . " " . $h->usuApellido; ?></td>
                            <?php if ($h->id_categoria_cups == 1 && $h->proceso_idProceso == 1){ ?>
                                <td><?php echo"ESPECIAL PRIMERA VEZ"; ?></td>
                            <?php }elseif ($h->id_categoria_cups == 2 && $h->proceso_idProceso == 1){ ?>
                             <td><?php echo"ESPECIAL CONTROL"; ?></td>
                         <?php }else{ ?>
                           <td><?= $h->proNombre ?></td>
                       <?php } ?>
                       <td><?= $h->citEstado; ?></td>
                   </tr>
                   <?php
               }
               ?>
           </tbody>
           <tfoot>
            <tr>
                <th>Fecha</th>
                <th>Medico</th>
                <th>Tipo de Historia</th>
                <th>Estado</th>
            </tr>
        </tfoot>
    </table>
</div>
<?php }?>
</div>