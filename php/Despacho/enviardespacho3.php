<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>
<body>
<meta http-equiv="refresh" content="0;url=./Despacho.php" />
<button onclick="location = this.value='cocina.php'">volver a los pedidos</button>
<?php
include ("../db/conexion.php");
$sqlproducto         = ("SELECT * FROM ordenes");
$dataproductoSelect  = mysqli_query($link, $sqlproducto);
$includeconection=0;

while ($seleccion = mysqli_fetch_array($dataproductoSelect)){
    $includeconection= $_POST[$seleccion['N_ORDENES']];
    $rasta = $seleccion['N_ORDENES'];
    if($includeconection == 'on')
    {
        mysqli_query($link ,"UPDATE ordenes SET ESTADO=3 WHERE N_ORDENES=$rasta");
    }
}

?>

</body>
</html>
<br>
<br>
<br>
<br>

<button onclick="location = this.value='../index.html'">Volver a seleccionar un Rol</button>
