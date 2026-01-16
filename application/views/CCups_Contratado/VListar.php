<!-- Tabla presentación de la información -->
<!-- This is the view where the contracted cups are listed and searched by name  -->
<div class="container"> <!-- Button trigger modal -->
    <h5 style="color: WHITE;">LISTA DE CUPS CONTRATO</h5>
    <hr><br>
    <div class="table-responsive bg-light">
        <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cups</th>
                    <th>Tarifa</th>
                    <th>Categoria</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cups_contratado as $cup_cont) {
                ?>

                    <tr>
                        <td> <?= $cup_cont->cupNombre; ?></td>
                        <td> <?= $cup_cont->cupTarifa; ?></td>
                        <td> <?= $cup_cont->catNombre; ?> </td>
                        <td>
                            <a class="btn btn-info" href="<?= base_url("index.php/CCups_Contratado/modRecuperar/$cup_cont->id_cups_contrato") ?>">Actualizar</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="eliminar('<?php echo $cup_cont->id_cups_contrato; ?>')"> Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Cups</th>
                    <th>Tarifa</th>
                    <th>Categoria</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <hr>
    <div class="form-row">

        <div class="form-group col-md-12">
            <a href="<?= base_url("index.php/CContrato") ?>" class="btn btn-danger">Regresar...</a>
        </div>
    </div>
</div>

<script type="text/javascript">
    function eliminar(id) {
        if (confirm('¿Desea eliminar el registro?')) {
            document.location.href = "<?php echo base_url() . 'index.php/CCups_Contratado/eliminar/' ?>" + id;
        }
    }
</script>