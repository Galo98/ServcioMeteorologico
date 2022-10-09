<?php 

  require "assets/conex.php";

  $consulta = "select * from dia;"

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Servicio Meteorológico | Home </title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icono/Group-16.ico">
</head>
<body>
  <header class="cabecera">
    <div class="cabecera-logo"><a class="logo-list" href="index.php"><p>Servicio Meteorológico</p><img class="imgLogo" src="img/icono/Group 16.png" alt="Logo Servicio Meteorológico"></a></div>
    <nav class="cabecera-nav">
      <ul class="cabecera__nav-lista">
      <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="ingreso.php">Registrar datos</a></li>
      <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="editar.php">Modificar registros</a></li>
      <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="#"></a></li>
      </ul>
    </nav>
  </header>
  <main class="cajaindex">

  </main>

</body>
</html>