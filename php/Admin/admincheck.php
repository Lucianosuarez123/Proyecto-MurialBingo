<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/despacho.css">
    <title>Document</title>
</head>
<body>
<meta http-equiv="refresh" content="0;url=./admin.php"/>
<?php
include ("../db/conexion.php");
$sqlproducto         = ("SELECT * FROM producto");
$dataproductoSelect  = mysqli_query($link, $sqlproducto);

while ($seleccion = mysqli_fetch_array($dataproductoSelect)){
    $includeconection= $_POST[$seleccion['CODIGO']];
    $rasta = $seleccion['CODIGO'];
    $verif = $seleccion['ESTADO'];
    
    if($includeconection == 'on')
    {
        if ($verif == 1){
        mysqli_query($link ,"UPDATE producto SET ESTADO=0 WHERE CODIGO=$rasta");}
        else if ($verif == 0){
        mysqli_query($link ,"UPDATE producto SET ESTADO=1 WHERE CODIGO=$rasta");}
    }
}

$Nombre=$_POST['nuevoprod'];
$precio=$_POST['precioprod'];
$stock=$_POST['stock'];
$sqlproducto1        = ("SELECT * FROM producto");
$dataproductoSelect1  = mysqli_query($link, $sqlproducto1);
while($po = mysqli_fetch_array($dataproductoSelect1)){
$mAIa = $po['CODIGO'];
    echo $Nombre;


if ($Nombre == $po['DESCRIPCION'])
{   
    if ($precio!=NULL){
        mysqli_query($link ,"UPDATE producto SET PRECIO=$precio WHERE CODIGO=$mAIa");
    }
    if($stock!=NULL){
    $calculo=$po['STOCK'];
    $main=$calculo+$stock;
    mysqli_query($link ,"UPDATE producto SET STOCK=$main WHERE CODIGO=$mAIa");
    }
}

}
$sqlproducto2        = ("SELECT * FROM producto");
$dataproductoSelect2  = mysqli_query($link, $sqlproducto2);
$flag=1;
while($po = mysqli_fetch_array($dataproductoSelect2)){

if($Nombre!=$po['DESCRIPCION'])
{
$flag=1;
echo $flag;
}
else{
    $flag=0;
    break;
}
}
if($flag == '1'){
    if($precio!=NULL)
    {
        if($stock!=NULL)
        {
mysqli_query($link ,"INSERT INTO `producto`(`DESCRIPCION`, `PRECIO`, `ESTADO`, `STOCK`) VALUES ('$Nombre','$precio','0','$stock')");
        }
    }
}

?>
</body>
</html>