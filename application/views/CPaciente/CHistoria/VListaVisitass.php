<style type="text/css">
                        fieldset {
                            border: 1px ridge #0f0fef;
                            /* Borde */
                        }

                        legend {
                            text-align: left;
                            /* Puedes cambiarlo por center o right */
                            width: inherit;
                            /* Or auto */
                            padding: 0 10px;
                            /* To give a bit of padding on the left and right */
                            border-bottom: none;
                            font-size: 16px;
                            
                        }
                        
                    </style>
                    <br>
                    <input type="button" class="btn btn-danger no-print" onclick="history.back()" value="--- Regresar ---"><br><br>

                        <!--center>
                            <h5 style="color: blue;">visita domiciliaria</h5>
                        </center-->
                        <br>
                        
                    <div class="bg-white">

                    <div class="mx-auto " style="width: 1300px;">

                        <div class="bg-white" style="border: ridge #0f0fef 1px; text-align:center">

                            <div class="form-row" style="margin: 9px;">
                                <div class="form-group col-md-4">

                                    <tr>
                                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/login123.png"); ?>" width="200px" /></td>
                                    </tr>

                                </div>
                                <div class="form-group col-md-4" style=" margin: auto;">

                                    <tr height="">
                                        <td height="">
                                            <div align="center">
                                                <h3>FUNDACIÓN NACER PARA<br>VIVIR IPS</h3>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="">
                                        <td height="">
                                            <div  align="center "><small> VISITA  DOMICILIARIA <br>
                                           </small><br>
                                          
                                            
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                                <div class="form-group col-md-4">

                    <tr>
                        <td width="156" rowspan="7" align="center" valign="middle"><img src="<?= base_url("assets/img/login123.png"); ?>" width="200px" /></td>
                    </tr>

                    </div>
                    </div>


                    </div>
                    <br>
                    <br>
                    <div id="data_visitas">   
                    <?php foreach ($dato_visitas as $h) { ?>

                    <fieldset>
                    <legend><b>INFORMACIÓN</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-3">
                            <strong>Fecha de visita</strong><br>
                            <?php echo $h->fecha; ?>
                            
                        </div>

                  
                        <div class="form-group col-md-3">
                            <strong>EDAD</strong><br>
                            <?php echo $h->edad; ?>
                            
                        </div>
               
                        <div class="form-group col-md-3">
                            <strong>TELÉFONO</strong><br>
                        <?php echo $h->telefono; ?>
                        </div>

                        <div class="form-group col-md-3">
                            <strong>ZONA</strong><br>
                            <?php echo $h->zona; ?>
                        </div>
                    </div>
                           

                </fieldset><br>
                <fieldset>
                    <legend><b>ANTECEDENTES</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-4 ">
                        <strong>HTA</strong><br>
                        <?php echo $h->hta; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>DM</strong><br>
                            <?php echo $h->dm; ?>
                        </div>
                           <div class="form-group col-md-4">
                                <strong>GLUCOMETRÍA</strong><br>
                                <?php echo $h->glucometria; ?>
                               
                        </div>                 
                    </div>

                </fieldset><br>
                <fieldset>
                    <legend><b>MEDIDAS ANTROPOLÓGICAS</b></legend>           
                 
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-3">
                            <strong>PESO</strong><br>
                            <?php echo $h->peso; ?>
                            
                        </div>

                        <div class="form-group col-md-3">
                            <strong>TALLA</strong><br>
                            <?php echo $h->talla; ?>
                            
                        </div>

                        <div class="form-group col-md-3">
                            <strong>IMC</strong><br>
                            <?php echo $h->imc; ?>
                           
                        </div>
                        <div class="form-group col-md-3">
                                <strong>PERIMETRO ABDOMINAL</strong><br>
                                <?php echo $h->perimetro_abdominal; ?>
                               
                            </div>
                    </div>
                           

                </fieldset><br>
                <br>
                <fieldset>
                        <legend><b>SIGNOS VITALES</b></legend>
        
                        <div class="form-row" style="margin: 10px; text-align:center">
                            <div class="form-group col-md-4">
                                <strong>FRECUENCIA CARDIACA</strong><br>
                                <?php echo $h->frecuencia_cardiaca; ?>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>FRECUENCIA RESPIRATORIA</strong><br>
                                <?php echo $h->frecuencia_respiratoria; ?>
                               
                            </div>
                            <div class="form-group col-md-4">
                                <strong>TENSIÓN ARTERIAL</strong><br>
                                <?php echo $h->tension_arterial; ?>
                               
                            
                        </div>
                 
                        <div class="form-group col-md-4">
                                <strong>TEMPERATURA</strong><br>
                                <?php echo $h->temperatura; ?>
                            
                        </div>
                        <div class="form-group col-md-4">
                                <strong>FAMILIAR</strong><br>
                                <?php echo $h->familiar; ?>  
                            
                        </div>
                        <div class="form-group col-md-4">
                                <strong>ABANDONO SOCIAL </strong><br>
                                <?php echo $h->abandono_social; ?>   
                            
                        </div>
                      
                </div>
                
            </div>
         </fieldset>
         <br>

          <div class="mx-auto " style="width: 1300px;">
         </fieldset><br>
          <fieldset>
                   <legend> <b> MOTIVOS POR EL CUAL NO ASISTE</b></legend>
                   <div class="form-row" style="margin: 10px; text-align:center">
                   <?php echo $h->motivo; ?> 
                    </div>
                </div>
            </div>
         </fieldset>
         <br>
<br>
         <div class="mx-auto " style="width: 1300px;">
                  <Fieldset>
                    <legend><b>MEDICAMENTOS QUE SE ENCUENTRAN</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                    <?php echo $h->medicamentos; ?> 
                    </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                    <legend><b>RIESGOS</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                    <?php echo $h->riesgos; ?>   
                     </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                            <legend><b>CONDUCTAS</b></legend>
                            <div class="form-row" style="margin: 10px; text-align:center">
                            <?php echo $h->conductas; ?>     
           </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                <legend><b>NOVEDADES</b></legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                <?php echo $h->novedades; ?>     
                     </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
       
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                    <legend><b>RESPONSABLE</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-7">
                            <strong>ENCARGADO DE LA VISITA</strong><br>
                            <?php echo $h->encargado; ?>   
                        </div>
                        <div class="form-group col-md-2">
                            <strong>PROXIMO CONTROL</strong><br>
                            <?php echo $h->fecha_control; ?>   
                        </div>


                </fieldset>
                <br>
                <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                    <legend><b>RIESGO_FIRMA</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-7">
                            
                            <strong>Riesgo_Fotografico</strong><br>
                      
                            <?php
                            $urlImagen = $h->foto;
                            $anchoImagen = "300px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "400px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='Imagen' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                            
                        </div>
                        <div class="form-group col-md-2">
                            <strong>Firma_foto</strong><br>
                            <?php
                            $urlImagen = $h->firma;
                            $anchoImagen = "300px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "400px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='Imagen' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                           
                        </div>


                </fieldset>
               
               


               
               
                <?php } ?>
            </div>
    <br>
    <br>
   
