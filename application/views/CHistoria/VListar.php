
<!-- This view lists the appointments assigned to the health professional to initialize them ... -->
<div class="container">

    <h5 style="color: white;">AGENDA <?php echo date("Y-m-d  h:i:s a", time()); ?></h5>
    <hr>

    
    <div class="form-row bg-light">
        <div id="mens_cita"></div>
    </div>
</div>
<script type='text/javascript'>
    /*function eliminar(id_his_med) {
        if (confirm('¿Desea eliminar el medicamento?')) {

            $.ajax({
                url: "<?php echo base_url() . 'index.php/CHistoria/eliminar_medicamento'; ?>",
                type: 'POST',
                data: {
                    id_his_med: id_his_med
                },
                success: function(result) {
                    //location.reload(); 

                    nota_adicional(id_his_med); 
                    $("#lista_medicamento").load(" #lista_medicamento");
                    $("#mens").html(result);
                }
            });
        }
    }

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
                    $("#mens").html(result);
                    $("#refresh").load(" #refresh");

                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $("#mens").html(html);

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
                    $('#exampleModal').modal('hide');
                    $('#mens_nota_adicional').hide();

                    //$("#mens").html(result);
                }
            });

        } else {

            html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            $('#mens_nota_adicional').show();
            $("#mens_nota_adicional").html(html);

        }

    });

    $.ajax({
        url: "<?php echo base_url() . 'index.php/CHistoria/agenda_cita'; ?>",
        type: 'POST',

        success: function(result) {

            //console.log(result);
            $("#mens_cita").html(result);
        }
    });


    function nota_adicional(id_hc) {


        $("#id_hc").val(id_hc);

        //alert(id_hc)

        if ($("#id_hc").val() != "") {
            $.ajax({
                url: '<?= base_url() ?>index.php/CHistoria/mostrar_medicamento',
                method: 'post',
                data: {
                    id_hc: $("#id_hc").val()
                },
                dataType: 'json',
                success: function(mensaje) {

                    console.log(mensaje);

                    var html = "<table class='table table-bordered'>";
                    html += "<thead>";
                    html += "<th>MEDICAMENTO</th>";
                    html += "<th>CANTIDAD</th>";
                    html += "<th colspan='2'>OPCION</th>";
                    html += "</thead>";
                    html += "<tbody>";
                    for (key in mensaje) {
                        html += "<tr>";
                        html += "<td>" + mensaje[key].medNombre + "</td>";
                        html += "<td>" + mensaje[key].hisMedCantidad + "</td>";
                        html += "<td>" + mensaje[key].hisMedDosis + "</td>";
                        html += "<td><button type='button' class='btn btn-outline-primary btn-view-medicamento' value='$d->id_his_med' data-toggle='modal' data-target='#modal_medicamento'>Editar</button>";
                        html += "<td><a class='btn btn-outline-danger' onclick='eliminar(" + mensaje[key].id_his_med + ")'>Eliminar</a></td>";
                        html += "</tr>";
                    }
                    html += "</tbody>";
                    html += "</table>";
                    html += "</br>";
                    //$('#lista_medicamento').show();
                    $("#lista_medicamento").html(html);
                    $('#lista_medicamento').show();
                }
            });
        }

    }*/

    $.ajax({
        url: "<?php echo base_url() . 'index.php/CHistoria/agenda_cita'; ?>",
        type: 'POST',

        success: function(result) {

            //console.log(result);
            $("#mens_cita").html(result);
        }
    });

    function verValoracion(idCita, id_cat_cups, idProceso, pacDocumento) {

        //console.log(idCita + "-" + id_cat_cups + "-" + idProceso + "-" +pacDocumento);

        if (idProceso == 1) {

            if (confirm('¿Realmente desea iniciar la cita?')) {

                if (id_cat_cups == 1) {
                    window.location.replace("<?php echo base_url() . 'index.php/CHistoria/primera_vez_hta/' ?>" + idCita)
                } else {

                    $.ajax({
                        url: '<?= base_url() ?>index.php/CHistoria/primeraVez_control',
                        method: 'post',
                        data: {
                            pacDocumento: pacDocumento
                        },
                        dataType: 'json',

                        success: function(data) {

                            var len = data.length;

                            if (len > 0) {

                                //console.log(idCita);
                                window.location.replace("<?php echo base_url() . 'index.php/CHistoria/control_hta/' ?>" + idCita)
                            }
                        }
                    });

                }
            }

        } else if (idProceso == 2) {

            if (confirm('¿Realmente desea iniciar la cita?')) {

                if (id_cat_cups == 1) {
                    window.location.replace("<?php echo base_url() . 'index.php/CHistoria/trabajo_social/' ?>" + idCita)
                } else {

                    $.ajax({
                        url: '<?= base_url() ?>index.php/CHistoria/primeraVez_control1',
                        method: 'post',
                        data: {
                            pacDocumento: pacDocumento
                        },
                        dataType: 'json',

                        success: function(data) {

                            var len = data.length;

                            if (len > 0) {

                                //console.log(idCita);
                                window.location.replace("<?php echo base_url() . 'index.php/CHistoria/trabajo_social_control/' ?>" + idCita)
                            }
                        }
                    });

                }
            }

        } else if (idProceso == 3) {

            if (confirm('¿Realmente desea iniciar la cita?')) {

                window.location.replace("<?php echo base_url() . 'index.php/CHistoria/reformulacion/' ?>" + idCita)

            }


        } else if (idProceso == 4) {

            if (confirm('¿Realmente desea iniciar la cita?')) {

                if (id_cat_cups == 1) {
                    window.location.replace("<?php echo base_url() . 'index.php/CHistoria/nutricionista/' ?>" + idCita)
                } else {

                    $.ajax({
                        url: '<?= base_url() ?>index.php/CHistoria/primeraVez_control1',
                        method: 'post',
                        data: {
                            pacDocumento: pacDocumento
                        },
                        dataType: 'json',

                        success: function(data) {

                            var len = data.length;

                            if (len > 0) {
                                //console.log(idCita);
                                window.location.replace("<?php echo base_url() . 'index.php/CHistoria/nutricionista_control/' ?>" + idCita)
                            }
                        }
                    });
                }
            }

        } else if (idProceso == 13) {

if (confirm('¿Realmente desea iniciar la cita?')) {

    if (id_cat_cups == 1) {
        window.location.replace("<?php echo base_url() . 'index.php/CHistoria/FISIOTERAPIA/' ?>" + idCita)
    } else {

        $.ajax({
            url: '<?= base_url() ?>index.php/CHistoria/primeraVez_control1',
            method: 'post',
            data: {
                pacDocumento: pacDocumento
            },
            dataType: 'json',

            success: function(data) {

                var len = data.length;

                if (len > 0) {
                    //console.log(idCita);
                    window.location.replace("<?php echo base_url() . 'index.php/CHistoria/Fisioterapia_control/' ?>" + idCita)
                }
            }
        });
    }
}

        } else if (idProceso == 5) {

            if (confirm('¿Realmente desea iniciar la cita?')) {

                if (id_cat_cups == 1) {
                    window.location.replace("<?php echo base_url() . 'index.php/CHistoria/psicologia/' ?>" + idCita)
                } else {

                    $.ajax({
                        url: '<?= base_url() ?>index.php/CHistoria/primeraVez_control1',
                        method: 'post',
                        data: {
                            pacDocumento: pacDocumento
                        },
                        dataType: 'json',

                        success: function(data) {

                            var len = data.length;

                            if (len > 0) {
                                //console.log(idCita);
                                window.location.replace("<?php echo base_url() . 'index.php/CHistoria/psicologia_control/' ?>" + idCita)
                            }
                        }
                    });
                }
            }
        } else if (idProceso == 6) {

            if (confirm('¿Realmente desea iniciar la cita?')) {

                window.location.replace("<?php echo base_url() . 'index.php/CHistoria/historia_clinica/' ?>" + idCita)

            }

        } else if (idProceso == 7) {

            if (confirm('¿Realmente desea iniciar la cita?')) {

                window.location.replace("<?php echo base_url() . 'index.php/CHistoria/historia_clinica/' ?>" + idCita)

            }

        }
    }
</script>
