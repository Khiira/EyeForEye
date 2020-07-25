<?php
	include ('conexion.php');
	$query=mysqli_query($mysqli,"SELECT  * FROM ciudad" );
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style_index.css">
	<link rel="shortcut icon" href="logo/32x32.png" type="image/*">
	<title>EyeforEye | Registro</title>
  <script type"text/javascript" src="validaciones/validarformulario.js"></Script>

  </head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand logo" href="index.php"><span style="color: #03ad14;">Eye</span><span style="color: #ffffff;">For</span><span
			style="color: #03ad14;">Eye</span></a>
	
				
			</nav>
		</div>
	</div>


		<div class="row d-flex justify-content-center">
			<div class="col-md-5">
			
				<form role="form" enctype="multipart/form-data" action="ctr_registro.php" method="post" required onsubmit="return validarformulario()">
					<h1  >Datos Personales</h1>
					<div class="form-group">
						<label for="campo_run">Run</label>
						<input type="text" class="form-control" id="txtRun" name="txtRun" min="10" max="10" required oninput="checkRut(this)" />
					</div>
					<div class="form-group">
						<label for="campo_nombre">Nombre</label>
						<input type="text" class="form-control" name="txtNombre" required onkeypress="return sololetras(event)" />
					</div>
					<div class="form-group">
						<label for="campo_apellidos">Apellidos</label>
						<input type="text" class="form-control" name="txtApellidos" required onkeypress="return sololetras(event)" />
					</div>
					<div class="form-group">
						<label for="campo_sexo">Sexo</label>
						<select class="custom-select" name="s_sexo">
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>
							<option value="O">Otro</option>
							<option value="PND">Prefiero no decir</option>
						</select>
					</div>
					<div>
						<label for="campo_NumTel" >Numero Telefonico</label>
						<input type="tel" class="form-control" name="id_numtel" required onkeypress="return solonumeros(event)"/>
					</div>
					<div>
						<label for="campo_Direccion">Direccion</label>
						<input type="text" class="form-control" name="txtDireccion" required />
					</div>
					<div>
						<label for="campo_fecha_de_nacimiento">Fecha de Nacimiento</label>
						<input type="date" class="form-control" name="txtFecha" min="1910-01-01" max="2003-12-31" required/>
					</div>
					<div>
						<label for="campo_ciudad">Ciudad</label>
						
						<select class="custom-select" name="s_ciudad" >
						<?php
							while($datos = mysqli_fetch_array($query))
							{

						?>
							<option value="<?php echo  $datos['ID_Ciudad']?>"> <?php echo $datos['Ciudad']?> </option>
						<?php
							}
						?>
						</select>
					</div>
					<div>
						<label for="campo_direccion">Correo Electronico</label>
						<input type="email" class="form-control" name="txtCorreo" required />
					</div>
					<div>
						<label for="campo_contraseña">Contraseña</label>
						<input type="password" class="form-control" name="txtContraseña" required />
					</div>
					<div>
                        <label for="campo_confirmar_contraseña">Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="txtconf_contrasena" required/>
					</div>
<br>
	<h1>Antecedentes</h1>
					<div>
						<label for="campo_foto_carnet_frontal">Foto del Carnet (Frontal)</label>
						<input type="file" class="form-control" name="foto_carnet_frontal" accept="image/png, .jpeg, .jpg" />
					</div>
					<div>
						<label for="campo_foto_carnet_reverso">Foto del Carnet (Reverso)</label>
						<input type="file" class="form-control" name="foto_carnet_reverso" accept="image/png, .jpeg, .jpg" />
					</div>
					<div>
						<label for="campo_foto_carnet_reverso">Foto de Rostro (Frontal)</label>
						<input type="file" class="form-control" name="foto_rostro" accept="image/png, .jpeg, .jpg"/>
					</div>
					<div>
						<label for="campo_antecedentes">Antecedentes</label>
						<input type="file" class="form-control" name="registro_antecedentes" accept="image/png, .jpeg, .jpg"/>
					</div>
              <br>
              
					<div class="text-center" >
						<input type="submit" class="btn btn-success"  />
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>