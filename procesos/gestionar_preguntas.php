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
  <table>
      <tr>
        <th> Gestionar preguntas <a href="agregar_preguntas.php"> <button> Añadir </button> </a> </th>
      </tr>

      <?php
      $consulta = $con->prepare("SELECT * FROM preguntas");
      $consulta->execute();
      while($fila = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
      <tr>
        <td> <?php echo $fila->Preguntas; ?> 
        <a href="editar_preguntas.php?id=<?php echo $fila-> ID_Preguntas; ?>"> <button>Editar</button> 
        <a href="eliminar_preguntas.php?id=<?php echo $fila-> ID_Preguntas; ?>"> <button>Eliminar</button> </td>
      </tr>
      <?php } ?>
   </table>
  </body>
</html>
 