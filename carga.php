<?php 
    require "assets/funciones.php";

    if(!isset($_POST['lluvia'])){
        echo "Hoops!  ha ocurrido un error!";
        }else{
        $lluvia = array();
        $lluvia = $_POST['lluvia'];
        
    
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/header.css">
    <title>Servicio Meteorologico</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icono/Group-16.ico">
</head>
<body>
    <header class="cabecera">
    <div class="cabecera-logo"><p>Servicio Meteorológico</p><img class="imgLogo" src="img/icono/Group 16.png" alt="Logo Servicio Meteorológico"></div>
    <nav class="cabecera-nav">
        <ul class="cabecera__nav-lista">
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="index.php">Home</a></li>
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="ingreso.php">Registrar datos</a></li>
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="editar.php">Modificar registros</a></li>
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="#"></a></li>
        </ul>
    </nav>
    </header>
    <main>
        <h1>Se han guardado los siguientes datos</h1>
        <?php mostrarDatos($lluvia); ?>
    </main>
</body>
</html>

<?php 

}?>