<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confirmarcss.css">
    <title>Document</title>
</head>
<body>
<?php include ("../db/conexion.php"); ?>

<?php
$DNI=$_POST['ID'];
$nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
echo "registro completo y subido $";
       // mysqli_query($link ,"INSERT INTO `clientes`( `DNI`, `NOMBRE`, `APELLIDO`) VALUES ('$DNI','$nombre','$Apellido')");

$totalfinal=0;
?>
<form action="formu.php" method="post">
<input type="hidden" placeholder="DNI" name="ID" required value="<?php
$DNI=$_POST['ID'];
echo $DNI ?>" >
<input type="hidden" placeholder="DNI" name="Nombre" required value="<?php
$nombre=$_POST['Nombre'];
echo $nombre ?>" >
<input type="hidden" placeholder="DNI" name="Apellido" required value="<?php
$Apellido=$_POST['Apellido'];
echo $Apellido ?>" >

<?php
        $data = ("SELECT * FROM producto WHERE ESTADO=1 and STOCK>10 ORDER BY CODIGO DESC");
        $dataselect = mysqli_query($link, $data);
        while ($dataSelection = mysqli_fetch_array($dataselect)) { ?>
        <input value="<?php echo $_POST[$dataSelection['DESCRIPCION']]; ?>" type="hidden" min="0" name="<?php echo utf8_encode($dataSelection['DESCRIPCION']); ?>">
        <?php }  
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
/*
        $data5 = ("SELECT * FROM clientes WHERE DNI=$DNI ORDER BY ID DESC LIMIT 1 ");
        $dataselect5 = mysqli_query($link, $data5);
        while($dataSelection5=mysqli_fetch_array($dataselect5)){
        $funciona=0;
        $funciona=$dataSelection5['ID'];
        }

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

        $stock=$dataSelection['STOCK'];
        $restante = $stock-$rasta;
        mysqli_query($link, "UPDATE producto SET STOCK=$restante WHERE CODIGO = $includeconection");
        ?>
<?php } */
echo $totalfinal;

?> 

<input type="submit"value="Confirmar pedido"name="enviar">
</form>
<br>
<button onclick="location = this.value='Cajero.php'">Cancelar pedido</button>
</body>
</html>
<br>
<button onclick="javascript: history.go(-1)" >Cambiar pedido</button>
<br>
<button  id="volver"  onclick="location = this.value='../../../index.html'">Volver a seleccionar un Rol</button>



















<?php
  //      mysqli_query($link, "INSERT INTO `linea_pedidos`( `COD_PROD`, `N_ORDEN`, `CANTIDAD`, `PRECIO_VENTA`, `ESTADO`) VALUES ('$includeconection','$NUMERODEID','$rasta','$precioventa',0);");
  //mysqli_query($link, "INSERT INTO `ordenes`(`TOTAL`, `ID_CL`, `ESTADO`) VALUES ('$totalfinal','$funciona',0)")
  //mysqli_query($link ,"INSERT INTO `clientes`( `DNI`, `NOMBRE`, `APELLIDO`) VALUES ('$DNI','$nombre','$Apellido')");
?>