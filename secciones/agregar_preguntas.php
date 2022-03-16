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
    <form action="../procesos/insertar_preguntas.php" method="POST">
      <fieldset>
       Pregunta:
       <input type="text" size="30" name="pregunta" maxlength="1000" require> <br><br>
       Respuesta:
       <input type="text" size="30" name="respuesta" maxlength="1000" require> <br><br>
       <input type="submit" value="Guardar" name="btnGuardar"/>    
      </fieldset>   
    </form>
  </body>

</html>