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
                    <?php if (count($Lista_Visitas) > 0) { ?>

                    <fieldset>
                    <legend><b>INFORMACIÓN</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-3">
                            <strong>Fecha de visita</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            echo "<div>" . $dt->format('d/m/Y') . "</div>";

                            ?>
                        </div>

                  
                        <div class="form-group col-md-3">
                            <strong>EDAD</strong><br>
                            <?php
                             $dt = new DateTime($Lista_Visitas[0]->fecha);
                             //echo $dt->format('d/m/Y');
             
                             echo "<tr>";
                             echo "<td>" . $Lista_Visitas[0]->edad . "</td>";                       
                            
                            ?>
                        </div>
               
                        <div class="form-group col-md-3">
                            <strong>TELÉFONO</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>" . $Lista_Visitas[0]->telefono . "</td>";
                             ?>
                        </div>

                        <div class="form-group col-md-3">
                            <strong>ZONA</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>" . $Lista_Visitas[0]->zona . "</td>";        
                             ?>
                        </div>
                    </div>
                           

                </fieldset><br>
                <fieldset>
                    <legend><b>ANTECEDENTES</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-4 ">
                        <strong>HTA</strong><br>
                            <?php 
                              $dt = new DateTime($Lista_Visitas[0]->fecha);
                             //echo $dt->format('d/m/Y');
                             echo "</tr>";
                             echo "<tr>";
                             echo "<td>" . $Lista_Visitas[0]->hta . "</td>";
                            
                             

                            ?>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>DM</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>" . $Lista_Visitas[0]->dm. "</td>";
                               
                            
                            
                            ?>
                        </div>
                           <div class="form-group col-md-4">
                                <strong>GLUCOMETRÍA</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>" . $Lista_Visitas[0]->glucometria . "</td>";
                               
                                 ?>
                        </div>                 
                    </div>

                </fieldset><br>
                <fieldset>
                    <legend><b>MEDIDAS ANTROPOLÓGICAS</b></legend>           
                 
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-3">
                            <strong>PESO</strong><br>
                            <?php
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>" . $Lista_Visitas[0]->peso . "</td>";
                           
                            
                            
                             ?>
                        </div>

                        <div class="form-group col-md-3">
                            <strong>TALLA</strong><br>
                            <?php
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>" . $Lista_Visitas[0]->talla . "</td>";
                           
                            
                             ?>
                        </div>

                        <div class="form-group col-md-3">
                            <strong>IMC</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>" . $Lista_Visitas[0]->imc . "</td>";
                           
                            
                            ?>
                        </div>
                        <div class="form-group col-md-3">
                                <strong>PERIMETRO ABDOMINAL</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>" . $Lista_Visitas[0]->perimetro_abdominal . "</td>";
                                
                                ?>
                            </div>
                    </div>
                           

                </fieldset><br>
                <br>
                <fieldset>
                        <legend><b>SIGNOS VITALES</b></legend>
        
                        <div class="form-row" style="margin: 10px; text-align:center">
                            <div class="form-group col-md-4">
                                <strong>FRECUENCIA CARDIACA</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>" . $Lista_Visitas[0]->frecuencia_cardiaca . "</td>";
                              
                                 ?>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>FRECUENCIA RESPIRATORIA</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>" . $Lista_Visitas[0]->frecuencia_respiratoria . "</td>";
                               
                                 ?>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>TENSIÓN ARTERIAL</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>" . $Lista_Visitas[0]->tension_arterial . "</td>";
                               
                                 ?>
                            
                        </div>
                 
                        <div class="form-group col-md-4">
                                <strong>TEMPERATURA</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td style='background-color: #D5F3F1;'>TEMPERATURA </td>";
                                echo "<td>" . $Lista_Visitas[0]->temperatura . "</td>";
                               
                                 ?>
                            
                        </div>
                        <div class="form-group col-md-4">
                                <strong>FAMILIAR</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td>" . $Lista_Visitas[0]->familiar . "</td>";
                               
                                 ?>
                            
                        </div>
                        <div class="form-group col-md-4">
                                <strong>ABANDONO SOCIAL </strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                                echo "</tr>";
                                echo "<tr>";
                                echo "<td style='background-color: #D5F3F1;'></td>";
                                echo "<td>" . $Lista_Visitas[0]->abandono_social . "</td>";
                                
                                 ?>
                            
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
                        <?php 
                        	echo "</tr>";
                            echo "<tr>";
                            echo "<td style='background-color: #D5F3F1;'></td>";
                            echo "<td>" . $Lista_Visitas[0]->motivo . "</td>";
                           
                        ?>
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
                    <?php 
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . $Lista_Visitas[0]->medicamentos . "</td>";  
                    ?>
                    </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                    <legend><b>RIESGOS</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                            <?php
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>" . $Lista_Visitas[0]->riesgos . "</td>";
                            
                           
                           ?>
                     </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                            <legend><b>CONDUCTAS</b></legend>
                            <div class="form-row" style="margin: 10px; text-align:center">
                            <?php
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>" . $Lista_Visitas[0]->conductas . "</td>";
                          
                            
                             ?>
           </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                <legend><b>NOVEDADES</b></legend>
                <div class="form-row" style="margin: 10px; text-align:center">
                        <?php
                    	echo "</tr>";
                        echo "<tr>";
                        echo "<td>" . $Lista_Visitas[0]->novedades . "</td>";   
                             ?>
                             </div>
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
                            <?php
                            echo "</tr>";
                            echo "<tr>";
                            echo "<div>" . $Lista_Visitas[0]->encargado . "</div>";
                           
                            

                             ?>
                        </div>
                        <div class="form-group col-md-2">
                            <strong>PROXIMO CONTROL</strong><br>
                            <?php
                            echo "</tr>";
                            echo "<tr>";
                            echo "<div>" . $Lista_Visitas[0]->fecha_control . "</div>";
                            

                            ?>
                        </div>


                </fieldset><br>
                <br>
                <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                    <legend><b>RIESGO_FIRMA</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-7">
                            
                            <strong>Riesgo_Fotografico</strong><br>
                      
                            <?php
                            $urlImagen = $Lista_Visitas[0]->foto;
                            $anchoImagen = "300px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "400px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='foto' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                           
                            
                        </div>
                        <div class="form-group col-md-2">
                            <strong>Firma_foto</strong><br>
                            <?php
                            $urlImagen = $Lista_Visitas[0]->firma;
                            $anchoImagen = "500px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "400px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='firma' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                           
                        </div>


                </fieldset>
               
                <?php }else{
        echo"<pre>Paciente no cuenta con historial de visita domiciliaria</pre>";
    } ?>
    <br>
    <br>
    <br>
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
                                        <div  align="center "><small>ANTERIOR <br> VISITA DOMICILIARIA <br> 
                                       
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
                   
                
                    <div id="data_visitas">   
                    <?php if (count($Lista_Visitas) > 0) { ?>
                    <fieldset>
                    <legend><b>INFORMACIÓN</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-3">
                            <strong>Fecha de visita</strong><br>
                            <?php
                             $dt = new DateTime($Lista_Visitas[0]->fecha);
                             //echo $dt->format('d/m/Y');
             
                       
                             if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->fecha. "</td>";
                                
                               }
                            
                            ?>
                            
                           
                            </div>
                        <div class="form-group col-md-3 ">
                            <strong>EDAD</strong><br>
                            <?php
                             $dt = new DateTime($Lista_Visitas[0]->fecha);
                             //echo $dt->format('d/m/Y');
             
                       
                             if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->edad. "</td>";
                                
                               }
                            
                            ?>
                        </div>
                    
                    
                        <div class="form-group col-md-3">
                            <strong>TELÉFONO</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                         
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->telefono . "</td>";
                            }
                            

                             ?>
                        </div>
                        <div class="form-group col-md-3">
                            <strong>ZONA</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                         
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->zona . "</td>";
                            }
                                        

                             ?>
                        </div>
                     </div>
                    </div> <br>
                    <fieldset>
                    <legend><b>ANTECEDENTES</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-3 ">
               
                            <strong>HTA</strong><br>
                            <?php 
                              $dt = new DateTime($Lista_Visitas[0]->fecha);
                             //echo $dt->format('d/m/Y');
                  
                             if (count($Lista_Visitas) > 1) {
                                 $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                 echo "<td>" . $Lista_Visitas[1]->hta. "</td>";
                             }
                             
                             

                            ?>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>DM</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                    
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->dm . "</td>";
                                }
                            
                            
                            ?>
                            
                    
                             </div>
                             <div class="form-group col-md-4">
                                <strong>GLUCOMETRÍA</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                    
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->glucometria . "</td>";
                                    
                                }
                                 ?>
                            
                        </div>
                     </div>
                    </div> <br>
                    <fieldset>
                    <legend><b>MEDIDAS ANTROPOLÓGICAS</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-2 ">
                            <strong>PESO</strong><br>
                            <?php
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                    
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->peso . "</td>";
                            }
                            
                            
                             ?>
                        </div>
            
                 
                        <div class="form-group col-md-3">
                            <strong>TALLA</strong><br>
                            <?php
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                            
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->talla . "</td>";
                            }
                            
                             ?>
                        </div>

                        <div class="form-group col-md-3">
                            <strong>IMC</strong><br>
                            <?php 
                            $dt = new DateTime($Lista_Visitas[0]->fecha);
                            //echo $dt->format('d/m/Y');
                         
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->imc . "</td>";
                            }
                            
                            ?>
                            </div>
                              <div class="form-group col-md-3">
                                <strong>PERIMETRO ABDOMINAL</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                               
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->perimetro_abdominal . "</td>";
                                }
                                ?>
                            </div>
                </fieldset><br>
                <fieldset>
                        <legend><b>SIGNOS VITALES</b></legend>
                        <div class="form-row" style="margin: 10px; text-align:center">
                          
                            <div class="form-group col-md-4">
                                <strong>FRECUENCIA CARDIACA</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                           
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->frecuencia_cardiaca . "</td>";
                                }
                                 ?>
                            </div>
                            <div class="form-group col-md-4">
                                <strong>FRECUENCIA RESPIRATORIA</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                          
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->frecuencia_respiratoria . "</td>";
                                   
                                }
                                 ?>
                            </div>
                            <div class="form-group col-md-3">
                                <strong>TENSIÓN ARTERIAL</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                               
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->tension_arterial . "</td>";
                                    
                                }
                                 ?>
                            
                        </div>
                       
                        <div class="form-group col-md-4">
                                <strong>TEMPERATURA</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                           
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->temperatura . "</td>";
                                    
                                }
                                 ?>
                            
                        </div>
                        <div class="form-group col-md-4">
                                <strong>FAMILIAR</strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                              
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->familiar . "</td>";
                                    
                                }
                                 ?>
                            
                        </div>
                        <div class="form-group col-md-3">
                                <strong>ABANDONO SOCIAL </strong><br>
                                <?php
                                $dt = new DateTime($Lista_Visitas[0]->fecha);
                                //echo $dt->format('d/m/Y');
                          
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->abandono_social . "</td>";
                                    
                                }
                                ?>
                                </div>
                        </div>
                    </div>
                 </fieldset>
                 <br>
        
                  <div class="mx-auto " style="width: 1300px;">
                 </fieldset><br>
                  <fieldset>
                           <legend><b>MOTIVOS POR EL CUAL NO ASISTE</b></legend>
                           <div class="form-row" style="margin: 10px; text-justify">
                        <?php 
                        
           
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->motivo . "</td>";
                                
                            }
                        ?>
                    </div>
                </div>
            </div>
         </fieldset>
<br>
         <div class="mx-auto " style="width: 1300px;">
                 </fieldset><br>
                  <fieldset>
                        <legend><b>MEDICAMENTOS QUE SE ENCUENTRAR</b></legend>
                        <div class="form-row" style="margin: 10px; text-align:center">
                        <?php 
                        
                        if (count($Lista_Visitas) > 1) {
                            $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                            echo "<td>" . $Lista_Visitas[1]->medicamentos . "</td>";
                            
                        }
                        ?>
                        </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                            <legend><b>RIESGOS</b></legend>
                            <div class="form-row" style="margin: 10px; text-align:center">
                            <?php
                            
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->riesgos . "</td>";
                                
                            }
                           
                           ?>
                           </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                            <legend><b>CONDUCTAS</b></legend>
                            <div class="form-row" style="margin: 10px; text-align:center">
                            <?php
                            
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<td>" . $Lista_Visitas[1]->conductas . "</td>";
                                
                            }
                            
                             ?>
                  </div>
                </div>
            </div><br>
         </Fieldset>
         <br>
         <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                            <legend><b>NOVEDADES</b></legend><br>
                            <div class="form-row" style="margin: 10px; text-align:center">
                            <?php
                       
                                if (count($Lista_Visitas) > 1) {
                                    $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                    echo "<td>" . $Lista_Visitas[1]->novedades . "</td>";
                                    
                                }
                            
                             ?>
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
                            <strong>ENCARGADO DE LA VISITA</strong>
                            <?php
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<div>" . $Lista_Visitas[1]->encargado . "</div>";
                               
                            }

                             ?>
                         </div>
                        <div class="form-group col-md-2">
                            <strong>PROXIMO CONTROL</strong><br>
                            <?php
                            if (count($Lista_Visitas) > 1) {
                                $dt1 = new DateTime($Lista_Visitas[1]->fecha);
                                echo "<div>" . $Lista_Visitas[1]->fecha_control . "</div>";
                                
                            }

                            ?>
                        </div>


                </fieldset><br>



                <br>
                <div class="mx-auto " style="width: 1300px;">
      <fieldset>
                    <legend><b>RIESGO_FIRMA</b></legend>
                    <div class="form-row" style="margin: 10px; text-align:center">
                        <div class="form-group col-md-7">
                            
                            <strong>Riesgo_Fotografico</strong><br>
                      
                            <?php
                            $urlImagen = $Lista_Visitas[0]->foto;
                            $anchoImagen = "300px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "400px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='foto' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                           
                            
                        </div>
                        <div class="form-group col-md-2">
                            <strong>Firma_foto</strong><br>
                            <?php
                            $urlImagen = $Lista_Visitas[0]->firma;
                            $anchoImagen = "300px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "400px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='firma' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                           
                        </div>


                </fieldset>
                <br>
                <?php }else{
        echo"<pre>Paciente no cuenta con historial de visita domiciliaria</pre>";
    } ?>
     <div class="bg-white">

                  
<script type="text/javascript">

    $("#submit_visitas").click(function() {

        fecha = $("#fecha").val();2
        doc = $("#doc").val();
        edad = $("#edad").val();
        hta = $("#hta").val();
        dm = $("#dm").val();
		telefono = $("#telefono").val();
		zona = $("#zona").val();
		peso = $("#peso").val();
		talla = $("#talla").val();
		imc = $("#imc").val();
		perimetro_abdominal = $("#perimetro_abdominal").val();
		frecuencia_cardiaca = $("#frecuencia_cardiaca").val();
		frecuencia_respiratoria = $("#frecuencia_respiratoria").val();
		tension_arterial = $("#tension_arterial").val();
		glucometria = $("#glucometria").val();
		temperatura = $("#temperatura").val();
		familiar = $("#familiar").val();
		abandono_social = $("#abandono_social").val();
		motivo = $("#motivo").val();
		medicamentos = $("#medicamentos").val();
		riesgos = $("#riesgos").val();
		conductas = $("#conductas").val();
		novedades = $("#novedades").val();
		encargado = $("#encargado").val();
		fecha_control = $("#fecha_control").val();
        foto = $("#foto").val();
        $firma = $("#firma").val();
		

        var resultado = window.confirm('Estas seguro de enviar el formulario?');

        if (resultado === true) {

            if (fecha != "") {

                $.ajax({
                    url: "<?php echo base_url() . 'index.php/CHistoria/agregar_visitas'; ?>",
                    type: 'POST',
                    data: {
                        fecha : fecha ;
                        doc : doc;
                        edad : edad ;
                        hta : hta;
                        dm :  dm;
                        telefono : telefono;
                        zona : zona;
                        peso : peso;
                        talla : talla;
                        imc : imc;
                        perimetro_abdominal : perimetro_abdominal;
                        frecuencia_cardiaca : frecuencia_cardiaca;
                        frecuencia_respiratoria : frecuencia_respiratoria;
                        tension_arterial : tension_arterial;
                        glucometria : glucometria;
                        temperatura : temperatura;
                        familiar : familiar;
                        abandono_social : abandono_social;
                        motivo : motivo;
                        medicamentos : medicamentos;
                        riesgos : riesgos;
                        conductas : conductas;
                        novedades : novedades;
                        encargado : encargado;
                        fecha_control : fecha_control;
                        foto : foto;
                        $firma : firma
                    },

                    success: function(result) {
                        $("#data_visitas").load(" #data_visitas");
                        $('#fecha').val("");
                        $('#edad').val("");
                        $('#hta ').val("");
                        $('#dm').val("");
						$('#telefono').val("");
						$('#zona').val("");
						$('#talla').val("");
						$('#plaquetas').val("");
						$('#imc').val("");
						$('#perimetro_abdominal').val("");
						$('#frecuencia_cardiaca').val("");
						$('#frecuencia_respiratoria').val("");
						$('#tension_arterial').val("");
						$('#glucometria').val("");
						$('#temperatura').val("");
						$('#familiar').val("");
						$('#abandono_social ').val("");
						$('#motivo').val("");
						$('#medicamentos').val("");
						$('#riesgos').val("");
						$('#conductas').val("");
						$('#novedades').val("");
						$('#encargado').val("");
						$('#fecha_control').val("");
                        $('#foto').val("");
                        $('#firma').val("");
                        $('#collapseTwo').hide();
                        $('#mens_visitas').show();
                        $("#mens_visitas").html(result);

                    }
                });

            }else {

                html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $('#mens_visitas').show();
                $("#mens_visitas").html(html);


            }


        }else { 
            window.alert('Pareces indeciso!!!');
        }


});

</script>