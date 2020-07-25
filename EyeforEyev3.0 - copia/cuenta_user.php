<?php
include ("conexion.php");
include ("sesion.php");


$run = (isset($_GET['userio']))?$_GET['userio']:$_SESSION['usuario'];

$query=mysqli_query($mysqli,"SELECT * FROM usuario WHERE Run_User = '$run'");

$mostrar=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cuenta | EyeForEye</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style_home_user.css">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style_menu_publis.css">
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
				</button> <a class="navbar-brand logo" href="home_user_ofre.php"><span style="color: #03ad14;">Eye</span><span style="color: #ffffff;">For</span><span
			style="color: #03ad14;">Eye</span</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="navbar-nav menu active">
						<li><a href="home_user_ofre.php">Ofrecido</a></li>						
					</ul>
					<ul class="navbar-nav menu o">
						<li><a href="home_user_nec.php">Necesita</a></li>
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
			 
             <a href="mis_publicaciones.php"><button type="button" class="btn btn-success btn-block btn_pasos">
                 Mis Publicaciones
             </button></a>
             <a href="Categorias_user.php"><button type="button" class="btn btn-success btn-block btn_pasos">
                 Categorias
             </button></a>
             <a href="cuenta_user.php"><button type="button" class="btn btn-success btn-block btn_pasos">
                 Cuenta
             </button></a>
         </div>
		<div class="col-md-8  content-cuenta">
			<div class="row card">
			
					<!--<div class="col-lg-12 text-right p-2">
						<i class="fa fa-list" aria-hidden="true"></i>
					</div>-->
					<div class="col-lg-12 card-img text-center p-2">
						<img src="'.$mostrar['Img_Rostro'].'" class="rounded-circle">
						<!--<div class="badge badge-pill badge-danger p-1">2</div>-->
					</div>
					<div class="col-lg-12 text-center card-detail pt-3 pb-5">
						<h2><?php echo $mostrar['Nombre_User']?> <?php echo $mostrar['Apellido_User']?> </h2>
						<span>Usuario</span>
						<hr class="border">
						Nombre: <h3><?php echo $mostrar['Nombre_User']?> <?php echo $mostrar['Apellido_User']?></h3>
						Correo: <h3><?php echo $mostrar['CorreoElectronico']?></h3>
						Fecha de nacimiento: <h3><?php echo $mostrar['FechaNacim']?></h3>
						Dirección: <h3><?php echo $mostrar['Direccion']?></h3>
						Telefono: <h3><?php echo $mostrar['NumeroTelefonico']?></h3>
					</div>
			</div>
			<a href="modificar.php"$><button class="btn_cuenta">Modificar</button></a>
			<a href="cerrarSesion.php"$><button  class="btn_cuenta">Cerrar Sesion</button></a>
			
			
		</div>
			

			
		
	</div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>