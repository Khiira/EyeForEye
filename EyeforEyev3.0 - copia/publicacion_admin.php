<?php
	include ('conexion.php');
	include ('sesion.php');
	$query=mysqli_query($mysqli,"SELECT pu.ID_Publicacion as ID, pu.ID_EstadoPubli , pu.Contenido as Contenido, pu.Fecha as FechaDePublicacion, tp.Nombre_tipo as TipoPublicacion, ca.NombreCategoria as Categoria, us.Nombre_User as NombreUsuario, us.Img_Rostro as img_user 
	FROM publicacion as pu 
	JOIN tipopublicacion as tp on pu.ID_TipoPublicacion=tp.ID_TipoPublicacion JOIN categoria as ca on pu.ID_Categoria=ca.ID_Categoria JOIN usuario as us on pu.Run_Publicador=us.Run_User 
	WHERE pu.ID_EstadoPubli = 1
	ORDER BY pu.ID_publicacion DESC");
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Revision de publicaciones | EyeForEye</title>

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
		
				
			<div class="col-md-4">
				<?php
					while($datos = mysqli_fetch_array($query))
					{
				?>
				<div class="card bg-default publis">
					<h5 class="card-header">
					<a href=""><img src="img/<?php echo $datos['img_user']?>" alt="" class="img_user"></a><?php echo $datos['NombreUsuario']?>
					</h5>
					<div class="card-body">
						<p class="card-text">
							Tipo de Publicacion:<?php echo $datos['TipoPublicacion']?>
							<br>
							Categoria:<?php echo $datos['Categoria']?>
							<br>
							<?php echo time_passed($datos['FechaDePublicacion'])?>
							<br>
							<?php echo $datos['Contenido']?>
						</p>
					</div>
					<div class="card-footer">
						
					<a href="ctr_admin.php?r=<?php echo $datos['ID']?>&a=elim&id=publi"><button>Eliminar</button></a>
						
					</div>
				</div>
				<?php
					}
				?>

			</div>
				
			<div class="col-md-4">
				<div class="content-avisos">
					<h5>Avisos Y Denuncias</h5>
				</div>
			
			</div>
		
	</div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>