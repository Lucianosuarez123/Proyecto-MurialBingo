<?php //Esto es el formulario de nombre apellido y DNI
include ('../db/conexion.php');

$password= $_POST['contra'];
$verificacion= ("SELECT * FROM usuario");
$llave = mysqli_query($link, $verificacion);
while ($abrir = mysqli_fetch_array($llave)) {
    if ($password=== $abrir['contrasena']){
        echo '<script language="javascript">alert("Ingresaste correctamente");</script>';
        echo '<script language="javascript">window.location.href = "./Despacho.php";</script>';
    } else{
        echo '<script language="javascript">alert("Usuario o contraseña incorrectos");</script>';
        echo '<script language="javascript">window.location.href = "./checkus.php";</script>';
    }
}


?>  