<?php 
include('../conexion/conexion.php');
$consultar = $con->query('SELECT * FROM usuario');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Usuario</title>
    <link rel="stylesheet" href="../css/general.css">
    <header>Administrar Usuario </header>
</head>
<body>
   <section>
    <nav><ul>
  <li><a href="ver_reservaciones.php">Ver Reservaciones</a></li>
  <li><a href="editar_cliente.php">Editar Clientes</a></li>
  <li><a href="editar_scooter.php">Editar Modelos</a></li>
  <li><a href="subir_promocion.php">Subir Promociones</a></li>
  <li><a href="administrar_usuarios.php">Administrar Usuario</a></li>
  <li><a href="gestionar_preguntas.php">Gestionar Preguntas</a></li>
  <li><a href="" >Salir</a></li>
    </ul> </nav>
  </section>
 <div>
    <form action="../secciones/buscar_usuario.php" method="POST">
            Buscar Usuario 
            <br>
            <input type="text" placeholder="Juan Perez" title="Buscar Usuario" name="nombre" required/>
            <br>
            <input class="enviar" type="submit" value="Buscar" >
   </form>
 </div>
<br>
</body>
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Apellido</th> 
<th>Usuario</th>
<th>Eliminar</th>
<th>Editar</th>
</tr>
</thead>
<tbody>
    <?php
    while($detalleUser=$consultar->fetch(PDO::FETCH_OBJ)){
    ?>
    <tr>
        <td><?php echo $detalleUser->Nombre;?></td>
        <td><?php echo $detalleUser->Apellido;?></td>
        <td><?php if($detalleUser->Tipo_usuario==1){
            echo 'Administrador';}
            else{echo 'General';}?></td>
         <?php  if($detalleUser->Tipo_usuario==1)
      {  echo "<td><button type='button'>Eliminar</button> </a> </td>";
         echo "<td>  <a href='editar_datos_usuario.php?ID_Usuario=".$detalleUser->ID_Usuario."'> <button type='button'>Editar</button> </a> </td>";
       }
        else{ 
          echo "<td>  <a href='../procesos/p_eliminar_usuario.php?ID_Usuario=".$detalleUser->ID_Usuario."'> <button type='button'>Eliminar</button> </a> </td>"; 
          echo "<td>  <a href='editar_datos_usuario.php?ID_Usuario=".$detalleUser->ID_Usuario."'> <button type='button'>Editar</button> </a> </td>";
        }
      }?>
        </tr>
   <?php if(!empty($_GET))
    {  $confirma = $_GET['msg']; 
      if($confirma == 1){
       echo "<p>Se ha editado el usuario con exito</p>";
      }
      else if($confirma == 2){
        echo "<p> Se ha eliminado el usuario con exito </p>";
      }
      else if ($confirma == 3){
        echo "<p> Error al eliminar  </p>";
      }
    } 
    ?>
            
</tbody>
</table>
</body>
<footer></footer>
</html>