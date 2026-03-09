<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Cliente/cliente.css">
  <meta http-equiv="refresh" content="1;url=./vista_cliente.php" />
  <title>VISTA DEL CLIENTE</title>
  </head>
<body>
<div id="CON1">
  <h2 id="PE">PEDIDOS ENTRANTES</h2>
    <?php include ("../db/conexion.php");
      $sqlproducto         = ("SELECT distinct ID,DNI,NOMBRE,APELLIDO,N_ORDENES,ID_CL,ESTADO FROM clientes INNER JOIN ordenes on ID_CL=clientes.ID WHERE ESTADO=0");
      $dataproductoSelect  = mysqli_query($link, $sqlproducto);?>
<form class="formu" action="enviardespacho.php" method="post" >
    <?php while($dataselect= mysqli_fetch_array($dataproductoSelect)){?>
      <table class="styled-table" width="20%" border="1px">
            <tr align="center">
                <td>N°</td>
                <td>DNI</td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
            </tr>
            <tr>
                <td><?php $var1 = ($dataselect['N_ORDENES']); echo $var1;?></td>
                <td ><?php echo $dataselect['DNI']?></td>
                <td><?php echo $dataselect['NOMBRE']; ?></td>
                <td><?php echo $dataselect['APELLIDO']; ?></td>   
            </tr>
        </table><br>
  <?php } ?>
</form>
</div>

<div id="CON2">
  <h2 id="PP">PEDIDOS EN PREPARACION</h2>
    <?php   
    $sqlproducto         = ("SELECT distinct ID,DNI,NOMBRE,APELLIDO,N_ORDENES,ID_CL,ESTADO FROM clientes INNER JOIN ordenes on ID_CL=clientes.ID WHERE ESTADO=1 or ESTADO=2");
    $dataproductoSelect  = mysqli_query($link, $sqlproducto);?>
<form class="formu" action="enviardespacho2.php" method="post" >
  <?php while($dataselect= mysqli_fetch_array($dataproductoSelect)){?>
          <table class="styled-table" width="20%" border="1px">
            <tr align="center">
                <td>N°</td>
                <td>DNI</td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
            </tr>
            <tr>
                <td><?php $var1 = ($dataselect['N_ORDENES']); echo $var1;?></td>
                <td ><?php $var1 = ($dataselect['N_ORDENES']); echo $dataselect['DNI']?></td>
                <td><?php echo $dataselect['NOMBRE']; ?></td>
                <td><?php echo $dataselect['APELLIDO']; ?></td>
            </tr>
        </table> <br>
  <?php } ?>
</form>
</div>

<div id="CON3">
  <h2 id="PR">PEDIDOS PARA RETIRAR</h2>
<?php
        $sqlproducto         = ("SELECT distinct ID,DNI,NOMBRE,APELLIDO,N_ORDENES,ID_CL,ESTADO FROM clientes INNER JOIN ordenes on ID_CL=clientes.ID WHERE ESTADO=3");
        $dataproductoSelect  = mysqli_query($link, $sqlproducto);
        #("SELECT DISTINCT * FROM ordenes INNER JOIN linea_pedidos on ORD_NUM=NUM_ORDER INNER JOIN producto ON NUM_COMIDA=NUM_PRODUCTO ORDER BY ORD_NUM ASC;");
        ?>
<form class="formu" action="enviardespacho4.php" method="post" >
    <?php 
    while($dataselect= mysqli_fetch_array($dataproductoSelect)){
    ?>
<table class="styled-table" width="20%" border="1px">
            <tr align="center">
                <td>N°</td>
                <td>DNI</td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
            </tr>
            <tr>
                <td><?php $var1 = ($dataselect['N_ORDENES']); echo $var1;?></td>
                <td ><?php $var1 = ($dataselect['N_ORDENES']); echo $dataselect['DNI']?></td>
                <td><?php echo $dataselect['NOMBRE']; ?></td>
                <td><?php echo $dataselect['APELLIDO']; ?></td>
                
            </tr>
</TABLE> <br>
    <?php } ?>
      
</form>
  </div>
</body>

</html>
<script>

var values = JSON.parse(localStorage.getItem('checkboxes')) || {};
var $checkboxes = $(":checkbox"); // Tomas los checkboxs

// Al cambiar el valor
$checkboxes.on("change", function(){
  $checkboxes.each(function(){
    values[this.id] = this.checked;
  });
  localStorage.setItem("checkboxes", JSON.stringify(values));
});

// Al cargar
$.each(values, function(key, value) {
  $("#" + key).prop('checked', value);
});

</script>
<br>
<br>
<br>
<br>


