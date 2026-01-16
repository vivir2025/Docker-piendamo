<style>
      .form-group {
            position: relative;
        }

        .microfono {
            position: absolute;
            top: 50%; /* Centra verticalmente el ícono */
            right: 10px; /* Ajusta la posición horizontal del ícono */
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            background-color: transparent;
            background-image: url('http://45.167.125.238/ips/assets/img/micro2.ico'); /* Ruta a la imagen del micrófono inactivo */
            background-size: cover;
            cursor: pointer;
            z-index: 1;
            display: inline-block; /* Para que el icono se ajuste al tamaño del contenido */
            transition: transform 0.3s ease-in-out;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(0, 0, 255, 0.7);
        }

        .microfono.active {
            animation: pulse 1s infinite; /* Aplica la animación cuando está activo */
            background-image: url('http://45.167.125.238/ips/assets/img/micro2.ico'); /* Ruta a la imagen del micrófono activo */
            box-shadow: 0 0 0 10px rgba(0, 0, 255, 0); /* Restaura la sombra */
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                box-shadow: 0 0 0 0 rgba(0, 0, 255, 0.7);
            }
            50% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(0, 0, 255, 0);
            }
            100% {
                transform: scale(0.8);
                box-shadow: 0 0 0 0 rgba(0, 0, 255, 0.7);
            }
        }

        .form-control {
            padding-right: 40px; /* Ajusta el espacio para el ícono */
            z-index: 0;
        }
</style>
<div class="container bg-light">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);"  >
    <h5 style="color: blue;">DATO ADICIONAL</h5>
    <hr>

    <form>
        <input name='id_hc' id="id_hc" value="<?= $id_hc ?>" hidden />
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Nota Adicional:</label>
                <textarea class="form-control" name="adicional" id="adicional" type="text" required="" placeholder="Digite la Nota Adicional o dar clic al microfono para esta Historia Clinica" rows="2"></textarea>
                <span class="microfono" id="microfono"></span>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-primary" id="nota_adicional">Guardar</a>
        </div>
    </form>

    <div class="col-sm-12 ">
        <?php if ($proceso_idProceso === 1 || $proceso_idProceso == 2 || $proceso_idProceso == 3 || $proceso_idProceso == 4 || $proceso_idProceso == 6 || $proceso_idProceso == 7) { ?>

            <h5>MEDICAMENTO</h5>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <th>MEDICAMENTO</th>
                    <th>CANTIDAD</th>
                    <th>DOSIS</th>
                    <th>OPCIÓN</th>
                </thead>
                <tr>
                    <form>
                        <td>
                            <input type="text" name="idMedicamento" id="idMedicamento" hidden="">
                            <input type="text" id="medicamento" name="medicamento" onKeyUp="buscar();" class="form-control" placeholder="Medicamento" size="80" />
                            <div id="lista_nombre" style="display: none;">

                            </div>
                        </td>
                        <td>
                            <input type="text" id="cantidad" name="cantidad" class="form-control" value="0" required="" />
                        </td>
                        <td>
                            <input type="text" id="dosis" name="dosis" class="form-control" placeholder="Dosis" />
                        </td>
                        <td>
                            <a id="add" class="btn btn-outline-info">Agregar</a>
                        </td>
                    </form>
                </tr>
            </table><br><br>

            <div id="accordion">
                <div class="card card-white">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="btn btn-default btn-sm collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                                Click Lista Medicamento
                            </a>
                        </h5>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <br>
                        <div class="container">
                            <table class="table table-bordered" id="data">
                                <thead>
                                <th> <input type="checkbox" id="seleccionarTodos" class="checkRedondo"> SELECCIONAR</th>
                                    <th>MEDICAMENTO</th>
                                    <th>CANTIDAD</th>
                                    <th>DOSIS</th>
                                    <th>OPCIÓN</th>
                                </thead>
                                <tbody>
                                <?php
                        foreach ($medicamento_historia as $mh) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' class='checkEliminar' value='{$mh->id_his_med}' style='border-radius: 50%;'></td>";
                            echo "<td>" . $mh->medNombre . "</td>";
                            echo "<td>" . $mh->hisMedCantidad . "</td>";
                            echo "<td>" . $mh->hisMedDosis . "</td>";
                            echo "<td><button type='button' class='btn btn-outline-primary btn-view-medicamento' value='$mh->id_his_med' data-toggle='modal' data-target='#modal_medicamento'>Editar</button></td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "</tr>";
                        }
                        ?>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                            <a class="btn btn-outline-danger" onclick='eliminarSeleccionados("{$mh->id_his_med}")' style="border-radius: 50px;">Eliminar </a>
                </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
        <br>
        <?php if ($proceso_idProceso == 1 || $proceso_idProceso == 3 || $proceso_idProceso == 6 || $proceso_idProceso == 7) { ?>

            <h5>AYUDA DIAGNOSTICA</h5>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <th>CUPS</th>
                    <th>OBSERVACIÓN</th>
                    <th>OPCIÓN</th>
                </thead>
                <tr>
                    <form>
                        <td>

                            <input type="text" name="idCups" id="idCups" hidden="">
                            <input type="text" id="cup" name="cup" onKeyUp="buscar_cups();" class="form-control" placeholder="Remision" />
                            <div id="lista_nombre_cups" style="display: none;">

                            </div>
                        </td>
                        <td>
                            <input type="text" name="cupObservacion" id="cupObservacion" placeholder="Observacion" class="form-control">

                        </td>
                        <td>
                            <a id="add_cups" class="btn btn-outline-info">Agregar</a>
                        </td>
                    </form>
                </tr>
            </table><br>
            <div id="accordion">
                <div class="card card-white">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="btn btn-default btn-sm collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne">
                                Click Lista Ayudas Diagnostica
                            </a>
                        </h5>
                    </div>

                    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <br>
                        <div class="container">
                            <table class="table table-bordered" id="data2">
                                <thead>
                                <th><input type="checkbox" id="ayudaTodos" class="checkRedondo"> SELECCIONAR</th>
                                    <th>CÓDIGO</th>
                                    <th>CUPS</th>
                                    <th>OBSERVACIÓN</th>
                                    <th>OPCIÓN</th>
                                </thead>
                                <tbody>

                                <?php
                                    foreach ($cups_historia as $ch) {

                                        echo "<tr>";
                                        echo "<td><input type='checkbox' class='checkEliminar' value='{$ch->id_his_cups}' style='border-radius: 50%;'></td>";
                                        echo "<td>" . $ch->cupCodigo . "</td>";
                                        echo "<td>" . $ch->cupNombre . "</td>";
                                        echo "<td>" . $ch->cupObservacion . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <div class="modal-footer">
                            <a class="btn btn-outline-danger" onclick='eliminarAyudas("{$ch->id_his_cups}")' style="border-radius: 50px;">Eliminar </a>
                </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <br>
      <?php if ($proceso_idProceso == 1 || $proceso_idProceso == 3 || $proceso_idProceso == 6 || $proceso_idProceso == 7) { ?>

                    <h5>MEDICAMENTOS</h5>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                        <th>MEDICAMENTO</th>
                        <th>CANTIDAD</th>
                        <th>DOSIS</th>
                        <th>OPCIÓN</th>
                        </thead>
                        <tr>
                        <form>
                            <td>
                                <input type="text" name="idMedicamento" id="idMedicamento" hidden="">
                                <input type="text" id="medicamento" name="medicamento" onKeyUp="buscar();" class="form-control" placeholder="Medicamento" size="80" />
                                <div id="lista_nombre" style="display: none;">

                                </div>
                            </td>
                            <td>
                                <input type="text" id="cantidad" name="cantidad" class="form-control" value="0" required="" />
                            </td>
                            <td>
                                <input type="text" id="dosis" name="dosis" class="form-control" placeholder="Dosis" />
                            </td>
                            <td>
                                <a id="add" class="btn btn-outline-info">Agregar</a>
                            </td>
                    </form>
                        </tr>
                    </table><br>

                   <div id="accordion">
                <div class="card card-white">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="btn btn-default btn-sm collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                                Click Lista Medicamento
                            </a>
                        </h5>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <br>
                        <div class="container">
                            <table class="table table-bordered" id="data">
                                <thead>
                                <th> <input type="checkbox" id="seleccionarTodos" class="checkRedondo"> SELECCIONAR</th>
                                    <th>MEDICAMENTO</th>
                                    <th>CANTIDAD</th>
                                    <th>DOSIS</th>
                                    <th>OPCIÓN</th>
                                </thead>
                                <tbody>
                                <?php
                        foreach ($medicamento_historia as $mh) {
                            echo "<tr>";
                            echo "<td><input type='checkbox' class='checkEliminar' value='{$mh->id_his_med}' style='border-radius: 50%;'></td>";
                            echo "<td>" . $mh->medNombre . "</td>";
                            echo "<td>" . $mh->hisMedCantidad . "</td>";
                            echo "<td>" . $mh->hisMedDosis . "</td>";
                            echo "<td><button type='button' class='btn btn-outline-primary btn-view-medicamento' value='$mh->id_his_med' data-toggle='modal' data-target='#modal_medicamento'>Editar</button></td>";
                           
                            echo "</tr>";
                            echo "<tr>";
                            echo "</tr>";
                        }
                        ?>
                                </tbody>
                            </table>
                            <div class="modal-footer">
                            <a class="btn btn-outline-danger" onclick='eliminarSeleccionados("{$mh->id_his_med}")' style="border-radius: 50px;">Eliminar </a>
                </div>
                        </div>
                    </div>
                </div>
            </div>
                    <?php } ?>
                    <br>
        <?php if ($proceso_idProceso == 1 || $proceso_idProceso == 3 || $proceso_idProceso == 4 || $proceso_idProceso == 6 || $proceso_idProceso == 7) { ?>

            <h5>Remisión</h5>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <th>REMISIÓN</th>
                    <th>OBSERVACIÓN</th>
                    <th>OPCIÓN</th>
                </thead>
                <tr>
                    <form>
                        <td>

                            <input type="text" name="idRemision" id="idRemision" hidden="">
                            <input type="text" id="remision" name="remision" onKeyUp="buscar_remision();" class="form-control" placeholder="Remision" />
                            <div id="lista_nombre_remision" style="display: none;">

                            </div>
                        </td>
                        <td>
                            <input type class="form-control" name="remObservacion" id="remObservacion" placeholder="Observacion" />
                        </td>
                        <td>
                            <a id="add_remision" class="btn btn-outline-info">Agregar</a>
                        </td>
                    </form>
                </tr>
            </table><br>
            <div id="accordion">
                <div class="card card-white">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="btn btn-default btn-sm collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
                                Click Lista Remisión

                            </a>
                        </h5>
                    </div>

                    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <br>
                        <div class="container">
                            <table class="table table-bordered" id="data3">
                                <thead>
                                <th> <input type="checkbox" id="remisionTodos" class="checkRedondo"> SELECCIONAR</th>
                                    <th>CÓDIGO</th>
                                    <th>REMISIÓN</th>
                                    <th>OBSERVACIÓN</th>
                                    <th>OPCIÓN</th>
                                </thead>
                                <tbody>

                                <?php
                                    foreach ($remision_historia as $r) {

                                        echo "<tr>";
                                        echo "<td><input type='checkbox' class='checkEliminar' value='{$r->id_his_rem}' style='border-radius: 50%;'></td>";
                                        echo "<td>". $r->remCodigo . "</td>";
                                        echo "<td>" . $r->remNombre . "</td>";
                                        echo "<td>" . $r->remObservacion . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <div class="modal-footer">
                            <a class="btn btn-outline-danger" onclick='eliminarRemisiones("{$r->id_his_rem}")' style="border-radius: 50px;">Eliminar </a>
                </div>
                        </div>
                    </div>
                </div>
            </div><br>
        <?php } ?>
    </div>
    <hr>
    <a href="<?= base_url("index.php/CHistoria/") ?>" class="btn btn-primary"> [Volver]</a>

</div>
<script type='text/javascript'>
    // function eliminar_remision(id_his_rem) {
    //     if (confirm('¿Desea eliminar la remision?')) {

    //         $.ajax({

    //             type: 'POST',
    //             data: {
    //                 id_his_rem: id_his_rem
    //             },
    //             success: function(result) {
    //                 $("#data3").load(" #data3");
    //                 alert("Elemento eliminado correctamente!!!")
    //             }
    //         });
    //     }
    // }

    $("#add_remision").click(function() {

        idRemision = $("#idRemision").val();
        idHistoria = $("#id_hc").val();
        remision = $("#remision").val();
        observacion = $("#remObservacion").val();

        if (idRemision != "" && remision != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/agregar_remision'; ?>",
                type: 'POST',
                data: {
                    idRemision: idRemision,
                    idHistoria: idHistoria,
                    observacion: observacion
                },

                success: function(result) {

                    $('#idRemision').val("");
                    $('#remision').val("");
                    $('#remObservacion').val("");
                    $("#data3").load(" #data3");
                    alert("Elemento registrado correctamente!!!")


                }
            });

        } else {



            alert("No deje campos vacios")

        }

    });

    function elemento_selecionado_remision(object) {
        dato_remision = (object.id).split('&');

        idRemision = dato_remision[0];
        remNombre = dato_remision[1];

        $('#idRemision').val(idRemision);
        $('#remision').val(remNombre);
        $('#lista_nombre_remision').hide();
    }

    function buscar_remision() {
        var remision = $("input#remision").val();

        if (remision != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_remision") ?>", {
                remision: remision

            }, function(mensaje) {
                $('#lista_nombre_remision').show();
                $("#lista_nombre_remision").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idRemision').val("");
            $('#remision').val("");
            $('#lista_nombre_remision').hide();
        }

    };
  

    $("#add_cups").click(function() {

        idCups = $("#idCups").val();
        idHistoria = $("#id_hc").val();
        cup = $("#cup").val();
        observacion = $("#cupObservacion").val();

        if (idCups != "" && cup != "") {

            //alert(idCups +"__"+ cup)

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/agregar_cups'; ?>",
                type: 'POST',
                data: {
                    idCups: idCups,
                    idHistoria: idHistoria,
                    observacion: observacion
                },

                success: function(result) {

                    $('#idCups').val("");
                    $('#cup').val("");
                    $('#cupObservacion').val("");
                    $("#data2").load(" #data2");
                    alert("Elemento registrado correctamente!!!")

                }
            });

        } else {

            alert("No deje campos vacios!!!")

        }

    });

    function elemento_selecionado_cups(object) {
        dato_cups = (object.id).split('&');

        idCups = dato_cups[0];
        cupNombre = dato_cups[1];

        $('#idCups').val(idCups);
        $('#cup').val(cupNombre);
        $('#lista_nombre_cups').hide();
    }

    function buscar_cups() {
        var cups = $("input#cup").val();

        if (cups != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_cups") ?>", {
                cups: cups

            }, function(mensaje) {
                $('#lista_nombre_cups').show();
                $("#lista_nombre_cups").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idCups').val("");
            $('#cup').val("");
            $('#lista_nombre_cups').hide();
        }

    };

    //En globo la parte de seleccion para los medicamentos
    $(document).ready(function() {
    // Delegación de eventos para seleccionar/deseleccionar todos los checkboxes
    $(document).on('change', '#seleccionarTodos', function() {
        $('.checkEliminar').prop('checked', this.checked);
    });


});

    // Función para eliminar medicamentos al confirmar la acción
    function eliminarSeleccionados() {
    var seleccionados = [];

    // Iterar sobre los checkboxes y obtener los seleccionados
    $('.checkEliminar:checked').each(function() {
        seleccionados.push($(this).val()); // Añadir el valor del checkbox a la lista de seleccionados
    });

    if (seleccionados.length > 0 && confirm('¿Desea eliminar los medicamentos seleccionados?')) {
        $.ajax({
            url: "<?php echo base_url() . 'index.php/CHistoria/eliminar_medicamento'; ?>",
            type: 'POST',
            data: {
                id_his_med: seleccionados // Enviar la lista de IDs a eliminar
            },
            success: function(result) {
                $("#mens").html(result);
                $("#data").load(" #data");
            }
        });
    }
}
  // En globo el funcionamiento de ayudas diagnosticas
  $(document).ready(function() {
    // Delegación de eventos para seleccionar/deseleccionar todos los checkboxes
    $(document).on('change', '#ayudaTodos', function() {
        $('.checkEliminar').prop('checked', this.checked);
    });


});
    // Función para eliminar ayudas diagnósticas al confirmar la acción
    function eliminarAyudas() {
        var seleccionados = [];

        // Iterar sobre los checkboxes de ayudas diagnósticas y obtener los seleccionados
        $('.checkEliminar:checked').each(function() {
            seleccionados.push($(this).val()); // Añadir el valor del checkbox a la lista de seleccionados
        });

        if (seleccionados.length > 0 && confirm('¿Desea eliminar las ayudas diagnósticas seleccionadas?')) {
            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/eliminar_cups'; ?>",
                type: 'POST',
                data: {
                    id_his_cups: seleccionados // Enviar la lista de IDs a eliminar
                },
                success: function(result) {
                    $("#mens").html(result);
                    $("#data2").load(" #data2");
                }
            });
        }
    }

    // Asociar la función eliminarAyudas() al evento click del botón de eliminar ayudas diagnósticas
    $('#botonEliminarAyudas').on('click', function() {
        eliminarAyudas();
    });



    //En globo la parte de seleccion para los medicamentos
    $(document).ready(function() {
    // Delegación de eventos para seleccionar/deseleccionar todos los checkboxes
    $(document).on('change', '#seleccionarTodos', function() {
        $('.checkEliminar').prop('checked', this.checked);
    });


});

    // Función para eliminar medicamentos al confirmar la acción
    function eliminarSeleccionados() {
    var seleccionados = [];

    // Iterar sobre los checkboxes y obtener los seleccionados
    $('.checkEliminar:checked').each(function() {
        seleccionados.push($(this).val()); // Añadir el valor del checkbox a la lista de seleccionados
    });

    if (seleccionados.length > 0 && confirm('¿Desea eliminar los medicamentos seleccionados?')) {
        $.ajax({
            url: "<?php echo base_url() . 'index.php/CHistoria/eliminar_medicamento'; ?>",
            type: 'POST',
            data: {
                id_his_med: seleccionados // Enviar la lista de IDs a eliminar
            },
            success: function(result) {
                $("#mens").html(result);
                $("#data").load(" #data");
            }
        });
    }
}
//En globo la parte del funcionamiento de selelcion de remision

$(document).ready(function() {
    // Delegación de eventos para seleccionar/deseleccionar todos los checkboxes
    $(document).on('change', '#remisionTodos', function() {
        $('.checkEliminar').prop('checked', this.checked);
    });


});

    // Función para eliminar remisiones al confirmar la acción
    function eliminarRemisiones() {
        var seleccionados = [];

        // Iterar sobre los checkboxes de remisiones y obtener los seleccionados
        $('.checkEliminar:checked').each(function() {
            seleccionados.push($(this).val()); // Añadir el valor del checkbox a la lista de seleccionados
        });

        if (seleccionados.length > 0 && confirm('¿Desea eliminar las remisiones seleccionadas?')) {
            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/eliminar_remision'; ?>",
                type: 'POST',
                data: {
                    id_his_rem: seleccionados // Enviar la lista de IDs a eliminar
                },
                success: function(result) {
                    $("#mens").html(result);
                    $("#data3").load(" #data3");
                }
            });
        }
    }

    // Asociar la función eliminarRemisiones() al evento click del botón de eliminar remisiones
    $('#botonEliminarRemisiones').on('click', function() {
        eliminarRemisiones();
    });

//


    $("#add").click(function() {

        idMedicamento = $("#idMedicamento").val();
        cantidad = $("#cantidad").val();
        idHistoria = $("#id_hc").val();
        dosis = $("#dosis").val();
        medicamento = $("#medicamento").val();

        if (cantidad != "" && dosis != "" && medicamento != "") {

            if (idMedicamento == "") {

                var idMedicamento = 0;

            }

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/agregar_medicamento'; ?>",
                type: 'POST',
                data: {
                    idMedicamento: idMedicamento,
                    cantidad: cantidad,
                    idHistoria: idHistoria,
                    dosis: dosis,
                    medicamento: medicamento
                },

                success: function(result) {

                    $('#idMedicamento').val("");
                    $('#medicamento').val("");
                    $('#cantidad').val("0");
                    $('#dosis').val("");
                    $("#data").load(" #data");
                    alert("Elemento registrado correctamente!!!")
                }
            });

        } else {

            alert("No deje campos vacios!!!")

        }

    });


    function buscar() {
        var medicamento = $("input#medicamento").val();

        if (medicamento != "") {
            $.post("<?= base_url("index.php/CHistoria/buscar_medicamento") ?>", {
                medicamento: medicamento

            }, function(mensaje) {
                $('#lista_nombre').show();
                $("#lista_nombre").html(mensaje);

                //console.log(mensaje);
            });
        } else {
            $('#idMedicamento').val("");
            $('#medicamento').val("");
            $('#lista_nombre').hide();
        }

    };

    function elemento_selecionado(object) {
        dato_medicamento = (object.id).split('&');

        idMedicamento = dato_medicamento[0];
        medNombre = dato_medicamento[1];


        $('#idMedicamento').val(idMedicamento);
        $('#medicamento').val(medNombre);
        $('#lista_nombre').hide();
    }


    $("#nota_adicional").click(function() {

        id_hc = $("#id_hc").val();
        nota = $("#adicional").val();

        if (id_hc != "" && nota != "") {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/nota_adicional'; ?>",
                type: 'POST',
                data: {
                    id_hc: id_hc,
                    nota: nota
                },

                success: function(result) {

                    //console.log(result);

                    $("#id_hc").val("");
                    $("#adicional").val("");
                    alert("Elemento registrado correctamente!!!")
                    //$("#mens").html(result);
                }
            });

        } else {

            alert("No deje campos vacios")

        }

    });
    const botonMicrofono = document.getElementById('microfono');
        const campoTexto = document.getElementById('adicional');

        let recognition = null;

        botonMicrofono.addEventListener('click', function() {
            if (!recognition) {
                if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
                    recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();

                    recognition.lang = 'es-ES'; // Establecer el idioma del reconocimiento (español)

                    recognition.onstart = function() {
                        botonMicrofono.classList.add('active');
                    };

                    recognition.onend = function() {
                        botonMicrofono.classList.remove('active');
                    };

                    recognition.onresult = function(event) {
                        const transcript = event.results[0][0].transcript;
                        campoTexto.value += ' ' + transcript;
                    };

                    recognition.start();
                } else {
                    alert('El reconocimiento de voz no es compatible con este navegador.');
                }
            } else {
                recognition.stop();
                recognition = null;
            }
        });
</script>