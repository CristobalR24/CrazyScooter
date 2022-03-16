<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olvido-Contraseña</title>
</head>
<body>
    <H2>Olvido de Contraseña </H2>
<form action="../procesos/confirmar_correo.php" method="POST">
<fieldset>
    Ingrese el Correo 
    <br>
    <br>
    <input type="email" placeholder="crazyscooterspty@gmail.com" title="Escribe tu Correo Electronico" name="email" required/>
    <br>
    <br>
    <input class="enviar" type="submit" value="Recuperar Contraseña" >
    <br> 
    <input  class ="cancelar" type="reset" name="Cancelar" value="Cancelar">
</fieldset>
</form>
</body>
</html>