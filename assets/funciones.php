<?php 

// Colocamos 12 formularios dado que si hicieramos las validaciones para los meses de 31 dias, 30 dias o el mes de febrero, seria de dificil lectura de codigo dado que se deberia cerrar y abrir mucho la etiqueta de PHP


/*
31 enero,marzo,mayo,julio,agosto,octubre,diciembre 1,3,5,7,8,10,12
30 abril,junio,septiembre,noviembre 4,6,9,11
28 febrero 2
*/

    #region Funcion crearMes

        function crearMes($cantidad,$mes,$año){
            for($i = 1; $i <= $cantidad; $i++){?> 

                    <label class="label" for="lluvia<?php echo $i;?>">
                        <!-- Ingrese la cantidad llovida para el  -->
                        <?php if($i < 10){
                            echo "0" .$i;
                        }else{
                        echo $i;
                        }?>/<?php if($mes < 10){echo "0" .$mes;}else{echo $mes;}?>/ <?php echo $año;?>
                        <input class="label-input" type="number" step="0.01" name="lluvia[]" id="lluvia<?php echo$i;?>">
                        <!-- validar que no se ingrese la e y - -->
                        <input type="hidden" name="fecha[]" value="<?php echo $i ."-" .$mes ."-" .$año;?>">
                        </label>
                    <?php } ?>
                    
        <?php }

        #endregion

    #region Funcion formulario completo
    
    function crearForumario($mostrar){
        
        $mes = array(" ","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");


        for($i = 1; $i <= 12; $i++){

        if($i == 1 or $i == 3 or $i == 5 or $i == 7 or $i == 8 or $i == 10 or $i == 12){?> 

        <form method="GET">
            <input type="hidden" name="mes" value="<?php echo $i;?>">
            <button class="btn-fecha-menu"> Mes de <?php echo $mes[$i]; ?> / 2022</button>
        </form>
        <form class="form-contenedor" action="carga.php" method="POST">
            <?php if($mostrar == $i){ ?>
                <div class="contenedor-deslisable">
                    <div class="deslisable"><?php crearMes(31,$i,2022);?></div>
                    <div class="caja-btn"><button class="btn-ingreso">Guardar registros</button></div>
                </div>
                <?php } ?>
        </form>
        
        
        <?php }else if($i == 4 or $i == 6 or $i == 9 or $i == 11){?>

        <form method="GET">
            <input type="hidden" name="mes" value="<?php echo $i;?>">
            <button class="btn-fecha-menu"> Mes de <?php echo $mes[$i]; ?> / 2022</button>
        </form>
        <form class="form-contenedor" action="carga.php" method="POST">
            <?php if($mostrar == $i){ ?>
                <div class="contenedor-deslisable">
                    <div class="deslisable"><?php crearMes(30,$i,2022);?></div>
                    <div class="caja-btn"><button class="btn-ingreso">Guardar registros</button></div>
                </div>
                <?php } ?>
        </form>

        <?php } else if($i == 2){ ?>

        <form method="GET">
            <input type="hidden" name="mes" value="<?php echo $i;?>">
            <button class="btn-fecha-menu"> Mes de <?php echo $mes[$i]; ?> / 2022</button>
        </form>
        <form class="form-contenedor" action="carga.php" method="POST">
            <?php if($mostrar == $i){ ?>
                <div class="contenedor-deslisable">
                    <div class="deslisable"><?php crearMes(28,$i,2022);?></div>
                    <div class="caja-btn"><button class="btn-ingreso">Guardar registros</button></div>
                </div>
                <?php } ?>
        </form>
        <?php } else{
            echo "No se pudo generar el formulario";
        }
        }  
    }
    #endregion
    
    #region Funcion validar array

    function validarArray($array){
        $resultados = array();

        for($i = 0; $i < count($array);$i++){

            if($array[$i] == ""){
                // esta vacio para que no se cargue nada y sirva el empty()
            }else{
                $resultados[$i] = "tiene algo";
                $i = count($array) + 5;
            }

        }

        $validacion = empty($resultados);

        if($validacion == 1){
            return true;
        }else{
            return false;
        }

    }

    #endregion

    #region Funcion rellenar array
    
    function rellenar($array){
        $validado = array();
        for($i = 0; $i < count($array); $i++){
            if($array[$i] == ""){
                $validado[$i] = 0;
            }else{
                $validado[$i] = $array[$i];
            }
        }
        return $validado;
    }

    #endregion

    #region Funcion mostrar datos

    function mostrarDatos($datos,$fecha){

        for($i = 0; $i < count($datos); $i++){

            if($datos[$i] != 0){?>

            <p>En la fecha  <?php echo $fecha[$i];?> se registraron <?php echo $datos[$i];?> <sub>ml</sub></p>

            <?php
            }

        }
        
    }

    #endregion

    #region Funcion mayor dia lluvioso posicion 0 = lluvia posicion 1 = posicion array

    function lluviaMaxima($variable){
        $valor = 0;
        $posicion = 0; 
        $valores = array();
        for($i = 0; $i < count($variable); $i++){
            if($variable[$i] > $valor){
                $valor = $variable[$i];
                $posicion = $i;
            }
        }
        $valores[0] = $valor;
        $valores[1] = $posicion;
        return $valores;
    }

    #endregion
?>