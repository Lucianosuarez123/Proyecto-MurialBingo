<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="despachocss10.css">
</head>
<body>
    <button id="volver" onclick="location = this.value='../../index.html'">Volver a seleccionar un Rol</button>
    <div id="todo">
        <H1 id="titulo">Despacho</H1>
        <form id="formulario" action="Despacho.php" method="post">
            <div id="pass">
                <input type="password" name = "contra">
                <label>Contraseña</label>
            </div>
            <br>
            <input type="submit" value="Aceptar" name="Iniciar seccion">
        </form>

    </div>
<?php 
?>
</body>
</html>