<?php
   include("../config/conexion.php");

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Promociones</title>
</head>
<body>
  <nav><ul>
    <li><a href="ver_reservaciones.php">Ver Reservaciones</a></li>
    <li><a href="editar_cliente.php">Editar Clientes</a></li>
    <li><a href="editar_scooter.php">Editar Modelos</a></li>
    <li><a href="subir_promocion.php">Subir Promociones</a></li>
    <li><a href="administrar_usuarios.php">Administrar Usuario</a></li>
    <li><a href="gestionar_preguntas.php">Gestionar Preguntas</a></li>
    <li><a href="" >Salir</a></li>
  </ul> </nav>

  <div>
      <form action ="p_insertar_promocion.php" method="post" entype="multipart/form-data">
      <input type="file" id="image" name="image" multiple>
          </div>
          <button name="submit">Cargar Imagen</button>
        
  </form>
  </div>
  
</div>
</body>
</html>