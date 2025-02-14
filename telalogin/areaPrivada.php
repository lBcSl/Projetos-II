<?php
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: index.php");
        exit;
    }
//colocar aqui a home page do site
    header("location: ../index.html");

?>

