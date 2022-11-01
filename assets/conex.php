<?php 
    function conectarBD(){
        $serv = "localhost";
        $usu = "root";
        $pass = "";
        $bd = "serviciomet";
        $con = mysqli_connect($serv,$usu,$pass,$bd);
    return $con;
    }
?>