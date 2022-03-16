<?php
 try{
    include('conexion/conexion.php');
   
      
      $opcion=$_REQUEST["opcion"];

      switch($opcion)
      {
        case 1:
            $parametro=$_REQUEST["q"];
            $sql='CALL obtener_imagen(?)';

            $consulta=$con->prepare($sql);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta ->bindParam(1,$parametro,PDO::PARAM_INT);
            $consulta->execute();
            while($row=$consulta->fetch()){
                echo $row["Imagen"];
            }
            break;

        case 2:
            $parametro=$_REQUEST["q"];
            $sql="CALL contar_scooters(?)";
            $consulta=$con->prepare($sql);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->bindParam(1,$parametro,PDO::PARAM_INT);
            $consulta->execute();
            while($row=$consulta->fetch()){
                echo $row["Cantidad"];
            }
            break;

        case 3:
            try{
            $nombre=$_REQUEST["nombre"];
            $apellido=$_REQUEST["apellido"];
            $cedula=$_REQUEST["cedula"];
            $celular=$_REQUEST["celular"];
            $correo=$_REQUEST["correo"];
            $cantidad=$_REQUEST["cantidad"];
            $total=$_REQUEST["total"];
            $estado=$_REQUEST["estado"];
            $sql="CALL insertar_reserva(?,?,?,?,?,?,?,?)";
            // $sql="CALL test()";
            $consulta=$con->prepare($sql);
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            $consulta->bindParam(1,$nombre,PDO::PARAM_STR);
            $consulta->bindParam(2,$apellido,PDO::PARAM_STR);
            $consulta->bindParam(3,$cedula,PDO::PARAM_STR);
            $consulta->bindParam(4,$celular,PDO::PARAM_STR);
            $consulta->bindParam(5,$correo,PDO::PARAM_STR);
            $consulta->bindParam(6,$cantidad,PDO::PARAM_INT);
            $consulta->bindParam(7,$total,PDO::PARAM_INT);
            $consulta->bindParam(8,$estado,PDO::PARAM_INT);
            $consulta->execute();
                
            while($row=$consulta->fetch())
            {
                echo $row["Codigo_Reservacion"];
            }
            

        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
            break;

      }
    


}
catch(Excepcion $Ex){
        echo "Algo a salido mal...";
}

finally{
    $con=null;
}
    
?>