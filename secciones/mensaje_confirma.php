<?php include('../conexion/conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmacion Contraseña</title>
</head>
<body>
    <?php
            if(!empty($_POST)){
                $contra = $_POST['contra'];
                $code = $_POST['code'];
                $sqlUpdate = $con->exec("UPDATE usuario SET password ='$contra' WHERE Recuperar='$code'");
                echo ("Se actualizo con exito");
            }
    ?>
    
</body>
</html>