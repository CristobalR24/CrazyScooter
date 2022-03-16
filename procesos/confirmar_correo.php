<?php
include('../conexion/conexion.php');
require('../clases/usuario.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>confirmar_correo</title>
</head>
<body>
<?php
if(!empty($_POST))
{
    $correo = $_POST['email'];
}
else{ ?>
 <H1><?php echo "No se ha recibido en formulario";?><H1>
<?php
}
$resultado = $con->query("SELECT * FROM usuario WHERE Correo = '$correo'");
$datos = $resultado->fetch(PDO::FETCH_OBJ);
if($datos)
{ $number = rand(1000,10000);
  $sqlUpdate = $con->exec("UPDATE usuario SET Recuperar = '$number' WHERE Correo ='$correo'");
  $to = $correo;
  $subject = "Recuperacion de Contraseña";
  $message = "Codigo Unico Generado para restablecer la contraseña tiene 24 horas para utilizar este codigo ".$number;
  if (mail($to,$subject,$message))
          {
        ?>   <div class="centrear">
              <H1> <?php echo("Se envio con exito el correo"); ?> <H1>
            </div>
    <?php   Header("Location:../secciones/recuperar_contraseña.php?msg=".$correo);
    
}else{
        ?>
           <div class="centrear">
           <H1> <?php echo ("Error al enviar el correo"); ?> <H1>
           </div>
  <?php } ?>
<?php}
else if(!$datos){
    ?>
    <H1> <?php echo ("El correo no existe o correo incorrecto");?><H1>
    </div>
<?php
}
?>
    
</body>
<footer>Crazy Scooter Pty
  Noni Team 
  2022
</footer>
</html>