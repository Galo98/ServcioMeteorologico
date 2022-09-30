<?php 
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
    <link rel="stylesheet" href="/assets/css/nuevo.css">
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
        <form action="" method="GET">
            <input type="hidden" name="mes" value="1">
            <button> Mes de Enero / 2022</button>
        </form>
        <form action="" class="deslisable">
        <?php 
        if($mostrar == 1){
            for($i = 1; $i <= 31; $i++){
        ?> 
            <label for="lluvia<?php echo $i;?>">Ingrese la cantidad llovida para el <?php 
            if($i < 10){
                echo "0" .$i;
            }else{
            echo $i;
            }?>/1/2022
            <input type="number" step="0.01" name="lluvia[]" id="lluvia<?php echo$i;?>">
            </label>
        <?php
            }
        }
        ?>
        </form>
        <form action="" method="GET">
            <input type="hidden" name="mes" value="2">
            <button> Mes de Febrero / 2022</button>
        </form>
        <form action="" method="GET">
            <input type="hidden" name="mes" value="3">
            <button> Mes de Marzo / 2022</button>
        </form>
    </main>
</body>
</html>