<!-- This view lists the different options by document number such as print, view home visits and all the information about the patients. ... -->
<div class="container">

    <hr>
    <h5 style="color: white;">CONSULTAS Y/O HISTORIAL POR DOCUMENTO PACIENTE</h5>
    <hr>
    <div class="form-row">
        <label class="col-sm-2 col-form-label text-white">Documento:</label>
        <div class="input-group col-sm-10 ">
            <input class="form-control" type="text" id="documento" placeholder="Documento" required="">
            <div class="input-group-append">
                <body onkeyup="buscar_paciente()"></body>
            </div>
        </div>
        
    </div><br>
    <div>
    <div  id="resultado" style="display: none;"></div>
</div> 

<script type='text/javascript'>
    function buscar_paciente() {
        var documento = $('#documento').val();

        //alert(documento);

        $.post("<?= base_url("index.php/CHistorial/buscar_paciente") ?>", {
            documento: documento
        }, function(data) {

            //console.log(data);
            $('#resultado').show();
            $("#resultado").html(data);
        });
    }

    function verHistoriaCompleta(id_hc,id_proceso) {

        document.location.href = "<?php echo base_url() . 'index.php/CHistoria/imprimir_historia_clinica_historial/' ?>" + id_hc;


    }
    function verParaclinicos(id_hc,id_cat_cups, id_proceso) {

        
        document.location.href = "<?php echo base_url(). 'index.php/CHistoria/lista_paraclinico/' ?>"+ id_hc , id_hcs_paraclinico;


 }

    function verVisitas(id_hc,id_hcs_visitas, id_cat_cups, id_proceso) {

        
        document.location.href = "<?php echo base_url(). 'index.php/CHistoria/Lista_Visitas/' ?>"+ id_hc , id_hcs_visitas;


}

function Fisioterapia(id_hc) {

        
document.location.href = "<?php echo base_url(). 'index.php/CHistoria/Lista_Visitas/' ?>"+ id_hc ;


}


function vervistaparaclinico(id_hc,id_cat_cups, id_proceso) {

    
    document.location.href = "<?php echo base_url(). 'index.php/CHistoria/vistaparaclinico/' ?>"+ id_hc , id_hcs_paraclinico;


}

    
    function verValoracion(id_hc, id_cat_cups, id_proceso) {


        if (id_proceso == 1) {

            if (id_cat_cups == 1) {

                url = "<?php echo base_url() . 'index.php/CHistorial/hc_1/' ?>" + id_hc;
                window.open(url, "HISTORIAL HC", "width=800, height=400")

            } else {

                url = "<?php echo base_url() . 'index.php/CHistorial/hc_2/' ?>" + id_hc;
                window.open(url, "HISTORIAL HC", "width=800, height=400")

            }

        } else if (id_proceso == 2) {

            if (id_cat_cups == 1) {

                url = "<?php echo base_url() . 'index.php/CHistorial/hc_6/' ?>" + id_hc;
                window.open(url, "HISTORIAL HC", "width=800, height=400")

            } else {

                url = "<?php echo base_url() . 'index.php/CHistorial/hc_8/' ?>" + id_hc;
                window.open(url, "HISTORIAL HC", "width=800, height=400")

            }


        } else if (id_proceso == 3) {

            url = "<?php echo base_url() . 'index.php/CHistorial/hc_7/' ?>" + id_hc;


            window.open(url, "HISTORIAL HC", "width=800, height=400")


        } else if (id_proceso == 4) {


            if (id_cat_cups == 1) {

                url = "<?php echo base_url() . 'index.php/CHistorial/hc_9/' ?>" + id_hc;
                window.open(url, "HISTORIAL HC", "width=800, height=400")

            } else {

                url = "<?php echo base_url() . 'index.php/CHistorial/hc_11/' ?>" + id_hc;
                window.open(url, "HISTORIAL HC", "width=800, height=400")

            }
        } else if (id_proceso == 13) {


if (id_cat_cups == 1) {

    url = "<?php echo base_url() . 'index.php/CHistorial/hc_12/' ?>" + id_hc;
    window.open(url, "HISTORIAL HC", "width=800, height=400")

} else {

    url = "<?php echo base_url() . 'index.php/CHistorial/hc_13/' ?>" + id_hc;
    window.open(url, "HISTORIAL HC", "width=800, height=400")

}





        } else if (id_proceso == 5) {


            if (id_cat_cups == 1) {

                url = "<?php echo base_url() . 'index.php/CHistorial/hc_3/' ?>" + id_hc;
                window.open(url, "HISTORIAL HC", "width=800, height=400")

            } else {

                url = "<?php echo base_url() . 'index.php/CHistorial/hc_10/' ?>" + id_hc;
                window.open(url, "HISTORIAL HC", "width=800, height=400")

            }

        } else if (id_proceso == 6) {


            url = "<?php echo base_url() . 'index.php/CHistorial/hc_4/' ?>" + id_hc;


            window.open(url, "HISTORIAL HC", "width=800, height=400")


        } else if (id_proceso == 7) {

            url = "<?php echo base_url() . 'index.php/CHistorial/hc_5/' ?>" + id_hc;


            window.open(url, "HISTORIAL HC", "width=800, height=400")


        }

    }


    function finestraSecundaria(url) {
        //alert(url)
        window.open(url, "HISTORIAL HC", "width=800, height=400")
    }
</script>
