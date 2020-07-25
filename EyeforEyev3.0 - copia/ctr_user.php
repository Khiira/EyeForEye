<?php
include ("conexion.php");
include ("sesion.php");


$run = $_SESSION['usuario'];
$user=mysqli_query($mysqli,"SELECT * FROM usuario WHERE Run_User = '$run'");

$result = mysqli_fetch_array($user);
$run = $result['Run_User'];



$a = $_POST["a"];

switch($a){
    case "publi":

        $tipoPu = $_POST["s_tipubli"];
        $categoria = $_POST["s_categoria"];
        $content = $_POST["txtA_contenido"];
        $fecha = date("Y-m-d");
        

        $query=" INSERT INTO publicacion (Contenido, Fecha, ID_TipoPublicacion, ID_Categoria, ID_EstadoPubli, Run_Publicador) 
        VALUES ('$content','$fecha','$tipoPu','$categoria','1','$run')";
        $ejecutar = $mysqli -> query($query)or die('No se ingreso');
    
        header("Location:home_user_nec.php");
    
    break;
    case "denu":

        $razon = $_POST["s_razon"];
        $id_pub = $_SESSION["idPub"];
            
            $query = "INSERT INTO denuncias(Cant_Denuncias, ID_EstadoDenun, Run_Denunciante, ID_Publicacion, ID_Razon) 
            VALUES (1,4,'$run','$id_pub','$razon')";
            $ejecutar = $mysqli->query($query);

            $query2 = "UPDATE publicacion SET ID_EstadoPubli = 2 WHERE ID_Publicacion = '$id_pub'";
            $ejecutar2 = $mysqli->query($query2);

            header("Location:home_user_nec.php");
    break;
}



?>