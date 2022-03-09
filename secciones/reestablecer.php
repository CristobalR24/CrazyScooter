<?php include('../conexion/conexion.php');  ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Contraseña</title>
    <link rel="stylesheet" href="../css/reestablecer.css">
</head>
<body>
<div id="msg"></div>
 <!-- Mensajes de Verificación -->
 <div id="error" class="alert alert-danger ocultar" role="alert">
     Las Contraseñas no coinciden, vuelve a intentar !
 </div>
 <div id="ok" class="alert alert-success ocultar" role="alert">
     Las Contraseñas coinciden ! (Procesando formulario ... )
 </div>
 <?php
 if(!empty($_GET)){
     $codigo = $_GET['codigo'];
 }
 ?>
    <H2>Ingrese la nueva Contraseña<H2>
    <form action = "../secciones/mensaje_confirma.php" method="POST" id="formulario" onsubmit="verificarPasswords(); return false">
        <fieldset>
            <div class="form-group">
              <label for="pass1">Contraseña</label>
              <input type="password" class="form-control" id="pass1" required name="contra">
            </div>
            <div class="form-group">
              <label for="pass2">Vuelve a escribir la Contraseña</label>
              <input type="password" class="form-control" id="pass2" required>
          </div>
          <input type="hidden" value=<?php echo $codigo; ?> name="code" >
            <input type="submit" value="Aceptar" id="boton" />
</fieldset>
</form>
<script src="../js/contra.js"></script>
</body>
</html>