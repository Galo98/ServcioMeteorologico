<?php 
    require "assets/funciones.php";
    $mostrar = 0;
    if(isset($_GET['mes']) && $_GET['mes'] >= 1){
        $mostrar = $_GET['mes'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Servicio Meteorológico</h1>
        <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="editar.php">Modificar datos cargados</a></li>
            <li><a href=""></a></li>
        </ul>
        </nav>
    </header>
    <main>
        <h1>Seleccione el mes en el que desea ingresar nuevos datos</h1>
        <?php crearForumario($mostrar);?>
    </main>
</body>
</html>