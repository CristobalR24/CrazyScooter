<?php include("../procesos/verificar_sesion.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/general.css">
    <title>Añadir usuario</title>
    <header>Añadir usuario</header><br>

    <script>
        function ComprobarClave(){
            clave1 = document.formulario.contrasena1.value
            clave2 = document.formulario.contrasena2.value

            if(clave1 != clave2){
                alert ("Las 2 contraseñas no son iguales...");
                return false;
            }
        }
    </script>

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
        <li><a href="logout.php">Salir</a></li>
        </ul> </nav>
    </section>

    <p><?php if(isset($_GET['msg'])) echo $_GET['msg'];?> </p>

    <br><br>
    <form name="formulario" action="../procesos/guardarUsuario.php" method="POST" onSubmit="ComprobarClave();">
        
        Nombre: <input type="text" name="nombre" id="nombre" size="10" maxlength="20" autofocus require> <br><br>
        Apellido: <input type="text" name="apellido" id="apellido" size="10" maxlength="20" require> <br><br>
        Tipo de usuario: <input type="number" name="tipoUsuario" id="tipoUsuario" size="1" maxlength="1" min="1" max="2" require> <br><br>
        Correo: <input type="email" name="correo" id="correo" size="30" maxlength="100" require> <br><br>
        Contraseña: <input type="password" name="contrasena1" id="contrasena" size="10" maxlength="20" require> <br><br>
        Ingrese contraseña nuevamente: <input type="password" name="contrasena2" id="contrasena" size="10" maxlength="20" require> <br><br>
        
        <input type="submit" name="guarda" value="Guardar" onClick="ComprobarClave()">
    </form>
</body>
</html>