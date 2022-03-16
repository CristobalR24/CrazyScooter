<?php
session_start();
if(!isset($_SESSION['sw'])){
    header("location: ../secciones/login.php");
}
?>