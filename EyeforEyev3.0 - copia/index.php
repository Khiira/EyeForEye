
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bienvenido | EyeForEye</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style_index.css">

	<link href="css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="logo/32x32.png" type="image/*">
	

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg " >
				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand logo" href="index.php"><span style="color: #03ad14;">Eye</span><span style="color: #ffffff;">For</span><span
				style="color: #03ad14;">Eye</span></a>
			
				<form action="ctr_login.php" method="post">	
				<div class="collapse navbar-collapse formulario-ingreso" id="bs-example-navbar-collapse-1">		
						<ul class="navbar-nav ml-md-auto">						
							<li class="nav-item active">
								<label for="input_email">Correo Electronico</label><br>
								<input type="email" name="input_email" id="" placeholder="Correo Electronico" required>
							</li>
							<li class="nav-item ml-md-auto">
								<label for="input_contra">Contraseña</label><br>
								<input type="password" name="input_contra" placeholder="Contraseña"id="" required>

							</li>
							<li class="nav-item ml-md-auto">
								<br>
								<button class="btn_ingreso button">Ingresar</button>

							</li>
						</ul>	
				</div>
				</form>	
			</nav>
			<div class="content-tit">
				<div class="titulo">
					<h5 class="text-center "><b><em>"Las ideas mueven al mundo, pero no antes de transformarse en sentimientos"</em></b></h5>
					<h6 class="text-center ">Gustave Le Bon</h6>
				</div>
			</div>
			
			<div class="contenedor">
				<img src="img/Comunidad.jpg" alt="">
				<div class="texto-encima">
					<h1>¿Quieres Unirte a la Comunidad?</h1>
					<br>
				<a href="crear_registro.php"><button class="button" >Registarse</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>