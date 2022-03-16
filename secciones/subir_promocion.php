<?php
   include("../conexion/conexion.php");
   include("../procesos/verificar_sesion.php");
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
    <li><a href="logout.php">Salir</a></li>
  </ul> </nav>

  <script>
  var cargaArchivo = function(event) {
    var vista = document.getElementById('vista_previa');
    vista.src = URL.createObjectURL(event.target.files[0]);
    vista.onload = function() {
      URL.revokeObjectURL(vista.src) // importante-> libera memoria
    }
  };
  </script>

  <div>
      <form action ="../procesos/p_insertar_promocion.php" method="post" enctype="multipart/form-data">
      <input type="text" id="titulo" name="titulo" required>
      <br>
      <input type="file" id="image" name="image" accept="image/*" onchange="cargaArchivo(event)">
      <img id="vista_previa" alt="vista previa de foto" src="../imagenes/Promociones/<?php echo "default_scooter.png"; ?>" width="100"/>
      <br>
      <button name="submit">Cargar Imagen</button>        
      </form>

      
        <?php if (isset($_GET['msg'])){?>
          <div>
            Promocion añadida!
          </div>
        <?php } ?>
      
  </div>
  
  </div>
</body>
</html>