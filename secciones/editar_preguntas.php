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
            <li><a href="ver_reservaciones.php">Ver Reservaciones</a></li>
            <li><a href="editar_cliente.php">Editar Clientes</a></li>
            <li><a href="editar_scooter.php">Editar Modelos</a></li>
            <li><a href="subir_promocion.php">Subir Promociones</a></li>
            <li><a href="administrar_usuarios.php">Administrar Usuario</a></li>
            <li><a href="gestionar_preguntas.php">Gestionar Preguntas</a></li>
            <li><a href="logout.php">Salir</a></li>
        </ul>
    </nav>
  
  <body>
  <form action="../procesos/actualizar_preguntas.php" method="POST">
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
 