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
    <fieldset>
        <form action="../procesos/proceso_login.php" method="POST">
            
                <H1>PANEL DE CONTROL</H1>

                <label for="correo">Correo Electronico:</label>
                <input id="correo" name="correo" type="email" required/>
                <br><br>
                <label for="password">Contraseña:</label>
                <input id="password" name="password" type="password" required/>
                <br><br>
                <button>Ingresar</button>
                <a href="olvido_contra.php">olvide contraseña</a>
        </form>

        <?php if (isset($_GET['msg'])){?>
          <div>
            Usuario o contraseña incorrecto
          </div>
        <?php } ?>

    </fieldset>
    <footer>Copyright * 2022 | Noni team</footer>
</body>
</html>