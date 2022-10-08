<?php 
    require "assets/funciones.php";

    if(validarArray($_POST['lluvia'])){

        echo "oops!  No se han cargado datos en el formulario!";
        
    }else{  
        $fecha = array();
        $lluvia = array();

        $lluvia = rellenar($_POST['lluvia']);
        $fecha = $_POST['fecha'];
        
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
    <main class="muestra">
        <section class="muestra__contenedor">
            <article class="muestra__contenedor__articulos">
                <p class="muestra__contenedor__articulos__titulos">
                    Se han guardado los siguientes datos</p>
                <div class="muestra__contenedor__articulos__items">
                    <?php mostrarDatos($lluvia,$fecha); ?>
                </div>
            </article>
            <article class="muestra__contenedor__articulos medio">
                <p class="muestra__contenedor__articulos__titulos">
                    Fechas con lluvias consecutivas
                </p>
                <div class="muestra__contenedor__articulos__items">
                    <?php mostrarConsecutivos($lluvia,$fecha,$indices)?>
                </div>
            </article>
            <article class="muestra__contenedor__articulos">
                <p class="muestra__contenedor__articulos__titulos">
                    Fecha con mayor cantidad de lluvia
                </p>
                <div class="muestra__contenedor__articulos__items">
                    <p>La fecha registrada de mayor precipitación es <?php echo $fecha[$fec]?> con <?php echo $cantidad;?><sub>mm</sub></p>
                </div>
            </article>
        </section>
    </main>
</body>
</html>

<?php 

}

?>