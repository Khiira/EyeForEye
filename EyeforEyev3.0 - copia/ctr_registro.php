<?php

include ("conexion.php");

$run=(isset($_POST["txtRun"]))?$_POST["txtRun"]:"";
$nombre=(isset($_POST["txtNombre"]))?$_POST["txtNombre"]:"";
$apellidos=(isset($_POST["txtApellidos"]))?$_POST["txtApellidos"]:"";
$sexo=(isset($_POST["s_sexo"]))?$_POST["s_sexo"]:"";
$numTel=(isset($_POST["id_numtel"]))?$_POST["id_numtel"]:"";
$direccion=(isset($_POST["txtDireccion"]))?$_POST["txtDireccion"]:"";
$fecha=(isset($_POST["txtFecha"]))?$_POST["txtFecha"]:"";
$ciudad=(isset($_POST["s_ciudad"]))?$_POST["s_ciudad"]:"";
$correo=(isset($_POST["txtCorreo"]))?$_POST["txtCorreo"]:"";
$contra1=(isset($_POST["txtContraseña"]))?$_POST["txtContraseña"]:"";
$contra2=(isset($_POST["txtconf_contrasena"]))?$_POST["txtconf_contrasena"]:"";
$img_cf=(isset($_FILES["foto_carnet_frontal"]["name"]))?$_FILES["foto_carnet_frontal"]["name"]:"";
$img_cr=(isset($_FILES["foto_carnet_reverso"]["name"]))?$_FILES["foto_carnet_reverso"]["name"]:"";
$img_rt=(isset($_FILES["foto_rostro"]["name"]))?$_FILES["foto_rostro"]["name"]:"";
$img_ante=(isset($_FILES["registro_antecedentes"]["name"]))?$_FILES["registro_antecedentes"]["name"]:"";

if($contra1 == $contra2){

$Fecha = new DateTime();
$nombreArchiCF = ($img_cf!="")?$Fecha->getTimestamp()."_".$_FILES["foto_carnet_frontal"]["name"]:null;
$tmpArchiCF = $_FILES["foto_carnet_frontal"]["tmp_name"];

$nombreArchiCR = ($img_cr!="")?$Fecha->getTimestamp()."_".$_FILES["foto_carnet_reverso"]["name"]:null;
$tmpArchiCR = $_FILES["foto_carnet_reverso"]["tmp_name"];

$nombreArchiRT = ($img_rt!="")?$Fecha->getTimestamp()."_".$_FILES["foto_rostro"]["name"]:null;
$tmpArchiRT = $_FILES["foto_rostro"]["tmp_name"];

$nombreArchiAnte = ($img_ante!="")?$Fecha->getTimestamp()."_".$_FILES["registro_antecedentes"]["name"]:null;
$tmpArchiAnte = $_FILES["registro_antecedentes"]["tmp_name"];

if($tmpArchiCF!="" or $tmpArchiCR!="" or $tmpArchiRT!="" or $tmpArchiAnte!=""){
    move_uploaded_file($tmpArchiCF,"img/".$nombreArchiCF);
    move_uploaded_file($tmpArchiCR,"img/".$nombreArchiCR);
    move_uploaded_file($tmpArchiRT,"img/".$nombreArchiRT);
    move_uploaded_file($nombreArchiAnte,"img/".$nombreArchiAnte);
}

"SELECT * FROM  usuario WHERE  Run_User = '$run'";  





$fechaNacim = strtotime($fecha);
$fechaNacim = date('Y-m-d', $fechaNacim);

$query="INSERT INTO usuario (Run_User,Nombre_User,Apellido_User,Clave,CorreoElectronico,Img_Carnet_delante,Img_Rostro,Img_PapelAntecedente,ID_Estado, NumeroTelefonico,Direccion,ID_Ciudad,Sexo,Img_CarnetAtras,FechaNacim) 
VALUES ('$run','$nombre','$apellidos','$contra1','$correo','$nombreArchiCF','$nombreArchiRT','$nombreArchiAnte',1,'$numTel','$direccion','$ciudad','$sexo','$nombreArchiCR','$fechaNacim')";
$ejecutar = $mysqli -> query($query)or die('No se ingreso');

header("Location:index.php");
}
?>