<?php
include("../procesos/verificar_sesion.php");
include("../conexion/conexion.php");

if(isset($_GET["ID"])){  
    $sql='SELECT * FROM scooter WHERE ID_Scooter='.$_GET["ID"];

    $consulta=$con->query($sql);
    if($consulta->rowCount()>0){
    $detalle=$consulta->fetch(PDO::FETCH_OBJ);}
    
}
?>
<script>
  var cargaArchivo = function(event) {
    var output = document.getElementById('vista_previa');
    vista.src = URL.createObjectURL(event.target.files[0]);
    vista.onload = function() {
      URL.revokeObjectURL(vista.src) // free memory
    }
  };
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio de administrador</title>
</head>
<body>
    <header>Aqui va el encabezado (logo)</header>
    <nav>Aqui va la barra lateral</nav>
    <H1>PANEL DE CONTROL</H1>
    <div> <!-- area añadir -->
    
        
        <form action="" method="POST" enctype="multipart/form-data">
            <img id="vista_previa" alt="vista previa de foto" src="../imagenes/<?php if(isset($detalle)){echo "../imagenes/productos/".$detalle->Imagen;}else echo "default_scooter.png"; ?>" width="100"/>

            <label  class="archivo" for="foto_nuevo" >Subir una nueva foto: </label> 
            <input type="file" id="foto_nuevo" name="foto_nuevo" accept="image/*" onchange="cargaArchivo(event)">
            <br>
            <label for="nombre">Nombre:</label>
            <input id="nombre" name="nombre" type="text" value="<?php if(isset($detalle)){echo $detalle->Nombre;}?>" required/>
            <br>
            <label for="descripcion">Descripcion:</label>
            <input id="descripcion" name="descripcion" type="text" value="<?php if(isset($detalle)){echo $detalle->Descripcion;}?>" required/>
            <br>
            <label for="cantidad">Cantidad:</label>
            <input id="cantidad" name="cantidad" type="number" value="<?php if(isset($detalle)){echo $detalle->Cantidad;}?>" required/>
        </form>
    </div>
    <footer>Copyright * 2022 | Noni team</footer>
</body>
</html>