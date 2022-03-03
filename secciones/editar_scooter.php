<?php include("../procesos/verificar_sesion.php");

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
    <div> <!-- area lista de modelos-->
        <?php
        $consultarModelos=$con->query($sql);
        while($modelo=$consultarModelos->fetch(PDO::FETCH_OBJ)){?>
            <ul>
                <li>
                    imagen
                    <br>
                    <?php echo $modelo->Nombre;?>
                </li>
            </ul>
        <?php }
        ?>

    </div>
    <footer>Copyright * 2022 | Noni team</footer>
</body>
</html>