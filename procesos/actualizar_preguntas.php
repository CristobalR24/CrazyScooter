<?php
include('../conexion/conexion.php');

    try
    {   $id=$_POST['id'];
        $pre=$_POST['pregunta'];
        $res=$_POST['respuesta'];

        //Prepare
        $consulta= $con->prepare("UPDATE preguntas SET Preguntas=:pregunta, Respuestas=:respuesta WHERE ID_Preguntas= :id");
        //Bind    
        $consulta->bindParam(':pregunta',$pre);
        $consulta->bindParam(':respuesta',$res);
        $consulta->bindParam(':id',$id);

        //Execute
        if($consulta->execute()){
            echo "Pregunta actualizada";
        }
        header("Location: ../secciones/gestionar_preguntas.php");
    }

    catch(PDOException $e)
    {
       if($e->errorInfo[1] == 1062){
        echo "<br><br><span class='mensaje error'>Lalo</span>"; }
       else
        echo "<br><br><span class='mensaje error'>Error al actualizar: ".$e->getMessage()."</span>";
    }
       
?>