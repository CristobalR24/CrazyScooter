<?php session_start();
include("../conexion/conexion.php");

if(!empty($_POST)){
    $correo=$_POST['correo'];
    $pass=$_POST['password'];
    verificar($correo,$pass);
}

function verificar($correo,$pass){
    global $con;
    $sql="SELECT * FROM usuario WHERE Correo='$correo' AND Contraseña='$pass'";
    $consulta=$con->query($sql);
    $resultado=$consulta->fetch(PDO::FETCH_OBJ);

    if($consulta->rowCount()>0){
        echo $resultado->Correo;
        echo "<br>";
        echo $resultado->Contraseña;

        $_SESSION['sw']=true;
    }
    else{
        header("Location: ../secciones/login.php");
    }

}

?>