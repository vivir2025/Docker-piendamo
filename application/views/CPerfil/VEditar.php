<!-- This is the view where you modify the user's information ... -->
<div class="container ">  
	<br>
	<hr>	
	<h6 class="row justify-content-center" style="color:#FFFFFF ";>DATOS DE USUARIO</h6><hr>
	<?php echo form_open_multipart('CPerfil/Editar');
	foreach ($usuario as $usu) { ?>

		<div class="form-row ">
			<div class="form-group col-md-4 ">
				<label for="inputPassword4"style="color:#FFFFFF";>Documento</label>
				<input class="form-control" name="documento" type="text " required="" value="<?= $usu->usuDocumento; ?>">
			</div>
			<div class="form-group col-md-4">
				<label for="inputPassword4"style="color:#FFFFFF";>Nombre</label>
				<input class="form-control" name="nombre" type="text" required="" value="<?= $usu->usuNombre; ?>">
			</div>
			<div class="form-group col-md-4 ">
				<label for="inputPassword4"style="color:#FFFFFF";>Apellido</label>
				<input class="form-control" name="apellido" type="text" required="" value="<?= $usu->usuApellido; ?>">
			</div>
		</div>
		<br>
		<div class="form-row">

			<div class="form-group col-md-6 ">
				<label for="inputEmail4"style="color:#FFFFFF";>Telefono</label>
				<input class="form-control" name="telefono" value="<?= $usu->usuTelefono; ?>" type="text" required="">
			</div>
			<div class="form-group col-md-6 ">
				<label for="inputEmail4"style="color:#FFFFFF";>Correo</label>
				<input class="form-control" name="correo" value="<?= $usu->usuCorreo; ?>" type="email" required="">
			</div>

		</div>
		<br>
		<div class="form-row">

			<div class="form-group col-md-6 ">
				<label for="inputEmail4"style="color:#FFFFFF";>Login</label>
				<input class="form-control" name="login" value="<?= $usu->usuLogin; ?>" type="text" required="">
			</div>
		
			<div class="form-group col-md-6 ">
				<label for="inputEmail4"style="color:#FFFFFF";>Contraseña</label>
				<input class="form-control" name="pwd" value="<?= $usu->usuClave; ?>" type="password" required="">
			</div>
		</div>
		<hr>
	    <div class="card-body p-30 text-center " >

			<div class="form-group col-md-12">
				<input type="submit" name="submit" value="Actualizar Cuenta" class="btn btn-primary" />
			</div>
		</div>
		<?php
	}
	?>

	</body>
</div>