<?php 

  require "assets/funciones.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/carga.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Servicio Meteorológico | Home </title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icono/Group-16.ico">
    <script src="https://kit.fontawesome.com/600e7f7446.js" crossorigin="anonymous"></script>
</head>
<body>
  <header class="cabecera">
    <div class="cabecera-logo"><a class="logo-list" href="index.php"><p>Servicio Meteorológico</p><img class="imgLogo" src="img/icono/Group 16.png" alt="Logo Servicio Meteorológico"></a></div>
    <nav class="cabecera-nav">
      <ul class="cabecera__nav-lista">
      <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="ingreso.php">Registrar datos</a></li>
      </ul>
    </nav>
  </header>
  <main class="cajaindex">

    <section class="MesesSinPrecipitaciones">
      <p class="titulo--index">Meses sin precipitaciones</p>
      <?php mesesSinLluvia(); ?>
    </section>

    <section class="MesConMayorPrecipitacion">
      <p class="titulo--index">Mes del 2022 con mayor precipitacion</p>
      <?php mesMayorPrecipitacion(); ?>
    </section>

    <section class="cajaMeses">
      <p class="titulo--index">Datos de los meses</p>
      <p>Seleccione un mes para visualizar las precipitaciones, lluvias consecutivas y mayor cantidad de mm</p>
      <div class="botoneraMeses"><?php botoneraMeses(); ?></div>
      <?php if(!isset($_POST['buscarMes'])){ ?>
        
    </section>
      <?php } else { 
        $nombreMes = array(" ","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        $mesBuscado = $_POST['buscarMes'];
        $lluvia = traerPrecipitaciones($mesBuscado);
        $resul = lluviaMaxima($lluvia);
        $cantidad = $resul[0];
        $fec = $resul[1];
        $diasBD = traerDias($_POST['buscarMes']);
        $indices = lluviaConsecutiva($lluvia); ?>
        <section class="muestra">
          <div class="muestra__caja"><p class="muestra__caja__titulo"> Mes de <?php echo $nombreMes[$mesBuscado];?></p></div>
          <section id="muestraContenedor" class="muestra__contenedor">
              <article class="muestra__contenedor__articulos">
                  <p class="muestra__contenedor__articulos__titulos">
                      Registros ingresados
                  </p>
                  <div class="muestra__contenedor__articulos__items">
                      <?php mostrarDatos($lluvia,$diasBD); ?>
                  </div>
              </article>
              <article class="muestra__contenedor__articulos medio">
                  <p class="muestra__contenedor__articulos__titulos">
                      Lluvias consecutivas
                  </p>
                  <div class="muestra__contenedor__articulos__items">
                      <?php mostrarConsecutivos($lluvia,$diasBD,$indices)?>
                  </div>
              </article>
              <article class="muestra__contenedor__articulos">
                  <p class="muestra__contenedor__articulos__titulos">
                      Mayor precipitación
                  </p>
                  <div class="muestra__contenedor__articulos__items">
                      <div class="contenedor-carga">
                          <div class="carga-muestra">
                              <div class="carga-dia">
                                <p class="muestra__contenedor__articulos__titulos-tabla">Día</p>
                                    <p class="carga-datos"><?php if($cantidad == 0){
                                        
                                        }else{
                                            echo $diasBD[$fec];
                                        }?></p>
                              </div>
                              <div class="carga-precipitacion">
                                <p class="muestra__contenedor__articulos__titulos-tabla">Precipitación</p>
                                    <p class="carga-datos"> <?php if($cantidad == 0){
                                        
                                    }else{
                                        echo $cantidad;?>
                                        <i class="fa-solid fa-droplet gota"></i></p>
                                    <?php }?> 
                            </div>
                              </div>
                      </div>
                  </div>
              </article>
          </section>
    </section>
    <?php }?>

    
  </main>
  <footer>

  </footer>

</body>
</html>