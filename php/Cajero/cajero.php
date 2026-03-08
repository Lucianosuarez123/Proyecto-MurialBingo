<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>CAJERO</title>
    <?php include ("../db/conexion.php");?>
</head>
<body>

<?php
include ("../db/conexion.php");
?>

<?php //Esto es el formulario de nombre apellido y DNI ?>  
<div class="Formulario">
    <form action="confirmar.php" method="post">
    <table>
        <tr>
            <td>DNI:</td>
                <td>
                <input type="text" placeholder="DNI" name="ID"required>
        </tr>
        <tr>
            <td>Nombre:</td>
                <td>
                <input type="text" placeholder="escribe tu nombre" name="Nombre"required>
            </td>
        </tr>
        <tr>
            <td>Apellido: </td>
                <td>
                <input type="text"value=""name="Apellido" placeholder="escribe tu apellido">
            </td>

        </table>
<?php //Esto es el formulario de nombre apellido y DNI ?>   
<?php //OJO CON ESTO, lo que hace es recorrer cada fila de la base de datos y asignarlas a un echo, y a su respectivo input, no lo toquen que funciona bien?>
<?php
        $data = ("SELECT * FROM producto WHERE ESTADO=1 and STOCK>10 ORDER BY CODIGO DESC");
        $dataselect = mysqli_query($link, $data);
        while ($dataSelection = mysqli_fetch_array($dataselect)) { ?>
        <?php echo utf8_encode($dataSelection['DESCRIPCION']); ?>
        <?php echo utf8_encode($dataSelection['PRECIO']); ?>
        <input value="0" type="number" min="0" name="<?php echo utf8_encode($dataSelection['DESCRIPCION']); ?>">
        <br>
        <?php } ?>
        <br>
        <input type="submit"value="ENVIAR"name="enviar">

</form>
</body>


<br>
<br>
<br>
<br>
<button  id="Boton-volver" onclick="location = this.value='../../../index.html'">Volver a seleccionar un Rol</button>
</html>

<br>
<?php 
/*date_default_timezone_set('America/Argentina/Buenos_Aires');
$date = date('d/m/y g:i');
echo $date;
*/
?>
