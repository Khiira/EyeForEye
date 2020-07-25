<?php
include ("conexion.php");
include ("sesion.php");

$run = $_SESSION['usuario'];
$user=mysqli_query($mysqli,"SELECT * FROM administrador WHERE Run_Admin = '$run'");
$result = mysqli_fetch_array($user);
$run = $result['Run_Admin'];

$id_Btn = $_POST["a"];

 switch($id_Btn){
     //AVISOS
    case 'avi':
        $title = $_POST['txt_titleA'];
        $tipo = $_POST['s_tiponoti'];
        $content = $_POST['txtA_content'];
        $fecha = date("Y-m-d");

        
        $query = "INSERT INTO notificaciones (Titulo, Contenido,Fecha, ID_TipoNoti,Admin_Envia) 
        VALUES ('$title','$content','$fecha','$tipo','$run')";
        $ejecutar= $mysqli -> query($query);

        header("Location: avisos_admin.php");

    break;
 }


?>