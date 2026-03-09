<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="despacho2.css">
  <title>DESPACHO</title>
  <meta http-equiv="refresh" content="2;url=./Despacho.php" />
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>


  <div id="CON1">
    <h2>PEDIDOS ENTRANTES</h2>
      <?php include ("../db/conexion.php");
        $sqlproducto         = ("SELECT distinct ID,DNI,NOMBRE,APELLIDO,N_ORDENES,ID_CL,ESTADO FROM clientes INNER JOIN ordenes on ID_CL=clientes.ID WHERE ESTADO=0");
        $dataproductoSelect  = mysqli_query($link, $sqlproducto);?>
  <form action="enviardespacho.php" method="post" >
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
                  <td><input type="checkbox" id="<?php echo $var1 ?>" name="<?php echo $var1 ?>"></td>
              </tr>
          </table><br>
    <?php } ?><input type="submit"value="ENVIAR"name="enviar">
  </form>
  </div>


  <div id="CON2">
    <h2>PEDIDOS EN PREPARACION</h2>
      <?php   
      $sqlproducto         = ("SELECT distinct ID,DNI,NOMBRE,APELLIDO,N_ORDENES,ID_CL,ESTADO FROM clientes INNER JOIN ordenes on ID_CL=clientes.ID WHERE ESTADO=1");
      $dataproductoSelect  = mysqli_query($link, $sqlproducto);?>
  <form action="enviardespacho2.php" method="post" >
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
  <h2>PEDIDOS PARA ARMAR</h2>
  <?php
          $sqlproducto         = ("SELECT distinct ID,DNI,NOMBRE,APELLIDO,N_ORDENES,ID_CL,ESTADO FROM clientes INNER JOIN ordenes on ID_CL=clientes.ID WHERE ESTADO=2");
          $dataproductoSelect  = mysqli_query($link, $sqlproducto);
          ?>
  <form action="enviardespacho3.php" method="post" >
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
                  <td><input type="checkbox" id="<?php echo $var1 ?>" name="<?php echo $var1 ?>"></td>
                </tr>
                <tr>
                  <td rowspan="10">CONTENIDO:</td>
  <?php $sqlproducto1         = ("SELECT DESCRIPCION,CANTIDAD,linea_pedidos.ESTADO FROM linea_pedidos INNER JOIN producto on CODIGO=COD_PROD where N_ORDEN=$var1 and CANTIDAD!=0");
  $dataproductoSelect1  = mysqli_query($link, $sqlproducto1);
  while ($dataselect1 = mysqli_fetch_array($dataproductoSelect1))
  {?>
      <td><?php $var1 =$dataselect1['DESCRIPCION']; 
    $var2=str_replace( "$", " " , $var1);
    echo $var2; ?></td>
      <td><?php echo $dataselect1['CANTIDAD']; ?></td>
      </tr>  
    
  <br>
      <?php } ?>

    </TABLE>
      <?php  } ?>
    
        <input type="submit"value="ENVIAR"name="enviar">
  </form>
    </div>


  <div id="CON4">
    <h2>PEDIDOS PARA RETIRAR</h2>
  <?php
          $sqlproducto         = ("SELECT distinct ID,DNI,NOMBRE,APELLIDO,N_ORDENES,ID_CL,ESTADO FROM clientes INNER JOIN ordenes on ID_CL=clientes.ID WHERE ESTADO=3");
          $dataproductoSelect  = mysqli_query($link, $sqlproducto);
          #("SELECT DISTINCT * FROM ordenes INNER JOIN linea_pedidos on ORD_NUM=NUM_ORDER INNER JOIN producto ON NUM_COMIDA=NUM_PRODUCTO ORDER BY ORD_NUM ASC;");
          ?>
  <form action="enviardespacho4.php" method="post" >
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
                  <td><input type="checkbox" id="<?php echo $var1 ?>" name="<?php echo $var1 ?>"></td>
              </tr>
  </TABLE> 
  <br>
      <?php } ?>
        <input type="submit"value="ENVIAR"name="enviar">
  </form>
    </div>
</body>

<footer>

</footer>

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
<button  id="volver" onclick="location = this.value='../../../index.html'">Volver a seleccionar un Rol</button> 
<br>
<br>
<br>
<br>


