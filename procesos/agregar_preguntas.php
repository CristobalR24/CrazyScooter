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
    <form action="insertar_preguntas.php" method="POST">
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