<?php
include ('conexion.php');
include ('sesion.php');

$run = $_SESSION["usuario"];

$query=mysqli_query($mysqli,"SELECT * FROM usuario WHERE Run_User = '$run'");
$result = mysqli_fetch_array($query);


$userio = (isset($_GET["userio"]))?$_GET["userio"]:"";


			

if($userio == $result['Run_User'])
{
	header("Location: Home_user_ofre.php");
} else 
{
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    

    <title>Mensajes</title>


  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style_home_user.css">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style_index.css">
	<link rel="stylesheet" href="css/msg.css">
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
						<li><a href="Home_user_ofre.php">Ofrecido</a></li>						
					</ul>
					<ul class="navbar-nav menu o">
						<li><a href="Home_user_nec.php">Necesita</a></li>
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
			 <h5 class="title_contectos" style="color: #fff; text-align: center; margin-top:5%;">Contactos</h5>
			
			 <div id="contenedor-contactos" style="overflow:auto; height: 400px;">
			 <?php 
				 $chats = mysqli_query($mysqli,"SELECT * FROM c_chats WHERE de = '".$result['Run_User']."' OR para = '".$result['Run_User']."'");
				 while($c_chat = mysqli_fetch_array($chats)) 
				 {
					if($c_chat['de'] == $result['Run_User']){$var1 = $c_chat['para'];} elseif ( $c_chat['para'] == $result['Run_User']){$var1 = $c_chat['de'];}
					$usere = mysqli_query($mysqli,"SELECT * FROM usuario WHERE Run_User = '$var1' ");
					$us = mysqli_fetch_array($usere);
			 ?>
				<a href="mensajes.php?userio=<?php echo $us['Run_User']?>"><button type="button" class="btn btn-success btn-block btn_pasos">
					 <?php echo $us['Nombre_User']?>
				</button></a>
				<?php
				 }
				?>
			 </div>
			 
		 </div>
      <div class="col-md-6">
        <div id="contenedor-chat">
			<div id="caja-chat" style="overflow: auto; height: 400px;">
				<div id="chat" >
				
				<?php
					$user = $userio;
					$sess = $result['Run_User'];
					$chat = mysqli_query($mysqli,"SELECT * FROM chats WHERE de='$user' AND para = '$sess' OR de='$sess' AND para = '$user'");
					while($ch = mysqli_fetch_array($chat))
						{
					if($ch['de'] == $user) {$var = $user;} else {$var = $sess;}
					$usere = mysqli_query($mysqli,"SELECT * FROM usuario WHERE Run_User = '$var' ");
					$us = mysqli_fetch_array($usere);
				?>
				
				<?php if($ch['de'] == $user) {?>
				<div id="datos-chat" class="left">
					<span class="horChat"> <?php echo time_passed($ch['fecha']) ?></span>
					<span class="namChat"><?php echo $us['Nombre_User']?></span>
					<span class="textChat"><?php echo $ch['mensaje']?></span>
				</div>
				<?php } elseif ($ch['para'] == $user) {?>
				<div id="datos-chat" class="right">
					<span class="textChat"><?php echo $ch['mensaje']?></span>
					<span class="namChat"><?php echo $us['Nombre_User']?> </span>
					<span class="horChat"><?php echo time_passed($ch['fecha']) ?> </span>
				</div>
				<?php } ?>
				<?php 
				} 
				?>
				</div>
			</div>
			<form action="mensajes.php" method="post">
				<textarea name="txtA_Mensaje" id="" placeholder="Ingrese Mensaje"></textarea>
				<button  name="enviar" class="btn_msg" value="<?php echo $userio ?>">Enviar</button>
			</form>
		</div>
      </div>

	  <?php
	  /*Se comprueba la existecnia del boton*/
		if(isset($_POST['enviar'])){
			/*Captura de los datos*/
			$mensaje = (isset($_POST["txtA_Mensaje"]))?$_POST["txtA_Mensaje"]:"";
			$de = $result['Run_User'];
			$para =  $_POST["enviar"];
			


			/**Comprobar la existecnia de chats anteriores */
			
			$comprobar = mysqli_query($mysqli,"SELECT * FROM  c_chats WHERE  de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
			$com = mysqli_fetch_array($comprobar);
			/**si no existe se ingresa un nuevo id de chat y el mensaje corespondiente */
			if(mysqli_num_rows($comprobar) == 0){
				$inser = mysqli_query($mysqli,"INSERT INTO c_chats (de,para) VALUES ('$de','$para')");
				$siguiente = mysqli_query($mysqli,"SELECT id_cch FROM  c_chats WHERE  de = '$de' AND para = '$para' OR de = '$para' AND para = '$de'");
				$si = mysqli_fetch_array($siguiente);
				
				$inser2 = mysqli_query($mysqli,"INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$si['id_cch']."','$de','$para','$mensaje',now(),'0')");
				if($inser2 ){echo "<embed loop='false' src='recursos/beep.mp3' hidden='true' autoplay='true' >";}
				if($inser2) {echo '<script>window.location="mensajes.php?userio='.$para.'"</script>';}
			}
			/**Si existe uno anterior se agrega el mensaje nuevo */
			else {
				$inser3 = mysqli_query($mysqli,"INSERT INTO chats (id_cch,de,para,mensaje,fecha,leido) VALUES ('".$com['id_cch']."','$de','$para','$mensaje',now(),'0')");
				if($inser3 ){echo "<embed loop='false' src='recursos/beep.mp3' hidden='true' autoplay='true' >";}
				if($inser3) {echo '<script>window.location="mensajes.php?userio='.$para.'"</script>';}
			}

		} 

		 
	  ?>

  </div>

</div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>

	<?php } ?>