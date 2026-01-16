

<!-- This view is for generating TXT file with information to synchronize patient -->
<div class="container bg-white text-center">
<body
        style="background:linear-gradient(20deg, #2a327d,#2a327d, #166a28, #166a28, #2a327d,#2a327d);">

<div>
	<hr>
	<div>
		Generar backups paciente
	</div>
<hr>

	<div>
	<label class= "text-left" >
		<form action="<?= site_url('CBackup/exportar_sql_paciente') ?>" method="post">
			<table border="0" cellpading="0" cellspacing="0">
					<tr>
						<td width="80">
							<div align="left"><span> Desde:</span></div>
						</td>
						<td width="180">
							<input type="date" name="fecha" class="form-control" required="">
						</td>

						<td width="80"><span>Hasta: </span></td>
						<td width="170">
							<input required="" type="date" name="fecha1" class="form-control">
						</td>
						<td width="160">
							<center><button type="submit" class="btn btn-primary">Generar</button></center>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</label>
	</div>
</div> 