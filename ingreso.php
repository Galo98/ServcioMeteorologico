<?php 
    require "assets/funciones.php";
    $mostrar = 0;

    if(isset($_GET['mes']) && $_GET['mes'] >= 1){
        $mostrar = $_GET['mes'];

        if(isset($_POST['lluvia'])){
            $lluvia = $_POST['lluvia'];
            echo "Cantidad 0 " .$lluvia[0] ." ,Cantidad 1 " .$lluvia[1];
        }
    }
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/ingreso.css">
    <title>Servicio Meteorologico | Ingresos </title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icono/Group-16.ico">
</head>
<body>
    <header class="cabecera">
    <div class="cabecera-logo"><p>Servicio Meteorológico</p><img class="imgLogo" src="img/icono/Group 16.png" alt="Logo Servicio Meteorológico"></div>
    <nav class="cabecera-nav">
        <ul class="cabecera__nav-lista">
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="index.php">Home</a></li>
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="editar.php">Modificar registros</a></li>
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="#"></a></li>
        </ul>
    </nav>
    </header>
    <main>
        <section>
            <h1>Seleccione el mes en el que desea ingresar nuevos datos</h1>
            <div class="contenedor-forms"><?php crearForumario($mostrar)?></div>
        </section>
    </main>
</body>
</html>