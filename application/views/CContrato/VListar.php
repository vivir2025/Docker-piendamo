<!-- Tabla presentación de la información -->
<!-- lists the contracts that the company has, can be updated and more contracts can be added with their respective information -->
<div class="container">
    <!-- Button trigger modal -->
    <h5 style="color: white;">LISTA DE CONTRATO</h5><hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar Contrato</button><br><br>

    <div  class="bg-light" >
    <!-- Modal Agregar -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div id=color  class="modal-content text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Formulario Contrato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('CContrato/agregar'); ?>
                    <p style="color: white;">Contrato</p>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>N° Contrato</label>
                            <input class="form-control" name="numero" type="text" placeholder="Numero Contrato" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Plan Beneficio</label>
                            <select name="plan" required="" class="form-control">
                              <option value="">[Seleccione]</option>
                              <option value="POS">POS</option>
                              <option value="NO POS">NO POS</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Poliza</label>
                            <input class="form-control" name="poliza" type="text" placeholder="Poliza" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Contratante</label>
                            <select class="form-control" name="empresa" required="">
                                <option value="">[Seleccione]</option>
                                <?php
                                foreach ($empresa as $empre) {
                                    echo "<option value={$empre->idEmpresa}>{$empre->empNombre}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Valor Contrato</label>
                            <input class="form-control" name="Valor" type="text" placeholder="Valor Contrato" required="">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Porcentaje Descuento</label>
                            <input class="form-control" name="descuento" type="text" placeholder="Porcentaje Descuento" required="">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tipo</label>
                            <select name="tipo" required="" class="form-control">
                              <option value="">[Seleccione]</option>
                              <option value="PGP">PGP</option>
                              <option value="EVENTO">EVENTO</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                            <label>Copago</label>
                            <select name="copago" required="" class="form-control">
                              <option value="">[Seleccione]</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                            </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Fecha Inicio</label>
                        <input class="form-control" name="fecha_inicio" type="date" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Fecha Finalizacion</label>
                        <input class="form-control" name="fecha_fin" type="date" required="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Descripcion</label>
                        <textarea class="form-control" required="" name="descripcion" placeholder="Descripcion"></textarea>       
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <input type="submit" name="submit" value="Agregar Contrato" class="btn btn-info" />
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Contrato</th>
                    <th>Contratante</th>
                    <th>Tipo</th>
                    <th>Inicio</th>
                    <th>Valor</th>
                    <th>Plan Beneficio</th>
                    <th>Ver</th>
                    <th>Agregar</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contrato as $contra) {
                ?>

                    <tr>
                        <td><?= $contra->conNumero; ?></td>
                        <td><?= $contra->empNombre; ?></td>
                        <td><?= $contra->conTipo; ?></td>
                        <td><?= $contra->conFechaInicio; ?></td>
                        <td><?= $contra->conValor; ?></td>
                        <td><?= $contra->conPlanBeneficio; ?></td>
                        <td><a class="btn btn-link" href="<?= base_url("index.php/CCups_Contratado/listar/$contra->idContrato") ?>">Ver Cups</a>
                        </td>

                        <td> 
                            <?php if ($contra->conEstado == 'ACTIVO'){ ?>
                             <a class="btn btn-link" href="<?= base_url("index.php/CCups_Contratado/guardar_vista/$contra->idContrato") ?>">Agregar Cups</a>           
                        <?php }else{ 
                            echo "<p style='color:red;'>Contrato desactivado</p>";
                        }?>

                        </td>

                        <td> 
                             <a class="btn btn-info" href="<?= base_url("index.php/CContrato/modRecuperar/$contra->idContrato") ?>">Actualizar</a>
                        </td>
                        <td>
                         <?php if ($contra->conEstado == 'ACTIVO'){ ?>
                        <a class="btn btn-danger" onclick="eliminar('<?php echo $contra->idContrato; ?>')"> Eliminar</a>
                         <?php } ?> 
                            
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Contrato</th>
                    <th>Contratante</th>
                    <th>Tipo</th>
                    <th>Inicio</th>
                    <th>Valor</th>
                    <th>Plan Beneficio</th>
                    <th>Ver</th>
                    <th>Agregar</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    function eliminar(id) {
        if (confirm('¿Desea eliminar el registro?')) {
            document.location.href = "<?php echo base_url() . 'index.php/CContrato/eliminar/' ?>" + id;
        }
    }
</script>
<style> #color
    {
    background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d)
    }

</style>
