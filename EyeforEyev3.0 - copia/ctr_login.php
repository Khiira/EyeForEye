<?php
	include ('conexion.php');

$correo = $_POST['input_email'];
$pass = $_POST['input_contra'];

$consulta_user = "SELECT * FROM usuario WHERE CorreoElectronico = '$correo' AND Clave = '$pass' AND ID_Estado = 3";
$ejecutar_user = $mysqli -> query($consulta_user);
$datos_us = mysqli_fetch_array($ejecutar_user);
$resul = mysqli_num_rows($ejecutar_user);


if($resul>0){
  // se inicia la session de usuario
    session_start();
    $_SESSION['activo'] = true ;
    $_SESSION['usuario'] = $datos_us['Run_User'];

    header("Location:Home_user_nec.php");
}else{
  // se inicia la session de Administrador
    $consulta_admin = "SELECT * FROM administrador WHERE CorreoElectronico_admin = '$correo' AND Clave = '$pass'";
    $ejecutar_admin = $mysqli -> query($consulta_admin)or die('Datos no encontrados.');
    $datos_ad = mysqli_fetch_array($ejecutar_admin);
    $resul_admin = mysqli_num_rows($ejecutar_admin);
    if($resul_admin>0){
        session_start();

        $_SESSION['activo'] = true ;
        $_SESSION['usuario'] = $datos_ad['Run_Admin'];
        
        header("Location:home_admin.php");

    }else{
        header("Location:index.php?error= si");
        
    }
}
            
        
?>
