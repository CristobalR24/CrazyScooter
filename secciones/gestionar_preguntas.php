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
        <a href="../procesos/eliminar_preguntas.php?id=<?php echo $fila-> ID_Preguntas; ?>"> <button>Eliminar</button> </td>
      </tr>
      <?php } ?>
   </table>
  </body>
</html>
 