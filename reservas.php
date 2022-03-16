<html>
<meta charset="UTF-8">
<head>
    Reservas
</head>

<body>
<br>

<button id="estado">Ver Reservaciones procesadas</button>

<script type="text/JavaScript" src="JS/logicaJS.js">

    
   </script>

<table id="TablaReservacion">

    <tr>
        <th>#Reservacion</th>
        <th>Nombre</th>
        <th>Cédula</th> 
        <th>Celular</th>
        <th>Correo</th>
        <th>Total a pagar</th>
        <th>Codigo de Reserva</th>
        <th>fecha</th>
        <th>Estado</th> 

    </tr>
    
    <?php
    try{
        include('conexion/conexion.php');
        try{
            $estado= $_COOKIE['Estado'];
        }
        catch(Exception $err_cookie){
            echo "Cargando...";
        }
        
        $sql='CALL obtener_reservaciones(?)';

        $consulta=$con->prepare($sql);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
       $consulta ->bindParam(1,$estado,PDO::PARAM_INT);
        $consulta->execute();
        while($row=$consulta->fetch()){
            echo"<tr>";
            echo "<td>".$row["ID_Reservaciones"]."</td>";
            echo "<td>".$row["Nombre"]."</td>";
            echo "<td>".$row["Cedula"]."</td>";
            echo "<td>".$row["Celular"]."</td>";
            echo "<td>".$row["Correo"]."</td>";
            echo "<td>".$row["Total_Pagar"]."</td>";
            echo "<td>".$row["Codigo_Reservacion"]."</td>";
            echo "<td>".$row["Fecha_Reservacion"]."</td>";
            echo "<td>".$row["Estado"]."</td>";
            echo "</tr>";
        }
    
    }
    catch(Excepcion $Ex){
            echo "Algo a salido mal...";
    }

    finally{
        $con=null;
    }
        



      ?>


   
</table>


</body>


</html>