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
    <title>Servicio Meteorológico</title>
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <header class="cabecera">
    <h1 class="cabecera-logo">Servicio Meteorológico</h1>
    <nav class="cabecera-nav">
      <ul class="cabecera__nav-lista">
      <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="ingreso.php">Registrar datos</a></li>
      <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="editar.php">Modificar datos cargados</a></li>
      <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="nuevoingreso.php">nuevo registro</a></li>
      </ul>
    </nav>
  </header>


</body>
</html>