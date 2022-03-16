<?php
include("../conexion/conexion.php");

if(isset($_FILES['image'])){

    $nombre=$_POST['titulo'];

    if(($_FILES['image']['name'])!=""){
    $temp =$_FILES['image']['tmp_name'];
    $foto=microtime()."_".date("l").".png"; //creamos un nombre unico compuesto de los segundos y el dia
    move_uploaded_file($temp,'../imagenes/Productos/'.$foto);}

    $insertar = $con->prepare("INSERT INTO promociones(nombre_promocion,imagen_promocion) VALUES(?,?)");
    $insertar->execute([$nombre,$foto]);
    header("Location: ../secciones/subir_promocion.php?msg=promocion añadida");

}
else
    echo "no foto";
?>