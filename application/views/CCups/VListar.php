<!-- Tabla presentación de la información -->
<!-- This is the view where it lists the cups that the IPS performs where the CRUD of Updating Delete and Add is -->
<div class="container">
    <!-- Button trigger modal -->
    <h5 style="color: white;">LISTA DE CUPS</h5>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar Cups</button><br><br>
    <div  class="bg-light" >

    <!-- Modal Agregar -->
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div id=color class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-blue" id="myLargeModalLabel">Formulario Cups</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-white">
                    <?php echo form_open_multipart('CCups/agregar'); ?>
                    <p style="color: black;">Cups</p>
                    <div class="form-row text-dark">
                        <div class="form-group col-md-2">
                            <label for="inputEmail4">Codigo</label>
                            <input class="form-control" name="codigo" type="text" placeholder="Codigo" required="">
                        </div>
                        <div class="form-group col-md-10">
                            <label for="inputEmail4">Nombre</label>
                            <input class="form-control" name="nombre" type="text" placeholder="Nombre" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <input type="submit" name="submit" value="Agregar Cups" class="btn btn-info" />
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cup</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cups as $c) {
                ?>

                    <tr>
                        <td><?= $c->cupCodigo; ?></td>
                        <td><?= $c->cupNombre ?></td>
                        <td> <a class="btn btn-info" href="<?= base_url("index.php/CCups/modRecuperar/$c->idCups") ?>">Actualizar</a>
                        </td>

                        <td> <a class="btn btn-danger" onclick="eliminar('<?php echo $c->idCups; ?>')"> Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Codigo</th>
                    <th>Cup</th>
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
            document.location.href = "<?php echo base_url() . 'index.php/CCups/eliminar/' ?>" + id;
        }
    }
</script>