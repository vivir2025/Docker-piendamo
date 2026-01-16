<!-- 
This is the view where the EPS with which they have an agreement are added and all their respective information can be updated and eliminated -->
<div class="container">
    <!-- Button trigger modal -->
    <h5 style="color: white;">LISTA DE EPS</h5><hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar EPS</button><br><br>
    <div  class="bg-light" >
    <!-- Modal Agregar -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div id=color class="modal-content text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Formulario EPS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('CEmpresa/agregar'); ?>
                    <p style="color: white;">EPS</p>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Nit</label>
                            <input class="form-control" name="nit" type="text" placeholder="Nit" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Codigo Entidad Administradora</label>
                            <input class="form-control" name="codigo1" type="text" placeholder="Codigo" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Codigo Habilitacion</label>
                            <input class="form-control" name="codigo2" type="text" placeholder="Codigo" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nombre</label>
                            <input class="form-control" name="nombre" type="text" placeholder="Nombre" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Direccion</label>
                            <input class="form-control" name="direccion" type="text" placeholder="Direccion" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Telefono</label>
                            <input class="form-control" name="telefono" type="text" placeholder="Telefono" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <input type="submit" name="submit" value="Agregar EPS" class="btn btn-info" />
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
         <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nit</th>
                    <th>Cod. Entidad Administradora</th>
                    <th>Cod. Habilitacion</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($empresa as $emp) {
                ?>

                    <tr>
                        <td><?= $emp->empNit; ?></td>
                        <td><?= $emp->empCodigoEAPB ?></td>
                        <td><?= $emp->empCodigo ?></td>
                        <td><?= $emp->empNombre ?></td>
                         <td> <?= $emp->empDireccion ?></td>
                        <td><?= $emp->empTelefono ?></td>
                        <td> 
                            <a class="btn btn-info" href="<?= base_url("index.php/CEmpresa/modRecuperar/$emp->idEmpresa") ?>">Actualizar</a>
                        </td>

                        <td> 
                            <a class="btn btn-danger" onclick="eliminar('<?php echo $emp->idEmpresa; ?>')"> Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nit</th>
                    <th>Codigo 1</th>
                    <th>Codigo 2</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
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
            document.location.href = "<?php echo base_url() . 'index.php/CEmpresa/eliminar/' ?>" + id;
        }
    }
</script>
<style> #color
    {
    background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d)
    }
</style>
