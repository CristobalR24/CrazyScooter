<?php
include('../conexion/conexion.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$tipo = $_POST['opcion'];
$sqlUpdate = $con->exec("UPDATE usuario SET Nombre='$nombre', Apellido = '$apellido', Correo= '$correo', Tipo_usuario='$tipo' WHERE ID_Usuario ='$id'");
$confirma=1;
Header("Location:../secciones/administrar_usuarios.php?msg=".$confirma);
?>