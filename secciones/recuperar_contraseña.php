<?php 
include('../conexion/conexion.php'); 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
</head>
<body>
    <?php
    if(!empty($_GET)){
        $correo = $_GET['msg'];
    }
    ?>
    <H2></H2>
    <form action="../secciones/recuperar_contraseña.php" method="POST">
     <fieldset>
         Codigo de Verificacion
         <br>
         <br>
         <input type="text" name="codigo" required placeholder="Ingrese el codigo"/>
         <br>
         <br>
         <input type="hidden" name="correo" value=<?php echo $correo ?> />
         <input type="submit" value="Verificar"/>
</fieldset>   
</form>
<?php
if(!empty($_POST)){
   $codigo = $_POST['codigo'];
    $resultado = $con->query("SELECT * FROM usuario WHERE Recuperar ='$codigo'");
    $datos = $resultado->fetch(PDO::FETCH_OBJ);
     if($datos){
      Header("Location:../secciones/reestablecer.php?codigo=".$codigo);
     }
     else{
      echo("Codigo invalido");
     }
}
else{
    echo("Por aca");

}
?>
</body>
<footer>Nonis Team
      2022
</footer>
</html>