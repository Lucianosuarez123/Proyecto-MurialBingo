<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="admincss2.css">
    <style>


    </style>
</head>
<body >
<?php
        include ("../db/conexion.php");
        $sqlproducto         = ("SELECT * FROM producto ");
        $dataproductoSelect  = mysqli_query($link, $sqlproducto);
        ?>
        <h1> Bienvenido Administrador </h1>
        <?php // ?>

        <div class="agregar">
            <form action="admincheck.php" method="post">
                <h3>Agregar un producto</h3>
                    <p><caption>Nombre</caption></p>
                    <input type="text" name="nuevoprod">
                    <p><caption>Stock</caption></p>
                    <input type="text" name="stock">
                    <p><caption>Precio</caption></p>
                    <input type="number" name="precioprod">
                    
                <br>
                <input class="bajar" type="submit">
                <br>
                <br>
            </form>
        </div>

        <div class="container">
                <h3 class="titulolista">LISTA DE PRODUCTOS</h3>

                <form action="admincheck.php" method="post"> 
                    
                <table>
                        <thead>
                            <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Estado Actual</th>
                            <th>H/D</th>
                            </tr>
                        </thead>
                <?php 
                    while($dataselect= mysqli_fetch_array($dataproductoSelect)){
                    ?>


                        <tbody>
                            <tr>
                                <td ><?php $var1 = ($dataselect['CODIGO']);; 
                                $var3 = ($dataselect['DESCRIPCION']); 
                                $var4 = str_replace( "$", " " , $var3);
                                echo $var4;

                    
                                ?></td>
                                <td ><?php $var2 = ($dataselect['PRECIO']); echo $var2; ?> </td>
                                <td ><?php $var4 = ($dataselect['STOCK']); echo $var4; ?></td>
                                <td ><?php 
                                if($dataselect['STOCK']>50 && $dataselect['ESTADO']=='1')
                                {
                                    echo "Stock Disponible \n";
                                    echo "Habilitado ";
                                }
                                else if ($dataselect['STOCK']>50 && $dataselect['ESTADO']=='0')
                                {
                                    echo "Stock Disponible \n";
                                    echo "Deshabilitado";
                                }
                                else if ($dataselect['STOCK']<=50 && $dataselect['STOCK']>=10 && $dataselect['ESTADO']=='1')
                                {
                                    echo "Stock casi agotado \n";
                                    echo "Habilitado";
                                }
                                else if ($dataselect['STOCK']<=50 && $dataselect['STOCK']>=10 && $dataselect['ESTADO']=='0')
                                {
                                    echo "Stock casi agotado \n";
                                    echo "Deshabilitado";
                                }
                                else if ($dataselect['STOCK']<10 )
                                {
                                    echo "Deshabilitado por stock \n";
                                    echo "Reponer";
                                }
                                ?>   
                                </td> 
                                <td align="center" ><input type="checkbox" name="<?php echo $var1 ?>"></td>
                            </tr>
                        </tbody>
                    
                <?php } ?>
                    </table>
                    


        </div>
                    <input class="Subir" type="submit" value="Aceptar" name="enviar"> 
                    <?php // ?>
                    </form>
                    <?php // ?>
        
                    
        <div class="container1">

                    
                            <?php
                                $total=0;
                                $sqlproducto1         = ("SELECT * FROM producto" );
                                $dataproductoSelect1  = mysqli_query($link, $sqlproducto);
                            ?>
                            
                        <table id="tabla2">
                            <tr align="center">
                                <th>Producto</th>
                                <th>Cantidad vendida</th>
                                <th>SubTotal</th>
                            </tr>
                        <?php
                            $total2=0;
                                while($dataselect= mysqli_fetch_array($dataproductoSelect1))
                                {
                                    $total=$dataselect['CODIGO'];
                                        $sqlproducto2 = ("SELECT SUM(CANTIDAD*PRECIO_VENTA),SUM(CANTIDAD) FROM linea_pedidos WHERE COD_PROD=$total and CANTIDAD!=0");
                                            $sqlproducto3= mysqli_query($link,$sqlproducto2);
                        ?>

                        <tr>
                            <td>
                            <?php $nombre=($dataselect['DESCRIPCION']); 
                             $cambio = str_replace( "$", " " , $nombre);     
                             echo $cambio;
                             ?>
                            </td>
                            <?php while ($informacion= mysqli_fetch_array($sqlproducto3)){ ?>  
                            <td align="center"><?php echo $informacion['SUM(CANTIDAD)'];?> </td>
                            <td align="center">$ <?php  echo $informacion['SUM(CANTIDAD*PRECIO_VENTA)'];?> </td>
                            <?php $total1= $informacion['SUM(CANTIDAD*PRECIO_VENTA)']; $total2= $total2 + $total1; ?>
                            <br>
                        </tr>

                        <?php } ?>
                        <?php } ?>
                        <tr>
                            <th>Total</th>
                            <td id="total1" colspan="3" align="right" >$ <?php echo $total2; ?></td>
                        </tr>
                        </table>
        </div>

        <?php // ?>
    


    
</body>
<br><br><br><br>
<footer>
    <button class="volver" onclick="location = this.value='../../../index.html' ">Volver a seleccionar un Rol</button>
</footer>

</html>


