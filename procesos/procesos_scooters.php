<?php
include("../conexion/conexion.php");

/* control de botones */

if(isset($_POST['control'])){
    if($_POST['control']=="1"){
        echo "1";
    }
    else{
        Insercion($_POST['nombre'],$_FILES['foto_nuevo'],$_POST['descripcion'],$_POST['cantidad']);
    }
}

if(isset($_POST['operacion'])){
    if($_POST['operacion']=='insertar')
        {header("Location: ../secciones/insertar_scooter.php");}
    else{
        if($_POST['operacion']=='editar'){
            $ID=$_POST['id_scooter'];
            header("Location: ../secciones/insertar_scooter.php?ID=".$ID);
        }
        else
            echo "eliminar";
    }
}
function Insercion($nombre,$imagen,$descripcion,$cantidad){
    global $con;
    $foto="default_scooter.png";
   // echo $nombre." - ".$descripcion." ".$cantidad;
    if(($imagen['name'])!=""){
    $temp =$imagen['tmp_name'];
    $foto=microtime()."_".$nombre.".png";

    move_uploaded_file($temp,'../imagenes/Productos/'.$foto);}

    $insertar = $con->prepare("INSERT INTO scooter(Nombre,Imagen,Descripcion,Cantidad) VALUES(?,?,?,?)");
    $insertar->execute([$nombre,$foto,$descripcion,$cantidad]);
    header("Location: ../secciones/editar_scooter.php");
}

?>