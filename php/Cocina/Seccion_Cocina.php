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
<meta http-equiv="refresh" content="0;url=./Cocina.php" />
<?php 

$numeroid=$_POST['numeroid'];
echo $numeroid;
include ("../db/conexion.php");
?>
<br>
<?php 
$sqlproducto1         = ("SELECT * FROM linea_pedidos INNER JOIN producto on CODIGO=COD_PROD where N_ORDEN=$numeroid");
$dataproductoSelect1  = mysqli_query($link, $sqlproducto1);
while ($dataselect1 = mysqli_fetch_array($dataproductoSelect1))
{

$numeroproducto=$dataselect1['COD_PROD'];
$descripcionproducto=$_POST[$dataselect1['DESCRIPCION']];

if($descripcionproducto == 'on')
    {
        mysqli_query($link ,"UPDATE linea_pedidos SET ESTADO=1 WHERE N_ORDEN=$numeroid and COD_PROD=$numeroproducto");
    }
}
$sqlproducto2         = ("SELECT * FROM linea_pedidos where N_ORDEN=$numeroid and CANTIDAD!=0");
$dataproductoSelect2  = mysqli_query($link, $sqlproducto2);
while ($dataselect2 = mysqli_fetch_array($dataproductoSelect2))
{
    echo $dataselect2['COD_PROD'];
    if($dataselect2['ESTADO'] == "1"){
        $flag=1;
    }
    else if ($dataselect2['ESTADO'] == "0")
    {
        $flag=0;
        break;
    }
   
}
if ($flag==1)
{
    mysqli_query($link ,"UPDATE ordenes SET ESTADO=2 WHERE N_ORDENES=$numeroid");
}
?>



</body>
</html>
<br>
<br>
<br>
<br>