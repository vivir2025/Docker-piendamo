
<div class="container bg-white">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);"  >
    <h3 class="title title-up">Paraclinico</h3>
    <hr>
    <div id="mens_paraclinico"></div>
    <div id="accordion">
        <div class="card card-white">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <a class="btn btn-default btn-sm collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                        Click Registro Paraclinico<i class="tim-icons icon-minimal-right"></i>
                    </a>
                </h5>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="container">
                    <br><h4>Formulario Registro</h4><hr>
                    <table class="table table-bordered">
                        <thead style="background-color: #D5F3F1;">
                            <th>LABORATORIO</th>
                            <th>RESULTADO</th>
                        </thead>
                         <tbody>
                            <input type="text" name="doc" id="doc" value="<?= $doc ?>" hidden>
                            <tr><td>Fecha </td><td><input class="form-control" name="fecha" id="fecha" type="date" ></td></tr>
                            <tr>
                                <td>Colesterol total (mg/dl): (Normal: <200 mg/dl, Moderardo: 200-239 mg/dl, Alto: >= 240 mg/dl.)</td>
                                <td><input class="form-control" name="colesterototal" id="colesterototal" type="text" placeholder="Colesterol Total" required=""></td>
                            </tr>
                            <tr>
                                <td>
                                    Colesterol HDL (mg/dl): (40-60 mg/dl)
                                </td>
                                <td>
                                    <input class="form-control" name="colesterolhdl" id="colesterolhdl" type="text" placeholder="Colesterol HDL">                      
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Triglicéridos (mg/dl): (Normal: <150mg/dl ,Limite alto: 150 - 199 mg/dl ,Alto: 200 - 499 mg/dl ,Muy alto: >= 500 mg/dl)
                                </td>
                                <td>
                                    <input class="form-control" name="trigliceridos" id="trigliceridos" type="text" placeholder="Trigliceridos">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Colesterol LDL (mg/dl): (Óptimo: <100 mg/dl)
                                </td>
                                <td>
                                    <input class="form-control" name="colesterolldl" id="colesterolldl" type="text" placeholder="Colesterol LDL">                     
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Hemoglobina (g/dl): (10.6 - 13.5g/dl)
                                </td>
                                <td>
                                    <input class="form-control" name="hemoglobina" id="hemoglobina" type="text" placeholder="Hemoglobina">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Hematocrito (%): (32.9 - 41.2%)
                                </td>
                                <td>
                                    <input class="form-control" name="hematocrocito" id="hematocrocito" type="text" placeholder="Hematocrocito">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Plaquetas (X10^3 / ML): (186 - 353)
                                </td>
                                <td>
                                    <input class="form-control" name="plaquetas" id="plaquetas" type="text" placeholder="Plaquetas">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                Hemoglobina glicosilada (Hb1AC)(%): (No diabético: 4.0-5.6%, Prediabetico: 5.7-6.4%, Diabetes controlada: 6.5-7.0%)
                                </td>
                                <td>
                                    <input class="form-control" name="hemoglobina_glicosilada" id="hemoglobina_glicosilada" type="text" placeholder="Hemoglobina glicosilada">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Glicemia en ayunas (mg/dl): (70 - 100 mg/dl)
                                </td>
                                <td>
                                    <input class="form-control" name="glicemia_basal" id="glicemia_basal" type="text" placeholder="Glicemia basal">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Glicemia POST-CARGA (PTOG 75 GR) (MG/DL)
                                </td>
                                <td>
                                    <input class="form-control" name="glicemia_post" id="glicemia_post" type="text" placeholder="Glicemia post">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Creatinina (mg/dl): (0.55 - 1.02 mg/dl)
                                </td>
                                <td>
                                    <input class="form-control" name="creatinina" id="creatinina" type="text" placeholder="Creatinina">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Creatinuria (mg/dl): (45 - 106 mg/dl, Masculino: 58 - 161 mg/dl )
                                </td>
                                <td>
                                    <input class="form-control" name="creatinuria" id="creatinuria" type="text" placeholder="Creatinuria">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Microalbuminuria (mg/dl): (Hasta 15 mg/dl)
                                </td>
                                <td>
                                    <input class="form-control" name="microalbuminuria" id="microalbuminuria" type="text" placeholder="Microalbuminuria">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                Albúmina (g/dl): (3.2 - 4.6 g/dL)
                                </td>
                                <td>
                                    <input class="form-control" name="albumina" id="albumina" type="text" placeholder="Albumina">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                Relación Albuminuria/Creatinuria (A/C) (mg/g): (0 - 29.99 mg/g)
                                </td>
                                <td>
                                    <input class="form-control" name="relacion_albuminuria_creatinuria" id="relacion_albuminuria_creatinuria" type="text" placeholder="Relación albuminuria/creatinuria">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Parcial de orina
                                </td>
                                <td>
                                    <input class="form-control" name="parcial_orina" id="parcial_orina" type="text" placeholder="Parcial orina">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Depuración de creatinina (ml/min)
                                </td>
                                <td>
                                    <input class="form-control" name="depuracion_creatinina" id="depuracion_creatinina" type="text" placeholder="Depuracipon de creatinina">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Creatinina de orina en 24 horas (mg/dia) : (Inferior a 250)
                                </td>
                                <td>
                                    <input class="form-control" name="creatinina_orina_24" id="creatinina_orina_24" type="text" placeholder="Creatinina  de orina 24 en horas">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Proteína en orina de 24 horas (mg/dl): (0 - 300 mg/24 horas)
                                </td>
                                <td>
                                    <input class="form-control" name="proteina_orina_24" id="proteina_orina_24" type="text" placeholder="Proteina en orina de 24 horas">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Hormona estimulante de tiroides ultrasensible TSH (µU/ML): (0.350-4.940 uIU/mL)
                                </td>
                                <td>
                                    <input class="form-control" name="hormona_estimulante_tiroides" id="hormona_estimulante_tiroides" type="text" placeholder="Hormona estimulante de tiroides">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Hormona paratiroidea (c terminal) (pg/ml): (15 - 65 pg/ml)
                                </td>
                                <td>
                                    <input class="form-control" name="hormona_paratiroidea" id="hormona_paratiroidea" type="text" placeholder="Hormona paratiroidea">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Albúmina en suero u otros fluidos (g/dl): (3.2 - 4.6 g/dL)
                                </td>
                                <td>
                                    <input class="form-control" name="albumina_suero" id="albumina_suero" type="text" placeholder="Albumina en suero">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Fósforo en suero  u otros fluidos (mg/dl): (2.3 - 4.7 mg/dL)
                                </td>
                                <td>
                                    <input class="form-control" name="fosforo_suero" id="fosforo_suero" type="text" placeholder="Fósforo en suero">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Nitrógeno ureico  (mg/dl): (8.0 - 23.0 mg/dL)
                                </td>
                                <td>
                                    <input class="form-control" name="nitrogeno_ureico" id="nitrogeno_ureico" type="text" placeholder="Nitrógeno ureíco">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Ácido Úrico en suero u otros fluidos (mg/dl): (2.5 - 6.2 mg/dL)
                                </td>
                                <td>
                                    <input class="form-control" name="acido_urico_suero" id="acido_urico_suero" type="text" placeholder="Ácido Úrico en suero">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Calcio (milimol/l): (8.4 - 10.2 mg/dl)
                                </td>
                                <td>
                                    <input class="form-control" name="calcio" id="calcio" type="text" placeholder="Calcio">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Sodio en suero u otros fluidos (meq/l): (136 - 145 mmol/L)
                                </td>
                                <td>
                                    <input class="form-control" name="sodio_suero" id="sodio_suero" type="text" placeholder="Sodio en suero">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Potasio en suero otros fluidos (meq/l): (3.5 - 5.1 mmol/L)
                                </td>
                                <td>
                                    <input class="form-control" name="potasio_suero" id="potasio_suero" type="text" placeholder="Potasio en suero">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Hierro total (ug/dL): (50 - 170 ug/dL)
                                </td>
                                <td>
                                    <input class="form-control" name="hierro_total" id="hierro_total" type="text" placeholder="Hierro total">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Ferritina (ng/ml): (4.63-204 ng/mL)
                                </td>
                                <td>
                                    <input class="form-control" name="ferritina" id="ferritina" type="text" placeholder="Ferritina">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Transferrina (mg/dl): (173 - 360 mg/dL)
                                </td>
                                <td>
                                    <input class="form-control" name="transferrina" id="transferrina" type="text" placeholder="Transferrina">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Fosfatasa alcalina
                                </td>
                                <td>
                                    <input class="form-control" name="fosfatasa_alcalina" id="fosfatasa_alcalina" type="text" placeholder="Fosfatasa alcalina">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Ácido Fólico en suero (ng/ml): (Deficiencia: < 3.5 ng/mL, Suficiencia: => 3.5 ng/mL)
                                </td>
                                <td>
                                    <input class="form-control" name="acido_folico_suero" id="acido_folico_suero" type="text" placeholder="Ácido Fólico en suero">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Vitamina B12 [cianocobalamina] (pg/ml): (187-883 pg/ml )
                                </td>
                                <td>
                                    <input class="form-control" name="vitamina_b12" id="vitamina_b12" type="text" placeholder="Vitamina B12">                    
                                </td>
                            </tr>
							<tr>
                                <td>
                                    Nitrógeno ureico en orina de 24 horas (g/24 horas)
                                </td>
                                <td>
                                    <input class="form-control" name="nitrogeno_ureico_orina_24" id="nitrogeno_ureico_orina_24" type="text" placeholder="Nitrógeno ureíco en orina de 24 horas">                    
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a type="button" id="submit_paraclinico" class="btn btn-info btn-block">Guardar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <br>  
    <div id="data_paraclinico">   
    <?php if (count($lista_paraclinico) > 0) { ?>
        <table class="table table-bordered">
            <thead style="background-color: #6495ED;">
                <th>LABORATORIO</th>
                <th>RESULTADO</th>
                <th>FECHA</th>
                <th>RESULTADO</th>
                <th>FECHA</th>
            </thead>
            <tbody>

                <?php

                $dt = new DateTime($lista_paraclinico[0]->fecha);
                //echo $dt->format('d/m/Y');

                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>COLESTEROL TOTAL(mg/dl) : (Normal: <200 mg/dl, Moderardo: 200-239 mg/dl, Alto: >= 240 mg/dl.)</td>";
                echo "<td>" . $lista_paraclinico[0]->colesterol_total . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->colesterol_total . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
                echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>COLESTEROL HDL(mg/dl) : (40-60 mg/dl.)</td>";
                echo "<td>" . $lista_paraclinico[0]->colesterol_hdl . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->colesterol_hdl . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
                echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>TRIGLICERIDOS(mg/dl) : (Normal: <150mg/dl ,Limite alto: 150 - 199 mg/dl ,Alto: 200 - 499 mg/dl ,Muy alto: >= 500 mg/dl.)</td>";
                echo "<td>" . $lista_paraclinico[0]->trigliceridos . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->trigliceridos . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>COLESTEROL LDL(mg/dl) : (Optimo: <100 mg/dl)</td>";
                echo "<td>" . $lista_paraclinico[0]->colesterol_ldl . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->colesterol_ldl . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HEMOGLOBINA(g/dl): (10.6 - 13.5g/dl)</td>";
                echo "<td>" . $lista_paraclinico[0]->hemoglobina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->hemoglobina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HEMATOCROCITO(%): (32.9 - 41.2%)</td>";
                echo "<td>" . $lista_paraclinico[0]->hematocrocito . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->hematocrocito . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>PLAQUETAS(X10^3 / ML): (186 - 353)</td>";
                echo "<td>" . $lista_paraclinico[0]->plaquetas . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->plaquetas . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HEMOGLOBINA GLICOSILADA(Hb1AC) (%): (No diabetico: 4.0 - 5.6%, Prediabetico: 5.7 - 6.4%, Diabetes controlada: 6.5 - 7.0%)</td>";
                echo "<td>" . $lista_paraclinico[0]->hemoglobina_glicosilada . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->hemoglobina_glicosilada . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>GLICEMIA BASAL EN AYUNAS(mg/dl): (70 - 100 mg/dl)</td>";
                echo "<td>" . $lista_paraclinico[0]->glicemia_basal . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->glicemia_basal . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #FF5733;'>GLICEMIA POST-CARGA (PTOG 75 GR) (MG/DL)</td>";
                echo "<td>" . $lista_paraclinico[0]->glicemia_post . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->glicemia_post . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>CREATININA(mg/dl): (0.55 - 1.02 mg/dl)</td>";
                echo "<td>" . $lista_paraclinico[0]->creatinina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->creatinina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>CREATINURIA(mg/dl): (45 - 106 mg/dl, Masculino: 58 - 161 mg/dl )</td>";
                echo "<td>" . $lista_paraclinico[0]->creatinuria . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->creatinuria . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>MICROALBUMINURIA(mg/dl): (Hasta 15 mg/dl)</td>";
                echo "<td>" . $lista_paraclinico[0]->microalbuminuria . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->microalbuminuria . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>ALBUMINA(g/dl): (3.2 - 4.6 g/dL)</td>";
                echo "<td>" . $lista_paraclinico[0]->albumina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->albumina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>RELACIÓN ALBUMINURIA/CREATINURIA(A/C) (mg/g): (0 - 29.99 mg/g)</td>";
                echo "<td>" . $lista_paraclinico[0]->relacion_albuminuria_creatinuria . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->relacion_albuminuria_creatinuria . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>PARCIAL DE ORINA</td>";
                echo "<td>" . $lista_paraclinico[0]->parcial_orina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->parcial_orina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>DEPURACIÓN DE CREATININA(ml/min)</td>";
                echo "<td>" . $lista_paraclinico[0]->depuracion_creatinina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->depuracion_creatinina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>CREATININA DE ORINA EN 24 HORAS(mg/dia) : (Inferior a 250)</td>";
                echo "<td>" . $lista_paraclinico[0]->creatinina_orina_24 . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->creatinina_orina_24 . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>PROTEINA EN ORINA DE 24 HORAS(mg/dl): (0 - 300 mg/24 horas)</td>";
                echo "<td>" . $lista_paraclinico[0]->proteina_orina_24 . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->proteina_orina_24 . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HORMONA ESTIMULANTE DE TIROIDES ULTRASENSIBLE TSH (µU/ML): (0.350 - 4.940 uIU/mL)</td>";
                echo "<td>" . $lista_paraclinico[0]->hormona_estimulante_tiroides . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->hormona_estimulante_tiroides . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HORMONA PARATIROIDEA(c terminal) (pg/ml): (15 - 65 pg/ml)</td>";
                echo "<td>" . $lista_paraclinico[0]->hormona_paratiroidea . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->hormona_paratiroidea . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>ALBUMINA EN SUERO U OTROS FLUIDOS(g/dl):  (3.2 - 4.6 g/dL)</td>";
                echo "<td>" . $lista_paraclinico[0]->albumina_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->albumina_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>FÓSFORO EN SUERO  U OTROS FLUIDOS(mg/dl): (2.3 - 4.7 mg/dL)</td>";
                echo "<td>" . $lista_paraclinico[0]->fosforo_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->fosforo_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>NITRÓGENO UREÍCO(mg/dl): (8.0 - 23.0 mg/dL)</td>";
                echo "<td>" . $lista_paraclinico[0]->nitrogeno_ureico . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->nitrogeno_ureico . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>ÁCIDO ÚRICO EN SUERO U OTROS FLUIDOS(mg/dl): (2.5 - 6.2 mg/dL)</td>";
                echo "<td>" . $lista_paraclinico[0]->acido_urico_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->acido_urico_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>CALCIO (milimol/l): (8.4 - 10.2 mg/dl)</td>";
                echo "<td>" . $lista_paraclinico[0]->calcio . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->calcio . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>SODIO EN SUERO U OTROS FLUIDOS(meq/l): (136 - 145 mmol/L)</td>";
                echo "<td>" . $lista_paraclinico[0]->sodio_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->sodio_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>POTASIO EN SUERO U OTROS FLUIDOS(meq/l): (3.5 - 5.1 mmol/L)</td>";
                echo "<td>" . $lista_paraclinico[0]->potasio_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->potasio_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HIERRO TOTAL(ug/dL): (50 - 170 ug/dL)</td>";
                echo "<td>" . $lista_paraclinico[0]->hierro_total . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->hierro_total . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>FERRITINA(ng/ml): (4.63-204 ng/mL)</td>";
                echo "<td>" . $lista_paraclinico[0]->ferritina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->ferritina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>TRANSFERRINA (mg/dl): (173 - 360 mg/dL)</td>";
                echo "<td>" . $lista_paraclinico[0]->transferrina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->transferrina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>FOSFATASA ALCALINA</td>";
                echo "<td>" . $lista_paraclinico[0]->fosfatasa_alcalina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->fosfatasa_alcalina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>ÁCIDO FÓLICO EN SUERO (ng/ml): (Deficiencia: < 3.5 ng/mL, Suficiencia: => 3.5 ng/mL)</td>";
                echo "<td>" . $lista_paraclinico[0]->acido_folico_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->acido_folico_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>VITAMINA B12[cianocobalamina] (pg/ml): (187-883 pg/ml )</td>";
                echo "<td>" . $lista_paraclinico[0]->vitamina_b12 . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->vitamina_b12 . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>NITRÓGENO UREÍCO EN ORINA DE 24 HORAS (g/24 horas)</td>";
                echo "<td>" . $lista_paraclinico[0]->nitrogeno_ureico_orina_24 . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($lista_paraclinico) > 1) {
                    $dt1 = new DateTime($lista_paraclinico[1]->fecha);
                    echo "<td>" . $lista_paraclinico[1]->nitrogeno_ureico_orina_24 . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
                echo "</tr>";

                                    ?>
                                </tbody>
                            </table>
                            </div>  
                        <?php }else{
                            echo"<pre>Paciente no cuenta con historial de paraclinico</pre>";
                        } ?>
                    </div>
                    <div>
                  

<script type="text/javascript">

    $("#submit_paraclinico").click(function() {

        fecha = $("#fecha").val();
        doc = $("#doc").val();
        colesterototal = $("#colesterototal").val();
        colesterolhdl = $("#colesterolhdl").val();
        trigliceridos = $("#trigliceridos").val();
		colesterolldl = $("#colesterolldl").val();
		hemoglobina = $("#hemoglobina").val();
		hematocrocito = $("#hematocrocito").val();
		plaquetas = $("#plaquetas").val();
		hemoglobina_glicosilada = $("#hemoglobina_glicosilada").val();
		glicemia_basal = $("#glicemia_basal").val();
		glicemia_post = $("#glicemia_post").val();
		creatinina = $("#creatinina").val();
		creatinuria = $("#creatinuria").val();
		microalbuminuria = $("#microalbuminuria").val();
		albumina = $("#albumina").val();
		relacion_albuminuria_creatinuria = $("#relacion_albuminuria_creatinuria").val();
		parcial_orina = $("#parcial_orina").val();
		depuracion_creatinina = $("#depuracion_creatinina").val();
		creatinina_orina_24 = $("#creatinina_orina_24").val();
		proteina_orina_24 = $("#proteina_orina_24").val();
		hormona_estimulante_tiroides = $("#hormona_estimulante_tiroides").val();
		hormona_paratiroidea = $("#hormona_paratiroidea").val();
		albumina_suero = $("#albumina_suero").val();
		fosforo_suero = $("#fosforo_suero").val();
		nitrogeno_ureico = $("#nitrogeno_ureico").val();
		acido_urico_suero = $("#acido_urico_suero").val();
		calcio = $("#calcio").val();
		sodio_suero = $("#sodio_suero").val();
		potasio_suero = $("#potasio_suero").val();
		hierro_total = $("#hierro_total").val();
		ferritina = $("#ferritina").val();
		transferrina = $("#transferrina").val();
		fosfatasa_alcalina = $("#fosfatasa_alcalina").val();
		acido_folico_suero = $("#acido_folico_suero").val();
		vitamina_b12 = $("#vitamina_b12").val();
		nitrogeno_ureico_orina_24 = $("#nitrogeno_ureico_orina_24").val();

        var resultado = window.confirm('Estas seguro de enviar el formulario?');

        if (resultado === true) {

            if (fecha != "") {

                $.ajax({
                    url: "<?php echo base_url() . 'index.php/CHistoria/agregar_paraclinico'; ?>",
                    type: 'POST',
                    data: {
                        fecha: fecha,
                        doc: doc,
                        colesterototal: colesterototal,
                        colesterolhdl: colesterolhdl,
                        trigliceridos: trigliceridos,
						colesterolldl: colesterolldl,
						hemoglobina: hemoglobina,
						hematocrocito: hematocrocito,
						plaquetas: plaquetas,
						hemoglobina_glicosilada: hemoglobina_glicosilada,
						glicemia_basal: glicemia_basal,
						glicemia_post: glicemia_post,
						creatinina: creatinina,
						creatinuria: creatinuria,
						microalbuminuria: microalbuminuria,
						albumina: albumina,
						relacion_albuminuria_creatinuria: relacion_albuminuria_creatinuria,
						parcial_orina: parcial_orina,
						depuracion_creatinina: depuracion_creatinina,
						creatinina_orina_24: creatinina_orina_24,
						proteina_orina_24: proteina_orina_24,
						hormona_estimulante_tiroides: hormona_estimulante_tiroides,
						hormona_paratiroidea: hormona_paratiroidea,
						albumina_suero: albumina_suero,
						fosforo_suero: fosforo_suero,
						nitrogeno_ureico: nitrogeno_ureico,
						acido_urico_suero: acido_urico_suero,
						calcio: calcio,
						sodio_suero: sodio_suero,
						potasio_suero: potasio_suero,
						hierro_total: hierro_total,
						ferritina: ferritina,
						transferrina: transferrina,
						fosfatasa_alcalina: fosfatasa_alcalina,
						acido_folico_suero: acido_folico_suero,
						vitamina_b12: vitamina_b12,
						nitrogeno_ureico_orina_24: nitrogeno_ureico_orina_24
                    },

                    success: function(result) {
                        $("#data_paraclinico").load(" #data_paraclinico");
                        $('#fecha').val("");
                        $('#colesterototal').val("");
                        $('#colesterolhdl').val("");
                        $('#trigliceridos').val("");
						$('#colesterolldl').val("");
						$('#hemoglobina').val("");
						$('#hematocrocito').val("");
						$('#plaquetas').val("");
						$('#hemoglobina_glicosilada').val("");
						$('#glicemia_basal').val("");
						$('#glicemia_post').val("");
						$('#creatinina').val("");
						$('#creatinuria').val("");
						$('#microalbuminuria').val("");
						$('#albumina').val("");
						$('#relacion_albuminuria_creatinuria').val("");
						$('#parcial_orina').val("");
						$('#depuracion_creatinina').val("");
						$('#creatinina_orina_24').val("");
						$('#proteina_orina_24').val("");
						$('#hormona_estimulante_tiroides').val("");
						$('#hormona_paratiroidea').val("");
						$('#albumina_suero').val("");
						$('#fosforo_suero').val("");
						$('#nitrogeno_ureico').val("");
						$('#acido_urico_suero').val("");
						$('#calcio').val("");
						$('#sodio_suero').val("");
						$('#potasio_suero').val("");
						$('#hierro_total').val("");
						$('#ferritina').val("");
						$('#transferrina').val("");
						$('#fosfatasa_alcalina').val("");
						$('#acido_folico_suero').val("");
						$('#vitamina_b12').val("");
						$('#nitrogeno_ureico_orina_24').val("");
                        $('#collapseTwo').hide();
                        $('#mens_paraclinico').show();
                        $("#mens_paraclinico").html(result);

                    }
                });

            }else {

                html = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>No deje campos vacíos<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
                $('#mens_paraclinico').show();
                $("#mens_paraclinico").html(html);


            }


        }else { 
            window.alert('Pareces indeciso!!!');
        }


});
</script>