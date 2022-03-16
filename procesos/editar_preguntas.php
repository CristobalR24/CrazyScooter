<?php
   include('../conexion/conexion.php');
?>

<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="UTF-8">
  <title>Gestionar preguntas </title>
  </head>

  <header>
      CRAZY SCOOTER / ELECTRIC LIFE
  </header>

  <nav>
   <ul>
	  <li><a href="#">Ver reservaciones</a></li>
      <li><a href="#">Editar clientes</a></li>
      <li><a href="#">Editar modelos</a></li>
      <li><a href="#">Subir promociones</a></li>
      <li><a href="#">Administrar usuarios</a></li>
      <li><a href="gestionar_preguntas.php">Gestionar preguntas</a></li>
   </ul>
  </nav>
  
  <body>
  <form action="actualizar_preguntas.php" method="POST">
      <?php
      $id=$_GET['id'];
      $consulta = $con->prepare("SELECT * FROM preguntas WHERE ID_Preguntas = '$id'");
      $consulta->execute();
      while($fila = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
      <input type="hidden" size="30" name="id" maxlength="1000" value="<?php echo $fila->ID_Preguntas; ?>"  require> <br>  
      Pregunta 
      <input type="text" size="30" name="pregunta" maxlength="1000" value="<?php echo $fila->Preguntas; ?>"  require> <br>   
      Respuesta:
      <input type="text" size="30" name="respuesta" maxlength="1000" value="<?php echo $fila->Respuestas; ?>"  require> <br>

      <input type="submit" value="Actualizar" name="btnActualizar"/>  
      <?php } ?>
      </form>
  </body>
</html>
 