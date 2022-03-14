<?php
    include ("../conexion/conexion.php");
    include ("../clases/usuario.php");

    if(!empty($_POST)&&($_POST['contrasena1'] == $_POST['contrasena2'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tipoUsuario = $_POST['tipoUsuario'];
        $correo = $_POST['correo'];
        $contrasena = md5($_POST['contrasena1']);

        echo($nombre."<br>".$apellido."<br>".$tipoUsuario."<br>".$correo."<br>".$contrasena."<br>");

        $datos = new Usuario($nombre, $apellido, $correo, $contrasena, $tipoUsuario);
        $insercion = $con ->prepare ("INSERT INTO Usuario (Nombre, Apellido, Correo, Contraseña, Tipo_Usuario) VALUES (:Nombre, :Apellido, :Correo, :Contrasena, :Tipo_Usuario)");
        try{
            $insercion -> execute ((array)$datos);
            $msg = "Su registro se ha guardado éxitosamente!!";
        }catch(PDOException $e){
            if($e -> errorInfo[1]==1062){
                $msg = "Este correo electrónico ya esta registrado en el sistema";
            }else{
                echo ("Otro error");
                $msg = "Error al guardar los datos".$e -> getMessage();
            }
        }
        header("Location: ../secciones/anadir_usuario.php?msg=".$msg);
        exit();
    }else{
        $msg = "Las contraseñas no coinciden, intentelo nuevamente";
        header("Location: ../secciones/anadir_usuario.php?=".$msg);
        exit();
    }
?>