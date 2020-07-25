<?php
include ("sesion.php");

if (! empty($_SESSION["usuario"])) {

session_start();
unset($_SESSION["usuario"]); 
unset($_SESSION["activo"]);
session_destroy();
header("Location: index.php");

}


?>