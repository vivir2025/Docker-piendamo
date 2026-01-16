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
                        <div class="bg-white" style="border: ridge #0f0fef 1px; display: flex; justify-content: space-around;">
                            <div style=" border-right: 1px solid#0f0fef;">
                                <div style="padding-right: 40px;" >
                                    <img src="<?= base_url("assets/img/login123.png"); ?>" width="200px" />
                                </div>
                            </div>
                            <div style=" border-right: 1px solid#0f0fef;   padding-right: 30px;  padding-top: 50px;">
                                <div style="font-size:20px;" >
                                <b>FUNDACION NACER PARA VIVIR IPS</b> <br>
                                   <b> PJ: 00552-02-2015</b> <br>
                                    <b>NIT: 900817959-1 </b>

                                </div>
                            </div>
                            <div style=" border-right: 1px solid#0f0fef;   padding-right: 40px;  padding-top: 50px; font-size:20px;"  >
                                <div style=" margin-bottom: 10px; "><b> NOMBRE:</b></div>
                                <div style=" margin-bottom: 10px;"><b> CODIGO:</b></div>
                                <div style=" margin-bottom: 10px;"><b> FECHA: </b> </div>
                             
                            </div>
                            <div style="   padding-right: 40px;  padding-top: 50px; font-size:20px;" >
                                <div style=" margin-bottom: 10px; ">DISENTIMIENTO INFORMADO  PROGRAMAS </div>
                                <div style=" margin-bottom: 10px;">F-PMENF-07</div>
                                <div style=" margin-bottom: 10px;"> SEPTIEMBRE 2023  </div>
                            </div>

                        </div>

                          
                    <br>
                    <br>
                    <div id="data_visitas">   
                    <?php foreach ($dato_desentimiento as $h) { ?>

                
                    
                    <div  style="margin: 10px; padding:10px; font-size: 17px; border: ridge #0f0fef 1px;">
                        <fieldset>
                            <legend><b>Datos Usiario</b></legend>
                            <div style="margin: 10px; ">
                                    <strong >Fecha: </strong> <u><?php echo $h->fecha; ?></u>  
                            </div>

                            <div style="margin: 10px; ">
                                <strong >Nombres y Apellidos:</strong> <u><?php echo $h->nombre; ?></u>
                        
                            </div>
                    
                            <div style="margin: 10px; " >
                                <strong >Tipo de Identificación: </strong> <u>CC </u> <b>Numero de Identificación:</b>  <u><?php echo $h->identificacion; ?></u>
                            
                            </div>

                            <div style="margin: 10px; " >
                                <strong >Fecha de Nacimiento : </strong><u> <?php echo $h->fecha_nam; ?></u> <b> Edad:</b>   <u><?php echo $h->edad; ?></u>
                            </div>
                            <div style="margin: 10px; ">
                                <strong >Dirección : </strong> <u><?php echo $h->direccion; ?></u> <b> Teléfono:</b>  <u> <?php echo $h->tetefono; ?></u>
                            </div>
                        </fieldset>
                        <div >
                            <p style="text-align:justify;margin: 10px;">Yo: <u><?php echo $h->yo; ?></u> identificado con CC n° <u><?php echo $h->identificacion_po; ?></u>
                                manifiesto que de acuerdo a los protocolos y procedimientos de la Fundación Nacer para Vivir IPS donde me realizaron:
                                1. visita domiciliaria por promotor de vida el <u><?php echo $h->manifiesto; ?></u> , realizada por <u><?php echo $h->realiza; ?></u> 
                                con cargo <u><?php echo $h->cargo; ?></u>. 2. Visita por equipo o profesional psicosocial: el <u><?php echo $h->visita; ?></u> realizada por <u><?php echo $h->realiza_por; ?></u>
                                con cargo <u><?php echo $h->con_cargo; ?></u> he sido informado/a por escrito sobre los beneficios y riesgos que supone el cumplimiento del PROGRAMA DE GESTION DEL RIESGO
                                CARDIORENAL en el cual soy usuario susceptible por 1. Ingreso <u><?php echo $h->realiza_por; ?></u>  2. Control <u><?php echo $h->con_cargo; ?></u>. 
                            </p>

                            <p style="text-align:justify;margin: 10px;">Por medio del presente documento, y  en pleno uso de mis facultades mentales, otorgo en forma libre mi “disentimiento” respecto de la realización 
                            del (los) procedimiento(s), servicios médicos, suministro de medicamentos, visitas domiciliarias, búsqueda activa y demás servicios de salud que hacen
                             parte de la atención integral relacionada con dicho programa que me ofrece la Fundación Nacer para Vivir en cumplimiento de la normatividad vigente. </p>

                            <p style="text-align:justify;margin: 10px;">Entiendo que los servicios descritos en el inciso anterior, hacen parte del plan de tratamiento definido para el manejo de mi patología y/o del seguimiento
                                 y control del programa al que pertenezco, y que tanto el médico como el equipo de profesionales y técnicos en salud, poseen la idoneidad y el entrenamiento 
                                 suficiente para el desarrollo del mismo.   </p>
                            <p style="text-align:justify;margin: 10px;">
                                Que a pesar de que ASMET SALUD EPS a través de la FUNDACION NACER PARA VIVIR IPS, puso a mi entera disposición las instalaciones, el personal médico, los insumos y/o
                                elementos requeridos para el manejo del mismo, y de que me han sido explicadas las alternativas terapéuticas, implicaciones y posibles complicaciones por su no realización; 
                                no obstante, declaro de forma voluntaria, libre y espontánea que me niego a los mismos, asumiendo los  riesgos  bajo mi propia responsabilidad y en constancia de ello firmo 
                                el presente documento. 
                            </p><br>

                        </div>
                        <fieldset>
                            <legend><b>Usuario</b></legend>
                            
                            <div style="margin: 10px; ">
                                <strong >Nombres y Apellidos:</strong> <u><?php echo $h->nombre_usu; ?></u>
                        
                            </div>
                    
                            <div style="margin: 10px; ">
                                <b>Numero de Identificación:</b>  <u><?php echo $h->identificacion_usu; ?></u>
                            
                            </div>
                        </fieldset><br>
                        <fieldset>
                            <legend><b>Testigo</b></legend>
                            
                            <div style="margin: 10px; ">
                                <strong >Nombres y Apellidos:</strong> <u><?php echo $h->nombre_tes; ?></u>
                        
                            </div>
                    
                            <div style="margin: 10px; ">
                                <b>Numero de Identificación:</b>  <u><?php echo $h->identificacion_tes; ?></u>
                            
                            </div>
                        </fieldset><br>
                        <fieldset>
                            <legend><b>Fnpv</b></legend>
                            
                            <div style="margin: 10px; ">
                                <strong >Nombres y Apellidos:</strong> <u><?php echo $h->nombre_fnpv; ?></u>
                        
                            </div>
                    
                            <div style="margin: 10px; ">
                                <b>Numero de Identificación:</b>  <u><?php echo $h->identificacion_fnpv; ?></u>
                            
                            </div>
                            <div style="margin: 10px; ">
                                <b>Cargo:</b>  <u><?php echo $h->cargo_fnpv; ?></u>
                            
                            </div>
                        </fieldset><br>
                        <fieldset>
                    <legend><b>Firmas</b></legend>
                    <div  style="margin: 10px; display: flex; justify-content: space-around;">
                        <div class="form-group col-md-2">
                            
                            <strong>Firma Usuario</strong><br>
                      
                            <?php
                            $urlImagen = $h->firma_usu;
                            $anchoImagen = "300px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "200px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='Imagen' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                            
                        </div>
                        <div class="form-group col-md-2">
                            <strong>Firma Testigo</strong><br>
                            <?php
                            $urlImagen = $h->firma_tes;
                            $anchoImagen = "300px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "200px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='Imagen' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                           
                        </div>
                        <div class="form-group col-md-2">
                            <strong>Firma Fnpv</strong><br>
                            <?php
                            $urlImagen = $h->firma_fnpv;
                            $anchoImagen = "300px"; // Cambia este valor por el ancho deseado
                            $altoImagen = "200px"; // Cambia este valor por el alto deseado
                
                            echo "<img src='" . $urlImagen . "' alt='Imagen' width='" . $anchoImagen . "' height='" . $altoImagen . "'>";
                            ?>
                           
                        </div>


                </fieldset>
                    </div>
       
              
               
      
               
               


               
               
                <?php } ?>
            </div>
    <br>
    <br>
   
