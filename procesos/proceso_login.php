<?php session_start();
include("../conexion/conexion.php");

if(!empty($_POST)){
    $correo=$_POST['correo'];
    $pass=md5($_POST['password']);
    verificar($correo,$pass);
}

function verificar($correo,$pass){
    global $con;
    $sql="SELECT * FROM usuario WHERE Correo='$correo' AND Contraseña='$pass'";
    $consulta=$con->query($sql);
    $resultado=$consulta->fetch(PDO::FETCH_OBJ);

    if($consulta->rowCount()>0){

        $_SESSION['sw']=true;
        header("Location: ../secciones/ver_reservaciones.php");
    }
    else{
        header("Location: ../secciones/login.php");
    }

}

?>