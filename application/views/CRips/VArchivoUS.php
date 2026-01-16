<div  align='center' class="container">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">

	<style>
		#text_welcome {
			position: relative;
			left: 22px;
		}

		.dependencia_ {
			display: none;
		}

		#content_welcome {

			position: absolute;
			top: 150px;
			font-size: 16px;
			padding: 8px;
			width: 600px;
			min-height: 206px;
			height: auto;
			left: 270px;
			border: 3px #007bff;
			border-style: solid double;
		}
	</style>
<!-- View where I can generate the RIPs according to regulations US -->
<div id="content_welcome" class="bg-light">
		<br>
		<div>
			Buscar y generar Rip US
		</div>
		<br>

		<div id="text_welcome">
			<form action="<?= site_url('CRips/exportar_us') ?>" method="post">
				<table border="0" cellpading="0" cellspacing="0">
					<tr>
						<td width="56">
							<div align="left"><span>EPS: </span></div>
						</td>
						<td width="149">
							<select class="form-control" name='eps' required="" id="eps">
								<option value=''>[SELECCIONE]</option>
								<?php
								foreach ($empresa as $e) {
									echo "<option value={$e->idEmpresa}>{$e->empNombre}</option>";
								}
								?>
							</select>
						</td>
						<td width="80">
							<div align="left"><span>Contrato: </span></div>
						</td>
						<td width="180">
							<div id="contrato"></div>
						</td>
					</tr>
					<!--tr>
					<td width="56"><div align="left"><span>Regimen: </span></div></td>
						<td width="149">
							<select id='id_regimen' class="form-control" name='id_regimen'>
								<option value='0' selected="selected">Todas</option>

							</select>
						</td>
					</tr-->
					<tr>
						<td width="56">
							<div align="left"><span> Desde:</span></div>
						</td>
						<td width="149">
							<input type="date" name="fecha1" class="form-control" required="">
						</td>

						<td width="80"><span>Hasta: </span></td>
						<td width="180">
							<input required="" type="date" name="fecha2" class="form-control" value="<?php echo Date('Y-m-d'); ?>">
						</td>
					</tr>
				</table>
				<br />
				<center><button type="submit" class="btn btn-primary">Generar Rip</button></center>
			</form>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {

		$('#eps').change(function() {

			var id = $(this).val();

			if (id == "") {

				$("#contrato").hide();

			} else {

				$.ajax({
					url: '<?= base_url() ?>index.php/CRips/detalle_contrato',
					method: 'post',
					data: {
						id: id
					},
					dataType: 'json',

					success: function(data) {

						var len = data.length;

						if (len > 0) {

							var html = "<select id='idContrato' name='idContrato' class='form-control'>";
							for (key in data) {
								html += "<option value='" + data[key].idContrato + "'>" + data[key].conNumero + "</option>";
							}
							html += "</select>";
							$("#contrato").show();
							$('#contrato').html(html);
						}
					}
				});

			}

		});
	});
</script>
