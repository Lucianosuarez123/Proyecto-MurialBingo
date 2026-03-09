<?php

$servidor= "192.168.101.93:3306";
$usuario= "AG06";
$contrasena= "G06NHY6!";
$base_de_datos = "ag06";
$link = mysqli_connect($servidor,$usuario,$contrasena);
$db= mysqli_select_db($link,$base_de_datos);

?>