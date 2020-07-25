<?php
	//CONEXIÓN A LA BASE DE DATOS
    //PARAMETROS (SERVIDOR, USUARIO, CLAVE, BASE DE DATOS)
    
    $mysqli = new mysqli('localhost:3308', 'root', '', 'eyeforeye'); 
    $mysqli->set_charset("utf8");

    date_default_timezone_set('America/Santiago');
    function time_passed($get_timestamp)
{
        $timestamp = strtotime($get_timestamp);
    $diff = time() - (int)$timestamp;
 
        if ($diff == 0) 
             return 'justo ahora';
 
        if ($diff > 604800)
            return date("d M Y",$timestamp);
 
        $intervals = array
        (
            //1                   => array('año',    31556926),
           // $diff < 31556926    => array('mes',   2628000),
           // $diff < 2629744     => array('semana',    604800),
            $diff < 604800      => array('día',     86400),
            $diff < 86400       => array('hora',    3600),
            $diff < 3600        => array('minuto',  60),
            $diff < 60          => array('segundo',  1)
        );
$value = floor($diff/$intervals[1][1]);
return 'hace '.$value.' '.$intervals[1][0].($value > 1 ? 's' : '');
}
?>
