<?php 

    require "assets/funciones.php";

    if(isset($_POST['cargaBD']) && $_POST['cargaBD'] != ""){
        bdStandar();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="hidden" name="cargaBD" value="1">
        <input type="submit" value="Iniciar BD">
    </form>
</body>
</html>