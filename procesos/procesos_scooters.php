<?php
include("../conexion/conexion.php");

if(!isset($_POST['operacion'])){
    header("Location: ../secciones/insertar_scooter.php");
}
else{
    if($_POST['operacion']=='editar'){
        $ID=$_POST['id_scooter'];
        header("Location: ../secciones/insertar_scooter.php?ID=".$ID);
    }
    else{
        echo "eliminar";
    }
}

?>