<?php
include("../conexion/conexion.php");

/* CONTROL DE ACTUALIZACION E INSERCION */

if(isset($_POST['control'])){
    if($_POST['control']=="1"){ //1=actualizar
        Actualizacion($_POST['id_scooter'],$_POST['nombre'],$_POST['foto_ante'],$_FILES['foto_nuevo'],$_POST['descripcion'],$_POST['cantidad']);
    }
    else{
        Insercion($_POST['nombre'],$_FILES['foto_nuevo'],$_POST['descripcion'],$_POST['cantidad']);
    }
}

// CONTROL DE BOTONES DE EDITAR SCOOTER
if(isset($_POST['operacion'])){
    if($_POST['operacion']=='insertar')
        {header("Location: ../secciones/insertar_scooter.php");}
    else{
        if($_POST['operacion']=='editar'){
            $ID=$_POST['id_scooter']; //por medio de un input hidden en editar_scooter.php obtengo del id del scooter seleccionado.
            header("Location: ../secciones/insertar_scooter.php?ID=".$ID);
        }
        else{$ID=$_POST['id_scooter'];
            Eliminacion($ID);}
    }
}
//------------------------------------------

function Insercion($nombre,$imagen,$descripcion,$cantidad){
    global $con;
    $foto="default_scooter.png";//foto por default

    if(($imagen['name'])!=""){
    $temp =$imagen['tmp_name'];
    $foto=microtime()."_".$nombre.".png"; //creamos un nombre unico compuesto de los segundos y el nombre del producto

    move_uploaded_file($temp,'../imagenes/Productos/'.$foto);}

    $insertar = $con->prepare("INSERT INTO scooter(Nombre,Imagen,Descripcion,Cantidad) VALUES(?,?,?,?)");
    $insertar->execute([$nombre,$foto,$descripcion,$cantidad]);
    header("Location: ../secciones/editar_scooter.php");
}

function Eliminacion($ID){
    global $con;

    //LOGICA PARA ELIMINAR ARCHIVO DE FOTO SI EXISTE (Y NO ES LA FOTO POR DEFECTO) 
    $consulta_foto = $con->query("SELECT Imagen FROM scooter WHERE ID_Scooter=".$ID);

    $fila=$consulta_foto->fetch(PDO::FETCH_OBJ);

        if($fila->Imagen !="default_scooter.png"){
            unlink("../imagenes/Productos/".$fila->Imagen);}

    $sqlDelete = $con->exec("DELETE FROM scooter WHERE ID_Scooter=".$ID);
    header("Location: ../secciones/editar_scooter.php");
}

function Actualizacion($id,$nombre,$imagen_ante,$imagen,$descripcion,$cantidad){
    global $con;

    $foto=$imagen_ante; //si la foto no cambia se mantiene la foto original

    if(($imagen['name'])!=""){ //si la nueva imagen no esta vacia
    $temp =$imagen['tmp_name'];
    $foto=microtime()."_".$nombre.".png";

    move_uploaded_file($temp,'../imagenes/Productos/'.$foto); //mueve la foto a la carpeta de productos

    //LOGICA PARA ELIMINAR ARCHIVO DE FOTO QUE FUE CAMBIADO (Y NO ES LA FOTO POR DEFECTO) 
    $consulta_foto = $con->query("SELECT Imagen FROM scooter WHERE ID_Scooter=".$id);

    $fila=$consulta_foto->fetch(PDO::FETCH_OBJ);
        if($fila->Imagen !="default_scooter.png"){
            unlink("../imagenes/Productos/".$fila->Imagen);}
    }

    $sqlUpdate = $con->exec("UPDATE scooter SET Nombre='$nombre',Imagen='$foto',Descripcion='$descripcion', Cantidad='$cantidad' WHERE ID_Scooter=".$id);
    header("Location: ../secciones/editar_scooter.php");
}

?>