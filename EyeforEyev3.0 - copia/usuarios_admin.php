<?php
	include ('conexion.php');
	include ('sesion.php');
	$query=mysqli_query($mysqli,"SELECT * FROM usuario WHERE  ID_Estado = 1");
	
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usuarios | EyeForEye</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style_home_user.css">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style_index.css">
	<link rel="shortcut icon" href="logo/32x32.png" type="image/*">
	<script src="https://kit.fontawesome.com/905b5c6ad5.js" crossorigin="anonymous"></script>


  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand logo" href="home_admin.php"><span style="color: #03ad14;">Eye</span><span style="color: #ffffff;">For</span><span
			style="color: #03ad14;">Eye</span</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav menu active">
						<li><a href="">Ofrecido</a></li>						
					</ul>
					<ul class="navbar-nav menu o">
						<li><a href="">Necesita</a></li>
					</ul>
					
					<form class="form-inline">
						<input class="form-control  mr-sm-2" type="text"> 
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</form>
					
					<ul class="navbar-nav ml-md-auto menu_icons_nav">
					
						
						<li>
							<a href="cuenta_admin.php" class="icons"><button class="btn_icons"><i class="fas fa-user"></i></button></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="row btn_pag">
		<div class="col-md-4">
			 
			<a href="publicacion_admin.php"><button type="button" class="btn btn-success btn-block btn_pasos">
				Publicaciones
			</button></a>
			<a href="denuncias_admin.php"><button type="button" class="btn btn-success btn-block btn_pasos">
				Denuncias
			</button></a>
			<a href="avisos_admin.php"><button type="button" class="btn btn-success btn-block btn_pasos">
				Avisos
			</button></a> 
			<a href="usuarios_admin.php"><button type="button" class="btn btn-success btn-block btn_pasos">
				Usuarios
			</button></a>
			<a href="cuenta_admin.php"><button type="button" class="btn btn-success btn-block btn_pasos">
				Cuenta
			</button></a>
		</div>
		
				
			<div class="col-md-8 ">
				<div class="content-dashboard">
					<table class="table-denuncias">
						<tr>
							<td>RUN</td>
							<td>Nombre</td>
							<td>Apellido</td>
							<td>Correo Electronico</td>
							<td>sexo</td>
							<td>fecha nacimiento</td>
						</tr>
						<?php
							while($datos = mysqli_fetch_array($query))
							{
							
						?>
						<tr>
							<td><?php echo $datos['Run_User']?></td>
							<td><?php echo $datos['Nombre_User']?></td>
							<td><?php echo $datos['Apellido_User']?></td>
							<td><?php echo $datos['CorreoElectronico']?></td>
							<td><?php echo $datos['Sexo']?></td>
							<td><?php echo $datos['FechaNacim']?></td>
							<td><a href="usuarios_admin2.php?ID=<?php echo $datos['Run_User']?>"><button>Revisar</button></a></td>
						</tr>
						<?php
							}
						?>
					</table>
				</div>
			</div>
				
			
		
	</div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>