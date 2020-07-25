<?php
include ("conexion.php");
include ("sesion.php");



$r = $_GET["r"];
$idBtn = $_GET["a"];


switch($idBtn){
    //USUARIOS
    case 'si':
        $query="UPDATE usuario SET ID_Estado = 3 WHERE Run_User = '$r'";
        $ejecutar = $mysqli -> query($query)or die('No se ingreso');
    
        header("Location:usuarios_admin.php");
    break;
    case 'no':
        $query = "DELETE FROM usuario WHERE Run_User = '$r'";
        $ejecutar = $mysqli -> query($query)or die('No se ingreso');
    
        header("Location:usuarios_admin.php");
    break;
    //DENUNCIAS
    case 'mant':
        $query = "UPDATE publicacion SET ID_EstadoPubli = 1 WHERE ID_Publicacion = '$r'";
        $ejecutar= $mysqli -> query($query);
        $query = "DELETE FROM denuncias WHERE ID_Publicacion = '$r'";
        $ejecutar = $mysqli -> query($query);

        header("Location:denuncias_admin.php");
    break;
    case 'elim':
        $id=$_GET["id"];

        if($id == 'publi'){
            $query = "DELETE FROM publicacion WHERE ID_Publicacion = '$r'";
            $ejecutar= $mysqli -> query($query);

            header("Location: publicacion_admin.php");
        }else{
            $query = "DELETE FROM publicacion WHERE ID_Publicacion = '$r'";                                                 
            $ejecutar= $mysqli -> query($query);

            $query = "DELETE FROM denuncias WHERE ID_Publicacion = '$r'";
             $ejecutar = $mysqli -> query($query);
            header("Location:denuncias_admin.php");
        }
    break; 
}


    


?>