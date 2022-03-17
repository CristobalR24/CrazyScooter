<html>
<meta charset="UTF-8">
<head>
    Alquiler
</head>

<body>
<br>



<?php
    try{
        include('../conexion/conexion.php');

        $sql='CALL obtener_scooter()';
        $consulta=$con->prepare($sql);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        $cant=array();
       
        $id_elementos=0;



        while($row=$consulta->fetch())
        {
            
            ?> 
            <div >
            <img src="<?php echo $row["Imagen"];?>"style="width:12rem;height:12rem;" alt="Scotter" > 
            <br>
            

            <?php
            echo $row["Nombre"];
            ?>

            <br>

            <?php
            echo $row["Descripcion"];
            ?>

            <br>

            <?php

            ?>
            <button onclick="abrir(this.value)" value="<?php echo $row["ID_Scooter"]; ?>" class="btn_alquilar">Alquilar</button>

            <br> 
        
        </div>
            <?php

        }   

      
        

    }
    catch(Excepcion $e){
        echo "Algo ha salido mal";
    }

    finally{
        $con=null;
    }
?>

<!-- script para abrir el cuadro de dialogo-->
<script type="text/JavaScript" src="JS\logica_alquilarJS.js">

</script>


<dialog id="favDialog">

    <h1 id="titulo">Alquiler</h1>

    <img id="imagen" src="..\imagenes\productos\default.png" style="width:12rem;height:12rem;" alt="Scotter">
    <br>


    <label>Nombre</label>
    <input id="Nombre" maxlength="15" autofocus required>
    <br>
    <label>Apellido</label>
    <input id="Apellido" maxlength="15" required>
    <br>

    <label>Cédula</label>
    <input id="Cedula" maxlenght="15" required>
    <br>

    <label>Correo</label>
    <input id="Correo" type="email" required>
    <br>

    <label>Celular</label>
    <input id="Celular" required>
    <br>
    <label>cantidad de scooters para alquilar</label>
    <input id="cantidad_Alquiler" value="1" type="number" min="1" max="7" onChange="calcular()" required>

    <br>
    <label>Cantidad disponible</label>
    <input id="cantidad_Disponible" value="7" readonly >
    <br>
    <label>Tiempo de alquier</label>

    <!--Cambiar por una UL en el estilo final, Select no admite diseño-->
    <select id="tiempo" name="tiempo_opcion" onChange="calcular()" required>
        <option value="0"> Seleccione una opcion </opcion> 
        <option value="1">30 Minutos</option>
        <option value="2">1 hora</option>
    </select>
    <br>

    <label>Total de la reserva =</label>
    <input id="total" value="0" readonly>
    <br>
    <p id="error"></p>
    <button id="cerrar" onclick="cerrar()">Cancelar</button>
    <button id="reserva" onclick="reserva()">Alquilar</button>
    
</dialog>

<dialog id="dialogo_reserva">
    <h1>Su codigo de confirmacion es</h1>
    <h2 id="cod_reserva"></h2>
    <p>Guarde este codigo!</p>
    <button id="cerrar_reserva" onclick="cerrar_reserva()">Cerrar</button>
</dialog>




</body>


</html>