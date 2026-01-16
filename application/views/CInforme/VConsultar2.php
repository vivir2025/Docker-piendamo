<div class="container bg-white text-center">
	<div>
		<hr>
		<div>
			Generar Reporte Dinamico
		</div>
<hr>

<label class= "text-left" >
		<div>
			<form method="post" action="<?= site_url('CInforme/exportar_2') ?>">
				<table border="0" cellpading="0" cellspacing="0">
					<tr>
						<td width="80">
							<div align="left"><span> Desde:</span></div>
						</td>
						<td width="180">
							<input type="date" name="fecha" id="fecha" class="form-control">
						</td>

						<td width="80"><span>Hasta: </span></td>
						<td width="170">
							<input type="date" name="fecha1" id="fecha1" class="form-control">
						</td>
						<br>
						 <td width="80"><span>Brigada: </span></td>
                            <td width="200">
                                
											<?php
												$ci = &get_instance(); // Obtener una instancia de CodeIgniter
												$consulta = $ci->db->query("SELECT * FROM brigada");
												$brigadas = $consulta->result();
											?>
						
								<select name="id_brigada" class="form-control">
											<option value="">[Seleccionar Brigada]</option>
											<?php foreach ($brigadas as $brigada) { ?>
												<option value="<?= $brigada->idBrigada ?>"><?= $brigada->briNombre ?></option>
											<?php } ?>
								</select>
						</td>
						
						
					</tr>
				</table>
				<br>
			
                <input type="checkbox" onclick="toggleList('seleccionar')">Selecciona los campos que deseas exportar
				
			
				<ul id="seleccionar" style="display: none;" class="checkbox-container">
            
                <h6 class="btn btn-primary" onclick="toggleList('datosPaciente')"><strong>Datos Paciente</strong></h6> 
    

             <ul id="datosPaciente" style="display: none;" class="checkbox-container">

          
             <li><input type="checkbox" id="selectAlldatosPaciente" onclick="selectAllCheckboxes('datosPaciente')"><strong> Seleccionar Todo</strong></li>
             <hr>
               <li><label><input type="checkbox" name="campos[]" value="Nombre">Primer Nombre</label></li>
               <li><label><input type="checkbox" name="campos[]" value="Seg Nombre">Segundo Nombre</label></li>
               <!-- Agrega aquí los demás campos con sus respectivos nombres y valores -->
                <!-- Ejemplo: -->
				<li><label><input type="checkbox" name="campos[]" value="Apellido">Primer Apellido</label></li> 
				<li><label><input type="checkbox" name="campos[]" value="Apellido2">Segundo Apellido</label></li> 
				<li><label><input type="checkbox" name="campos[]" value="Tipo Documento">Tipo Documento</label></li> 
				<li><label><input type="checkbox" name="campos[]" value="Identificación">Identificación</label></li>
				 <li><label><input type="checkbox" name="campos[]" value="Fecha de nacimiento">Fecha de nacimiento</label></li>
				 <li><label><input type="checkbox" name="campos[]" value="Edad">Edad</label></li> 
				 <li><label><input type="checkbox" name="campos[]" value="Genero">Genero</label></li>
				 <li><label><input type="checkbox" name="campos[]" value="Departamento Afiliado">Departamento Afiliado</label></li>
				 <li><label><input type="checkbox" name="campos[]" value="Municipio Afiliado">Municipio Afiliado</label></li> 
				 <li><label><input type="checkbox" name="campos[]" value="Telefóno">Telefóno</label></li>

                 <li><label><input type="checkbox" name="campos[]" value="Grupo Etnico">Grupo Etnico</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Grupo Poblacion">Grupo Poblacion</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Orientacion Sexual">Orientacion Sexual</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Tipos de Discapacidad">Tipos de Discapacidad</label></li>
                
                 <li><label><input type="checkbox" name="campos[]" value="Codigo Ocupacion">Codigo Ocupacion</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Escolaridad">Escolaridad</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Codigo DANE Municipio de Residencia">Codigo DANE Municipio de Residencia</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Descripcion Municipio de Residencia">Descripcion Municipio de Residencia</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Direccion de Residencia">Direccion de Residencia</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Zona">Zona</label></li>
                </ul>
                
                <h6 class="btn btn-primary" onclick="toggleList('datoshistoria')"><strong>Datos historia Clinica</strong></h6> 
              
                <ul id="datoshistoria" style="display: none;" class="checkbox-container">
                <li><input type="checkbox" id="selectAlldatoshistoria" onclick="selectAllCheckboxes('datoshistoria')"><strong> Seleccionar Todo</strong></li>
                <hr>
                <li><label><input type="checkbox" name="campos[]" value="Peso (kg)">Peso (kg)</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Talla (cms)">Talla (cms)</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="IMC">IMC</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Perimetro de Cintura">Perimetro de Cintura</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Presion Arterial Sistolica">Presion Arterial Sistolica</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Presion Arterial Diastolica">Presion Arterial Diastolica</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Codigo Habilitacion IPS de Atencion">Codigo Habilitacion IPS de Atencion</label></li> 
                 <li><label><input type="checkbox" name="campos[]" value="Nombre IPS Atencion">Nombre IPS Atencion</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Fecha de Ingreso al Programa">Fecha de Ingreso al Programa</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Diagnostico HTA">Diagnostico HTA</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Fecha Diagnostico HTA">Fecha Diagnostico HTA</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Diagnostico DM">Diagnostico DM</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Fecha Diagnostico DM">Fecha Diagnostico DM</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Tipo de Diabetes">Tipo de Diabetes</label></li>

                 <li><label><input type="checkbox" name="campos[]" value="Diagnostico EPOC">Diagnostico EPOC</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Fecha Diagnostico EPOC">Fecha Diagnostico EPOC</label></li>
                
                 <li><label><input type="checkbox" name="campos[]" value="Diagnostico ERC">Diagnostico ERC</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Fecha Diagnostico ERC">Fecha Diagnostico ERC</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Dx Enfermedad Cardiaca Isquemica">Dx Enfermedad Cardiaca Isquemica</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Dx Enfermedad Cerebrovascular">Dx Enfermedad Cerebrovascular</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Dx Enfermedad Arterial Periferica">Dx Enfermedad Arterial Periferica</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Dx Insuficiencia Cardiaca">Dx Insuficiencia Cardiaca</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Dx Retinopatia">Dx Retinopatia</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Dx Aterosclerosis">Dx Aterosclerosis</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Discapacidad">Discapacidad</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Habito Tabaquico">Habito Tabaquico</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Cocina con Leña">Cocina con Leña</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="Fecha de Control">Fecha de Control</label></li>

                </ul>
                <h6 class="btn btn-primary" onclick="toggleList('datosparaclinicos')"><strong>Datos Paraclinicos</strong></h6> 
                
                <ul id="datosparaclinicos" style="display: none;" class="checkbox-container">
                <li><input type="checkbox" id="selectAlldatosparaclinicos" onclick="selectAllCheckboxes('datosparaclinicos')"><strong> Seleccionar Todo</strong></li>
                <hr>
                 <li><label><input type="checkbox" name="campos[]" value="colesterol_total">colesterol_total</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="colesterol_hdl">colesterol_hdl</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="trigliceridos">trigliceridos</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="colesterol_ldl">colesterol_ldl</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="hemoglobina">hemoglobina</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="hematocrocito">hematocrocito</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="plaquetas">plaquetas</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="hemoglobina_glicosilada">hemoglobina_glicosilada</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="glicemia_basal">glicemia_basal</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="glicemia_post">glicemia_post</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="creatinina">creatinina</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="creatinuria">creatinuria</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="microalbuminuria">microalbuminuria</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="albumina">albumina</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="relacion_albuminuria_creatinuria">relacion_albuminuria_creatinuria</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="parcial_orina">parcial_orina</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="depuracion_creatinina">depuracion_creatinina</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="creatinina_orina_24">creatinina_orina_24</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="proteina_orina_24">proteina_orina_24</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="hormona_estimulante_tiroides">hormona_estimulante_tiroides</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="hormona_paratiroidea">	hormona_paratiroidea</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="albumina_suero">albumina_suero</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="fosforo_suero">fosforo_suero</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="nitrogeno_ureico">nitrogeno_ureico</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="acido_urico_suero">acido_urico_suero</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="calcio">calcio</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="sodio_suero">sodio_suero</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="potasio_suero">potasio_suero</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="hierro_total">hierro_total</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="ferritina">ferritina</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="transferrina">transferrina</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="fosfatasa_alcalina">fosfatasa_alcalina</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="acido_folico_suero">acido_folico_suero</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="vitamina_b12">vitamina_b12</label></li>
                 <li><label><input type="checkbox" name="campos[]" value="nitrogeno_ureico_orina_24">nitrogeno_ureico_orina_24</label></li>
                 
                 
                </ul>
                 
              
                <h6 class="btn btn-primary" onclick="toggleList('datosolicitud')"><strong>Datos Solicitud</strong></h6> 
               
                <ul id="datosolicitud" style="display: none;" class="checkbox-container">
                <li><input type="checkbox" id="selectAlldatosolicitud" onclick="selectAllCheckboxes('datosolicitud')"><strong> Seleccionar Todo</strong></li>
                <hr>
				 <li><label><input type="checkbox" name="campos[]" value="Fecha Solicitud Cita">Fecha Solicitud Cita</label></li> 
				 <li><label><input type="checkbox" name="campos[]" value="Fecha en que el usuario le asigna la cita">Fecha en que el usuario le asigna la cita</label></li> 
				<li><label><input type="checkbox" name="campos[]" value="Fecha Que se le asigna la cita">Fecha Que se le asigna la cita</label></li>
				<li><label><input type="checkbox" name="campos[]" value="Departamento IPS">Departamento IPS</label></li>
				<li><label><input type="checkbox" name="campos[]" value="NIT">NIT</label></li>
                <li><label><input type="checkbox" name="campos[]" value="Codigo Habilitacion">Codigo Habilitacion</label></li>
                

				<li><label><input type="checkbox" name="campos[]" value="Razon Social de Institución prestadora de servicios">Razon Social de Institución prestadora de servicios</label></li>

				<li><label><input type="checkbox" name="campos[]" value="Servicio Solicitado">Servicio Solicitado</label></li>
				<li><label><input type="checkbox" name="campos[]" value="Regimen">Regimen</label></li>
				<li><label><input type="checkbox" name="campos[]" value="Cups">Cups</label></li>
				<li><label><input type="checkbox" name="campos[]" value="Zona">Zona</label></li>
				<li><label><input type="checkbox" name="campos[]" value="Inicio de cita">Inicio de cita</label></li>
				<li><label><input type="checkbox" name="campos[]" value="Finalización Cita">Finalización Cita</label></li>
				<li><label><input type="checkbox" name="campos[]" value="Medico">Medico</label></li>
				<li><label><input type="checkbox" name="campos[]" value="Auxiliar">Auxiliar</label></li>
        <li><label><input type="checkbox" name="campos[]" value="Tipo Profesional">Tipo Profesional</label></li>
        <li><label><input type="checkbox" name="campos[]" value="Codigo Trabajo">Codigo Trabajo</label></li>

                <br>
              
			

                </ul>
				<br><br>

     <button id="exportButton"  align="right" type="submit" class="btn btn-danger">Generar</button>              	
    </ul>
    
  
			</form>
           
							
      <div id="loadingOverlay" style="display: none;">
 
      <div class="loader">
    <span class="loader-text">Descargando......<br>
  </span>
      <span class="load"></span>
  </div>


</label>

<style>
  
     .checkbox-container {
                max-height: 450px;
                overflow-x: auto;
                border: 1px solid #ccc;
                padding: 10px;
                margin-top: 5px;
            }
            #loadingOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5 );
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }




  .loader {
    width: 200px;
    height: 100px;
    position: fixed; /* Utilizamos 'fixed' para posicionar en relación a la ventana del navegador */
    top: 50%; /* Colocamos el 50% del elemento en el centro vertical */
    left: 50%; /* Colocamos el 50% del elemento en el centro horizontal */
    transform: translate(-50%, -50%); /* Centramos el elemento moviéndolo hacia arriba y hacia la izquierda en la mitad de su tamaño */
    /* Otra forma de centrar sería usando márgenes negativos en lugar de transform: translate */
    /* margin-top: -25px; // La mitad de la altura */
    /* margin-left: -40px; // La mitad del ancho */
  }



.loader-text {
  position: absolute;
  top: 0;
  padding: 0;
  margin: 0;
  color: #FFFFFF ;
  animation: text_713 3.5s ease both infinite;
  font-size: .8rem;
  letter-spacing: 1px;
}

.load {
  background-color: #FFFFFF ;
  border-radius: 50px;
  display: block;
  height: 16px;
  width: 16px;
  bottom: 0;
  position: absolute;
  transform: translateX(64px);
  animation: loading_713 3.5s ease both infinite;
}

.load::before {
  position: absolute;
  content: "";
  width: 100%;
  height: 100%;
  background-color: #089544 ;
  border-radius: inherit;
  animation: loading2_713 3.5s ease both infinite;
}

@keyframes text_713 {
  0% {
    letter-spacing: 1px;
    transform: translateX(0px);
  }

  40% {
    letter-spacing: 2px;
    transform: translateX(26px);
  }

  80% {
    letter-spacing: 1px;
    transform: translateX(32px);
  }

  90% {
    letter-spacing: 2px;
    transform: translateX(0px);
  }

  100% {
    letter-spacing: 1px;
    transform: translateX(0px);
  }
}

@keyframes loading_713 {
  0% {
    width: 16px;
    transform: translateX(0px);
  }

  40% {
    width: 100%;
    transform: translateX(0px);
  }

  80% {
    width: 16px;
    transform: translateX(64px);
  }

  90% {
    width: 100%;
    transform: translateX(0px);
  }

  100% {
    width: 16px;
    transform: translateX(0px);
  }
}

@keyframes loading2_713 {
  0% {
    transform: translateX(0px);
    width: 16px;
  }

  40% {
    transform: translateX(0%);
    width: 80%;
  }

  80% {
    width: 100%;
    transform: translateX(0px);
  }

  90% {
    width: 80%;
    transform: translateX(15px);
  }

  100% {
    transform: translateX(0px);
    width: 16px;
  }
}
 
 



</style>
<script>
function toggleList(listId) {
  var list = document.getElementById(listId);
  if (list.style.display === "none") {
    list.style.display = "block";
  } else {
    list.style.display = "none";
  }
}

// Función para seleccionar o deseleccionar todos los checkboxes de una lista
function selectAllCheckboxes(listId) {
  var list = document.getElementById(listId);
  var checkboxes = list.querySelectorAll("input[type='checkbox']");

  var selectAllCheckbox = document.getElementById("selectAll" + listId);
  checkboxes.forEach(function (checkbox) {
    checkbox.checked = selectAllCheckbox.checked;
  });
}
// Función para agregar campos a la lista dinámicamente
function agregarCampos() {
    var checkboxList = document.getElementById("checkboxList");

   

    // Recorre el array y agrega los campos a la lista
    datosDefinidos.forEach(function(dato) {
        var li = document.createElement("li");
        var label = document.createElement("label");
        var checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.name = "campos[]";
        checkbox.value = dato.value;

        label.appendChild(checkbox);
        label.appendChild(document.createTextNode(dato.nombre));
        li.appendChild(label);
        checkboxList.appendChild(li);
    });
}



</script>






<script>
    // JavaScript para aplicar la clase "loading" después de un retraso de 2 segundos (2000 milisegundos)
    setTimeout(function() {
      var dots = document.querySelectorAll('.three-body__dot');
      dots.forEach(function(dot) {
        dot.classList.add('loading');
      });
    }, 2000);

    document.getElementById('exportButton').addEventListener('click', function() {
      // Show loading overlay
      var loadingOverlay = document.getElementById('loadingOverlay');
      loadingOverlay.style.display = 'block';

      // Simulate export process time (replace with your actual export code)
      var max_execution_time = 82012; // 1:22:12 seconds

      setTimeout(function() {
        // Hide loading overlay
        loadingOverlay.style.display = 'none';

        // TODO: Perform the export operation here

        // For demonstration, let's display an alert to indicate export completion
        alert('Descarga Completa :)');
      }, max_execution_time);
    });
  </script>