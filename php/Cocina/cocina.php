<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="cocinacss.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocina</title>
</head>
<body>

<?php
include ("../db/conexion.php");
?> 

<?php      
        $sqlproducto         = ("SELECT * FROM ordenes WHERE ESTADO=1");
        $dataproductoSelect  = mysqli_query($link, $sqlproducto);
        ?>

<?php 
while ($dataselect = mysqli_fetch_array($dataproductoSelect))
{?>
<form action="Seccion_cocina.php" method="Post">
<input type="submit">






<table width="45%" border="1px">
    <tr>
        <td>NUM_PEDIDO</td>
        <td>CONTENIDO</td>
        <td>CANTIDAD</td>
        <td>ESTADO</td>
    </tr>    
    <tr>
    <td rowspan="50"><?php $var1=($dataselect['N_ORDENES']);?> 
    <?php $var1 = ($dataselect['N_ORDENES']); echo $var1; ?>
    <input class="enviar" type="hidden"  name="<?php $var1 = ($dataselect['N_ORDENES']); echo "numeroid"; ?>" value="<?php echo $var1; ?>" max="<?php echo $var1 ?>" min="<?php echo $var1 ?>">
    </td>
<?php 
$sqlproducto1         = ("SELECT DESCRIPCION,CANTIDAD,linea_pedidos.ESTADO FROM linea_pedidos INNER JOIN producto on CODIGO=COD_PROD where N_ORDEN=$var1 and CANTIDAD!=0");
$dataproductoSelect1  = mysqli_query($link, $sqlproducto1);
while ($dataselect1 = mysqli_fetch_array($dataproductoSelect1))
{?>
    <td><?php $var1 =$dataselect1['DESCRIPCION']; 
    $var2=str_replace( "$", " " , $var1);
    echo $var2;
    ?></td>
    <td><?php echo $dataselect1['CANTIDAD']; ?></td>
    <td><?php if ($dataselect1['ESTADO']==0){ ?>
        <input type="checkbox" name="<?php echo $dataselect1['DESCRIPCION']; ?>">
        <?php 
    }
    else {
       echo "Preparado";
    } 
        ?></td>
    </tr>
<?php 
}
?>
</table>
<br>
</form>
<?php

}
?>

</body>
<br>
<br>
<br>
<br>
<button  id="volver" onclick="location = this.value='../../../index.html'">Volver a seleccionar un Rol</button>
</html>


