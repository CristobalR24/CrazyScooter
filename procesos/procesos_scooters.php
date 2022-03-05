<?php
include("../conexion/conexion.php");

if(!isset($_POST['operacion'])){
    echo "insertar nuevo";
}
else{
    if($_POST['operacion']=='editar'){
        echo "editar existente";
    }
    else{
        echo "eliminar";
    }
}

?>