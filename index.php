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
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
  <header>
    <h1>Servicio Meteorológico</h1>
    <nav>
      <ul>
      <li><a href="ingreso.php">Registrar datos</a></li>
      <li><a href="editar.php">Modificar datos cargados</a></li>
      <li><a href=""></a></li>
      </ul>
    </nav>
  </header>
    <form action="validar.php" method="post">
      <input type="date" name="date" required >
      <input type="submit" name="consulta" value="Enviar Datos">
      <br>
    </form>
</body>
</html>