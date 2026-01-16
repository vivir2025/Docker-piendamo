<!-- This is the view where it generates the base that is needed to report ... -->
<div class="container bg-white text-center">
	<div>
	<hr>
		<div>
			Generar Informe por Rango de Fecha
		</div>
		<hr>

		<div> 
<label class= "text-left" >	
			<form action="<?= site_url('CInforme/exportar') ?>" method="post">
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
	</div>
</label>


