<input type="button" class="btn btn-danger no-print" onclick="history.back()" value="--- Regresar ---"><br><br>
<div class="container bg-white">
 <br>  
    <div id="data_paraclinico">   
    <?php if (count($vistaparaclinico) > 0) { ?>
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

                $dt = new DateTime($vistaparaclinico[0]->fecha);
                //echo $dt->format('d/m/Y');

                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>COLESTEROL TOTAL(mg/dl) : (Normal: <200 mg/dl, Moderardo: 200-239 mg/dl, Alto: >= 240 mg/dl.)</td>";
                echo "<td>" . $vistaparaclinico[0]->colesterol_total . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->colesterol_total . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
                echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>COLESTEROL HDL(mg/dl) : (40-60 mg/dl.)</td>";
                echo "<td>" . $vistaparaclinico[0]->colesterol_hdl . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->colesterol_hdl . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
                echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>TRIGLICERIDOS(mg/dl) : (Normal: <150mg/dl ,Limite alto: 150 - 199 mg/dl ,Alto: 200 - 499 mg/dl ,Muy alto: >= 500 mg/dl.)</td>";
                echo "<td>" . $vistaparaclinico[0]->trigliceridos . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->trigliceridos . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>COLESTEROL LDL(mg/dl) : (Optimo: <100 mg/dl)</td>";
                echo "<td>" . $vistaparaclinico[0]->colesterol_ldl . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->colesterol_ldl . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HEMOGLOBINA(g/dl): (10.6 - 13.5g/dl)</td>";
                echo "<td>" . $vistaparaclinico[0]->hemoglobina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->hemoglobina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HEMATOCROCITO(%): (32.9 - 41.2%)</td>";
                echo "<td>" . $vistaparaclinico[0]->hematocrocito . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->hematocrocito . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>PLAQUETAS(X10^3 / ML): (186 - 353)</td>";
                echo "<td>" . $vistaparaclinico[0]->plaquetas . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->plaquetas . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HEMOGLOBINA GLICOSILADA(Hb1AC) (%): (No diabetico: 4.0 - 5.6%, Prediabetico: 5.7 - 6.4%, Diabetes controlada: 6.5 - 7.0%)</td>";
                echo "<td>" . $vistaparaclinico[0]->hemoglobina_glicosilada . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->hemoglobina_glicosilada . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>GLICEMIA BASAL EN AYUNAS(mg/dl): (70 - 100 mg/dl)</td>";
                echo "<td>" . $vistaparaclinico[0]->glicemia_basal . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->glicemia_basal . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #FF5733;'>GLICEMIA POST-CARGA (PTOG 75 GR) (MG/DL)</td>";
                echo "<td>" . $vistaparaclinico[0]->glicemia_post . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->glicemia_post . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>CREATININA(mg/dl): (0.55 - 1.02 mg/dl)</td>";
                echo "<td>" . $vistaparaclinico[0]->creatinina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->creatinina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>CREATINURIA(mg/dl): (45 - 106 mg/dl, Masculino: 58 - 161 mg/dl )</td>";
                echo "<td>" . $vistaparaclinico[0]->creatinuria . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->creatinuria . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>MICROALBUMINURIA(mg/dl): (Hasta 15 mg/dl)</td>";
                echo "<td>" . $vistaparaclinico[0]->microalbuminuria . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->microalbuminuria . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>ALBUMINA(g/dl): (3.2 - 4.6 g/dL)</td>";
                echo "<td>" . $vistaparaclinico[0]->albumina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->albumina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>RELACIÓN ALBUMINURIA/CREATINURIA(A/C) (mg/g): (0 - 29.99 mg/g)</td>";
                echo "<td>" . $vistaparaclinico[0]->relacion_albuminuria_creatinuria . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->relacion_albuminuria_creatinuria . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>PARCIAL DE ORINA</td>";
                echo "<td>" . $vistaparaclinico[0]->parcial_orina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->parcial_orina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>DEPURACIÓN DE CREATININA(ml/min)</td>";
                echo "<td>" . $vistaparaclinico[0]->depuracion_creatinina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->depuracion_creatinina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>CREATININA DE ORINA EN 24 HORAS(mg/dia) : (Inferior a 250)</td>";
                echo "<td>" . $vistaparaclinico[0]->creatinina_orina_24 . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->creatinina_orina_24 . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>PROTEINA EN ORINA DE 24 HORAS(mg/dl): (0 - 300 mg/24 horas)</td>";
                echo "<td>" . $vistaparaclinico[0]->proteina_orina_24 . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->proteina_orina_24 . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HORMONA ESTIMULANTE DE TIROIDES ULTRASENSIBLE TSH (µU/ML): (0.350 - 4.940 uIU/mL)</td>";
                echo "<td>" . $vistaparaclinico[0]->hormona_estimulante_tiroides . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->hormona_estimulante_tiroides . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HORMONA PARATIROIDEA(c terminal) (pg/ml): (15 - 65 pg/ml)</td>";
                echo "<td>" . $vistaparaclinico[0]->hormona_paratiroidea . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->hormona_paratiroidea . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>ALBUMINA EN SUERO U OTROS FLUIDOS(g/dl):  (3.2 - 4.6 g/dL)</td>";
                echo "<td>" . $vistaparaclinico[0]->albumina_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->albumina_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>FÓSFORO EN SUERO  U OTROS FLUIDOS(mg/dl): (2.3 - 4.7 mg/dL)</td>";
                echo "<td>" . $vistaparaclinico[0]->fosforo_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->fosforo_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>NITRÓGENO UREÍCO(mg/dl): (8.0 - 23.0 mg/dL)</td>";
                echo "<td>" . $vistaparaclinico[0]->nitrogeno_ureico . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->nitrogeno_ureico . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>ÁCIDO ÚRICO EN SUERO U OTROS FLUIDOS(mg/dl): (2.5 - 6.2 mg/dL)</td>";
                echo "<td>" . $vistaparaclinico[0]->acido_urico_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->acido_urico_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>CALCIO (milimol/l): (8.4 - 10.2 mg/dl)</td>";
                echo "<td>" . $vistaparaclinico[0]->calcio . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->calcio . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>SODIO EN SUERO U OTROS FLUIDOS(meq/l): (136 - 145 mmol/L)</td>";
                echo "<td>" . $vistaparaclinico[0]->sodio_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->sodio_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>POTASIO EN SUERO U OTROS FLUIDOS(meq/l): (3.5 - 5.1 mmol/L)</td>";
                echo "<td>" . $vistaparaclinico[0]->potasio_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->potasio_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>HIERRO TOTAL(ug/dL): (50 - 170 ug/dL)</td>";
                echo "<td>" . $vistaparaclinico[0]->hierro_total . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->hierro_total . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>FERRITINA(ng/ml): (4.63-204 ng/mL)</td>";
                echo "<td>" . $vistaparaclinico[0]->ferritina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->ferritina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>TRANSFERRINA (mg/dl): (173 - 360 mg/dL)</td>";
                echo "<td>" . $vistaparaclinico[0]->transferrina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->transferrina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>FOSFATASA ALCALINA</td>";
                echo "<td>" . $vistaparaclinico[0]->fosfatasa_alcalina . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->fosfatasa_alcalina . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>ÁCIDO FÓLICO EN SUERO (ng/ml): (Deficiencia: < 3.5 ng/mL, Suficiencia: => 3.5 ng/mL)</td>";
                echo "<td>" . $vistaparaclinico[0]->acido_folico_suero . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->acido_folico_suero . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>VITAMINA B12[cianocobalamina] (pg/ml): (187-883 pg/ml )</td>";
                echo "<td>" . $vistaparaclinico[0]->vitamina_b12 . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->vitamina_b12 . "</td>";
                    echo "<td>" . $dt1->format('d/m/Y') . "</td>";
                }
				echo "</tr>";
                echo "<tr>";
                echo "<td style='background-color: #D5F3F1;'>NITRÓGENO UREÍCO EN ORINA DE 24 HORAS (g/24 horas)</td>";
                echo "<td>" . $vistaparaclinico[0]->nitrogeno_ureico_orina_24 . "</td>";
                echo "<td>" . $dt->format('d/m/Y') . "</td>";
                if (count($vistaparaclinico) > 1) {
                    $dt1 = new DateTime($vistaparaclinico[1]->fecha);
                    echo "<td>" . $vistaparaclinico[1]->nitrogeno_ureico_orina_24 . "</td>";
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
                        $("#data_paraclinico1").load(" #data_paraclinico");
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
                        $('#mens_paraclinico1').show();
                        $("#mens_paraclinico1").html(result);

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