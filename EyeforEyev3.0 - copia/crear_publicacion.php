<?php
	include ('conexion.php');
	include ("sesion.php");

	

	$query =mysqli_query($mysqli, "SELECT * FROM categoria");
	$query2 =mysqli_query($mysqli, "SELECT * FROM tipopublicacion ");

	?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Crear Publicaciones | EyeForEye</title>

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
				</button> <a class="navbar-brand logo" href="Home_user_ofre.php"><span style="color: #03ad14;">Eye</span><span style="color: #ffffff;">For</span><span
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
						<a href="crear_publicacion.php" class="icons"> <button class="btn_icons"><i class="fas fa-plus"></i></button></a>
						</li>
						<li>
							<a href="mensajes.php"  class="icons"><button class="btn_icons"><i class="far fa-comments"></i></button></a>
						</li>
						<li>
							<a href="#" class="icons"><button class="btn_icons"><i class="fas fa-bell"></i></button></a>
						</li>
						<li>
							<a href="cuenta_user.php" class="icons"><button class="btn_icons"><i class="fas fa-user"></i></button></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="row btn_pag">
		<div class="col-md-4">
			 
			<a href="mis_publicaciones"><button type="button" class="btn btn-success btn-block btn_pasos">
				Mis Publicaciones
			</button></a>
			<a href="Categorias_user.php"><button type="button" class="btn btn-success btn-block btn_pasos">
				Categorias
			</button></a>
			<a href="cuenta_user.php"><button type="button" class="btn btn-success btn-block btn_pasos">
				Cuenta
			</button></a>
		</div>
		<div class="col-md-4">
		<form action="ctr_user.php" method="post">
				<table>
					<tr>
						<td>Tipo Publicacion</td>
					</tr>
					<tr>
						<td><select name="s_tipubli" id="">
						<?php 
							while($datos = mysqli_fetch_array($query2))
							{									
						?>
							<option value="<?php echo $datos['ID_TipoPublicacion']?>"><?php echo $datos['Nombre_tipo']?></option>
						<?php 
							}
						?>
						</select></td>
					</tr>
					<tr>
						<td>Categoria</td>
					</tr>
					<tr>
						<td><select name="s_categoria" id="">
						<?php 
							while($datos = mysqli_fetch_array($query))
							{
						?>
							<option value="<?php echo $datos['ID_Categoria']?>"><?php echo $datos['NombreCategoria']?></option>
						<?php 
							}
						?>
						</select></td>
					</tr>
					<tr>
						<td><textarea name="txtA_contenido" id="" cols="30" rows="10"></textarea></td>
					</tr>
					<tr>
						<td><button name="a" value="publi">Crear</button></td>
					</tr>
				</table>
			</div>

			<div class="col-md-4">
				
			</div>
		</form>
	</div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>