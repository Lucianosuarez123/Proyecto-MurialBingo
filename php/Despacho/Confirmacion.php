<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DESPACHO</title>
    <link rel="stylesheet" href="../css/despacho.css">
</head>
<body>
<?php
include ("../db/conexion.php");
$infopedidos = ("SELECT ID_US,NOMBRE,APELLIDO,ESTADO FROM ordenes INNER JOIN clientes on ID_US=clientes.ID WHERE ESTADO=0");
$infosql = mysqli_query($link,$infopedidos);?>
<div id="columna1">
<?php
while ($seleccion = mysqli_fetch_array($infosql)){?>
<table width="40%" border="1px">
<tr>  
<td>DNI</td>
<td>NOMBRE</td>
<td>APELLIDO</td>
</tr>  
<tr>
<td><?php echo $seleccion['DNI'];?></td>
<td><?php echo $seleccion['NOMBRE'];?></td>
<td><?php echo $seleccion['APELLIDO'];?></td>
<td width="30"><?php if($seleccion['ESTADO']=='0'){
echo "En preparacion";
}
else {
    echo "Para retirar";
}
?></td>
</tr>
<br>
</table>
<?php
}
?>
</div>

<?php
include ("../db/conexion.php");
$infopedidos = ("SELECT DNI,NOMBRE,APELLIDO,ESTADO FROM ordenes INNER JOIN clientes on ID_CL=clientes.ID WHERE ESTADO=1 ");
$infosql = mysqli_query($link,$infopedidos);?>
<div id="columna2">
<?php
while ($seleccion = mysqli_fetch_array($infosql)){?>
<table width="40%" border="1px">
<tr>  
<td>DNI</td>
<td>NOMBRE</td>
<td >APELLIDO</td>
</tr>  
<tr>
<td><?php echo $seleccion['DNI'];?></td>
<td><?php echo $seleccion['NOMBRE'];?></td>
<td><?php echo $seleccion['APELLIDO'];?></td>
<td width="30"><?php if($seleccion['ESTADO']=='0'){
echo "En preparacion";
}
else {
    echo "Para retirar";
}
?></td>
</tr>
<br>
</table>
<?php
}
?>
</div>
</body>
</html>
