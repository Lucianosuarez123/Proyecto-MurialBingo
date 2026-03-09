<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/despacho.css">
    <title>Document</title>
    <meta http-equiv="refresh" content="0;url=Cajero.php"/>
</head>
<body>
<?php include ("../db/conexion.php"); 
?>
<?php
$DNI=$_POST['ID'];
$nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
$totalfinal=0;

$data20 = ("SELECT UPPER(DNI),UPPER(NOMBRE),UPPER(APELLIDO) FROM clientes");
$dataselect20 = mysqli_query($link, $data20);
while ($vtv=mysqli_fetch_array($dataselect20)){
        if (strtoupper($DNI) === $vtv['UPPER(DNI)'] && strtoupper($nombre) === $vtv['UPPER(NOMBRE)'] && strtoupper($Apellido) === $vtv['UPPER(APELLIDO)'])
        {
                $flag = 1;

        }
        else
        {
                $flag = 0;      
        }
}


if ($flag == 0){
mysqli_query($link ,"INSERT INTO `clientes`( `DNI`, `NOMBRE`, `APELLIDO`) VALUES ('$DNI','$nombre','$Apellido')");
}

?>
<?php
// esto sirve para elejir cada linea de la base de datos y conmutarlas con las lineas del otro php, el del cajero y multiplicarlo sacar valores y asignar a las bases de datos
?>
        <?php
        $data = ("SELECT * FROM producto WHERE ESTADO=1 and STOCK!=0 ORDER BY CODIGO DESC ");
        $dataselect = mysqli_query($link, $data);
        while ($dataSelection = mysqli_fetch_array($dataselect)) { ?>
        <?php   
        $includeconection= $dataSelection['CODIGO'];
        $rasta = $_POST[$dataSelection['DESCRIPCION']];
        $total = $dataSelection['PRECIO'] * $rasta;
        $totalfinal = $totalfinal + $total;
        
        }?>
      
<?php 
        $data5 = ("SELECT * FROM clientes WHERE DNI=$DNI ORDER BY ID DESC LIMIT 1 ");
        $dataselect5 = mysqli_query($link, $data5);
        while($dataSelection5=mysqli_fetch_array($dataselect5)){
        $funciona=0;
        $funciona=$dataSelection5['ID'];
        }
        mysqli_query($link, "INSERT INTO `ordenes`(`TOTAL`, `ID_CL`, `ESTADO`) VALUES ('$totalfinal','$funciona',0)")
        ?>
                <?php
        $num_id = ("SELECT N_ORDENES FROM ordenes where ID_CL=$funciona");
        $num_idselect = mysqli_query($link, $num_id);
        while ($dasicence = mysqli_fetch_array($num_idselect)) { ?>
        <?php $NUMERODEID = $dasicence['N_ORDENES'];
        ?>
        <?php } ?>
        <?php
        $data = ("SELECT * FROM producto WHERE ESTADO=1 and STOCK>10 ORDER BY CODIGO DESC");
        $dataselect = mysqli_query($link, $data);
        while ($dataSelection = mysqli_fetch_array($dataselect)) { ?>
        <?php   
        $includeconection= $dataSelection['CODIGO'];
        $rasta = $_POST[$dataSelection['DESCRIPCION']];
        $precioventa = $dataSelection['PRECIO'];
        mysqli_query($link, "INSERT INTO `linea_pedidos`( `COD_PROD`, `N_ORDEN`, `CANTIDAD`, `PRECIO_VENTA`, `ESTADO`) VALUES ('$includeconection','$NUMERODEID','$rasta','$precioventa',0);");
        $stock=$dataSelection['STOCK'];
        $restante = $stock-$rasta;
        mysqli_query($link, "UPDATE producto SET STOCK=$restante WHERE CODIGO = $includeconection");
        ?>
<?php } 

?> 
<button onclick="location = this.value='Cajero.php'">Volver a pedir</button>




</body>
</html>
<br>
<br>
<br>
<br>
<button  id="Boton-volver"  onclick="location = this.value='../../../index.html'">Volver a seleccionar un Rol</button>