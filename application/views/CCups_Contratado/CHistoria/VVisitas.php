<div class="container">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">
<div class="row justify-content-center">
    <div>
        <hr>
        <div style="color: white;">Cargar VISITAS  
        </div>
        <hr>

        <div  class="bg-light" style="width: 600px;" >
        <div>
            <div id="upload"></div>
            <form id="form-upload-user" method="post" enctype="multipart/form-data">
                <table border="0" cellpading="0" cellspacing="0">
                    <tr>
                        <td width="80">
                            <div align="left"><span> Archivo:</span></div>
                        </td>

                        <td width="380">
                            <input type="file" name="uploadFile" id="uploadFile" class="form-control">
                        </td>

                        <td width="200">
                            <center> <a class="btn btn-info btn-block" name="submit" id="btnUpload">Cargar</a></center>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>


<script>
    $("#btnUpload").click(function() {


        var formData = new FormData();
        formData.append("uploadFile", $('#uploadFile')[0].files[0]);
        formData.append("idHistoria", $("#idHistoria").val());

        //console.log(formData);
        $.ajax({
            url: "<?php echo base_url() . 'index.php/CHistoria/importar_excel1'; ?>",
            data: formData,
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",

            success: function(result) {
                // console.log(result);


                $('#uploadFile').val(null);
                // $('#mens_visitas_upload').show();
                //$("#mens_visitas_upload").html(result);
                $("#data_visitas").load(" #data_visitas");

                if (result === 1) {
                    //alert("Data de archivo excel guardado correctamente!!!.")
                    html = "<div class='alert alert-info alert-dismissible fade show' role='alert'>Data de archivo excel guardado correctamente!!!.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    $("#upload").html(html);

                } else {
                    //alert("Error al cargar el archivo excel!!!.")
                    html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Error al cargar el archivo excel!!!.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                    $("#upload").html(html);

                }

            }
        });

    });
</script>
