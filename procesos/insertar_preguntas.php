<?php
include('../conexion/conexion.php');

    try
    { 
        $pre=$_POST['pregunta'];
        $res=$_POST['respuesta'];

        //Prepare
        $consulta= $con->prepare("INSERT INTO preguntas (Preguntas, Respuestas) VALUES (:pregunta, :respuesta)");
        //Bind    
        $consulta->bindParam(':pregunta',$pre);
        $consulta->bindParam(':respuesta',$res);
        //Execute
        if($consulta->execute()){
            echo "Pregunta guardada";
        }
        header("Location: ../secciones/gestionar_preguntas.php");
    }

    catch(PDOException $e)
    {
       if($e->errorInfo[1] == 1062){
        echo "<br><br><span class='mensaje error'>Esta pregunta ya existe</span>"; }
       else
        echo "<br><br><span class='mensaje error'>Error al registrar: ".$e->getMessage()."</span>";
    }
       
?>