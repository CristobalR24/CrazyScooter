<?php
include('../conexion/conexion.php');
$id = $_GET['ID_Usuario'];

$resultados =  $con->query("DELETE from usuario WHERE ID_Usuario=".$id);
$datos = $resultados->fetch(PDO::FETCH_OBJ);

if($datos){
    $confirma=3;
    Header("Location:../secciones/administrar_usuarios.php?msg=".$confirma);
}else{
    $confirma=1;
    Header("Location:../secciones/administrar_usuarios.php?msg=".$confirma);
}
?>