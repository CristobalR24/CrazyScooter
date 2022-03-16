<?php
include('../conexion/conexion.php');

    try
    { 
        $id=$_GET['id'];
        $eliminar = "DELETE FROM Preguntas WHERE ID_Preguntas = :id";
        $consulta= $con->prepare($eliminar);
        $consulta->bindParam(':id',$id);

        if($consulta->execute()){
            echo "Pregunta eliminada";
            header("Location: ../secciones/gestionar_preguntas.php");
        }
        else{
            header("Location: ../secciones/gestionar_preguntas.php");
        }
    }

    catch(PDOException $e)
    {
       if($e->errorInfo[1] == 1062){
        echo "<br><br><span class='mensaje error'>No se puede eliminar</span>"; }
       else
        echo "<br><br><span class='mensaje error'> Error al eliminar: ".$e->getMessage()."</span>";
    }
       
?>