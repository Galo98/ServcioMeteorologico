<?php 
    require "assets/funciones.php";

    if(validarArray($_POST['lluvia'])){

        echo "oops!  No se han cargado datos en el formulario!";
        
    }else{  
        $dia = array();
        $lluvia = array();
        
        $nombreMes = array(" ","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

        $lluvia = rellenar($_POST['lluvia']);
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $anio = $_POST['año'];
        
        $resul = lluviaMaxima($lluvia);
        $cantidad = $resul[0];
        $fec = $resul[1] - 1;

        $indices = lluviaConsecutiva($lluvia);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/carga.css">
    <title>Servicio Meteorologico</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/icono/Group-16.ico">
    <script src="https://kit.fontawesome.com/600e7f7446.js" crossorigin="anonymous"></script>
</head>
<body>
    <header class="cabecera">
    <div class="cabecera-logo"><a class="logo-list" href="index.php"><p>Servicio Meteorológico</p><img class="imgLogo" src="img/icono/Group 16.png" alt="Logo Servicio Meteorológico"></a></div>
    <nav class="cabecera-nav">
        <ul class="cabecera__nav-lista">
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="index.php">Home</a></li>
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="ingreso.php">Registrar datos</a></li>
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="editar.php">Modificar registros</a></li>
        <li class="cabecera__nav__lista-item"><a class="__lista__item-link" href="#"></a></li>
        </ul>
    </nav>
    </header>
    <main class="muestra">
        <div class="muestra__caja"><p class="muestra__caja__titulo"> Mes de <?php echo $nombreMes[$mes];?></p></div>
        <section class="muestra__contenedor">
            <article class="muestra__contenedor__articulos">
                <p class="muestra__contenedor__articulos__titulos">
                    Registros ingresados
                </p>
                <div class="muestra__contenedor__articulos__items">
                    <?php mostrarDatos($lluvia,$dia); ?>
                </div>
            </article>
            <article class="muestra__contenedor__articulos medio">
                <p class="muestra__contenedor__articulos__titulos">
                    Lluvias consecutivas
                </p>
                <div class="muestra__contenedor__articulos__items">
                    <?php mostrarConsecutivos($lluvia,$dia,$indices)?>
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
                                    <p class="carga-datos"><?php echo $dia[$fec]?></p>
                            </div>
                            <div class="carga-precipitacion">
                                <p class="muestra__contenedor__articulos__titulos-tabla">Precipitación</p>
                                    <p class="carga-datos"> <?php echo $cantidad;?> <i class="fa-solid fa-droplet gota"></i></p>
                            </div>
                            </div>
                    </div>
                </div>
            </article>
        </section>
    </main>
</body>
</html>

<?php 

}

?>