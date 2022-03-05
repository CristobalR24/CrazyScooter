<?php include("../procesos/verificar_sesion.php");
include("../conexion/conexion.php");

$sql='SELECT * FROM scooter';

?>
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
    <div>
        <a href="../procesos/procesos_scooters.php"><button>Añadir nuevo modelo</button></a>
    </div>
    <div> <!-- area lista de modelos-->
        <?php
        $consultarModelos=$con->query($sql);
        while($modelo=$consultarModelos->fetch(PDO::FETCH_OBJ)){?>
            <ul>
                <li>
                    <form action="../procesos/procesos_scooters.php" method="POST">
                        <input type="hidden" id="id_scooter" name="id_scooter" value="<?php echo $modelo->ID_Scooter;?>"/>
                        <img alt="vista previa del modelo" src="../imagenes/productos/<?php echo $modelo->Imagen;?>" width="100"/>
                        <br>
                        <?php echo $modelo->Nombre;?>
                        <br>
                        <?php echo $modelo->Descripcion;?>
                        <br>
                        <button name="operacion" type="submit" value="editar">Editar</button>
                        <br>
                        <button name="operacion" type="submit" value="eliminar" onclick="return confirm('¿Seguro/a que desea eliminar este modelo?')">Eliminar</button>
                    </form>
                </li>
            </ul>
        <?php }
        ?>

    </div>
    <footer>Copyright * 2022 | Noni team</footer>
</body>
</html>