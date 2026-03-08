<?php
//no mucho mas que decir, si lo queres usar necesitas un INCLUDE('y el nombre de este archivo. la extencion que este archivo posea')
        $server = "192.168.101.93:3306";
        $usuario = "AG07";
        $clave = "G07MJU7!";
        $basededatos = "ag07";
        $link = mysqli_connect($server,$usuario,$clave);
        $db= mysqli_select_db($link,$basededatos);
?>
