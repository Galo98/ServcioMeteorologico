<?php 


// Colocamos 12 formularios dado que si hicieramos las validaciones para los meses de 31 dias, 30 dias o el mes de febrero, seria de dificil lectura de codigo dado que se deberia cerrar y abrir mucho la etiqueta de PHP

// para bd hacer un select donde el campo lluvia sea > 0;
/*
31 enero,marzo,mayo,julio,agosto,octubre,diciembre 1,3,5,7,8,10,12
30 abril,junio,septiembre,noviembre 4,6,9,11
28 febrero 2
*/

    function conectarBD(){
        $serv = "localhost";
        $usu = "root";
        $pass = "";
        $bd = "serviciomet";
        $con = mysqli_connect($serv,$usu,$pass,$bd);
    return $con;
    }

    #region Funcion crearMes

        function crearMes($cantidad,$mes,$año){
            $sql = "select * from datos where mes = $mes order by dia";
            $con = conectarBD();
            $datosDb = mysqli_query($con,$sql);
            for($i = 1; $datosMes = mysqli_fetch_assoc($datosDb); $i++){?> 

                    <label class="label" for="lluvia<?php echo $i;?>">
                        <!-- Ingrese la cantidad llovida para el  -->
                        <?php if($i < 10){
                            echo "0" .$i;
                        }else{
                        echo $i;
                        }?>/<?php if($mes < 10){echo "0" .$mes;}else{echo $mes;}?>/ <?php echo $año;?>
                        <input class="label-input" type="number" step="0.01" name="lluvia[]" id="lluvia<?php echo$i;?>" placeholder="<?php 
                        echo $datosMes['cantidad'];
                        ?>" pattern = "[0-9]" title='Solo numeros'>
                        <!-- validar que no se ingrese la e y - -->
                        <input type="hidden" name="dia[]" value="<?php echo $i;?>">
                        </label>
                    <?php } ?>

                    <input type="hidden" name="mes" value="<?php echo $mes;?>">
                    <input type="hidden" name="año" value="<?php echo $año;?>">
                    
        <?php }

        #endregion

    #region Funcion formulario completo
    
    function crearForumario($mostrar){
        
        $mes = array(" ","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");


        for($i = 1; $i <= 12; $i++){

        if($i == 1 or $i == 3 or $i == 5 or $i == 7 or $i == 8 or $i == 10 or $i == 12){?> 

        <form method="GET">
            <input type="hidden" name="mes" value="<?php echo $i;?>">
            <button class="btn-fecha-menu"> Mes de <?php echo $mes[$i]; ?></button>
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
            <button class="btn-fecha-menu"> Mes de <?php echo $mes[$i]; ?></button>
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
            <button class="btn-fecha-menu"> Mes de <?php echo $mes[$i]; ?></button>
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

    function mostrarDatos($datos,$fecha){ ?>
    <div class="contenedor-carga">
            <div class="carga-muestra">
                <div class="carga-dia">
                    <p class="muestra__contenedor__articulos__titulos-tabla">Día</p>
                    <?php for($i = 0; $i < count($datos); $i++){
                    if($datos[$i] != 0){?>
                        <p class="carga-datos"><?php echo $fecha[$i];?></p>
                    <?php
                    }
                }?>
                </div>
                <div class="carga-precipitacion">
                    <p class="muestra__contenedor__articulos__titulos-tabla">Precipitaciones</p>
                    <?php for($i = 0; $i < count($datos); $i++){
                        if($datos[$i] != 0){?>
                        <p class="carga-datos"> <?php echo $datos[$i];?> <i class="fa-solid fa-droplet gota"></i></p>
                    <?php
                    }
                }?>
                </div>
                </div>
    </div>
        <?php
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

    #region Funcion lluviaConsecutiva

    function lluviaConsecutiva($datos){

        $consecutivo = array();
        $retornoConsecutivo = array();

        for($i = 0; $i < count($datos); $i++){
            if($datos[$i] > 0){
                array_push($consecutivo, $i);
            }else if($datos[$i] <= 0){
                if(count($consecutivo) >= 2){
                    $retornoConsecutivo = array_merge($retornoConsecutivo,$consecutivo);
                    $consecutivo = array();
                }else{
                    $consecutivo = array(); // por las dudas se vacia igual
                }
            }
        }
        return $retornoConsecutivo;
    }

    #endregion
    
    #region Funcion mostrarConsecutivos

    function mostrarConsecutivos($datos,$fechas,$indices){?>
    <div class="contenedor-carga">
        <div class="carga-muestra">
            <div class="carga-dia">
                <p class="muestra__contenedor__articulos__titulos-tabla">Día</p>
                <?php for($i=0; $i < count($indices);$i++){ ?>
                    <p class="carga-datos"><?php echo $fechas[$indices[$i]];?></p>
                    <?php
                }
            ?>
            </div>
            <div class="carga-precipitacion">
                <p class="muestra__contenedor__articulos__titulos-tabla">Precipitaciones</p>
                <?php for($i=0; $i<count($indices);$i++){ ?>
                    <p class="carga-datos"> <?php echo $datos[$indices[$i]]?> <i class="fa-solid fa-droplet gota"></i></p>
                <?php } ?>
            </div>
            </div>
    </div>
    <?php } 


    #endregion

    #region Funcion insertMes

    function insertMes($mes,$anio,$array){
        
        $insert = "";
        $con = conectarBD();
        $b = 1; // Indica el dia

        for($i = 0; $i < count($array) ; $i++){
            $max = count($array) - 1;
            if($i == $max){
                $insert = $insert  ."($b,$mes,$anio,$array[$i])"; // el ultimo value va a ser sin ,
            }else{
                $insert = $insert  ."($b,$mes,$anio,$array[$i]),"; // desde el primer a anteultimo value van con ,
            }
            $b++; // se incrementa el dia
        }

        $sql = "insert into datos (dia,mes,anio,cantidad) values $insert;";

        mysqli_query($con,$sql);

        if(mysqli_affected_rows($con)>0){
            $mensaje = 1; // Se guardo satisfactoriamente
        }else{
            $mensaje = 2; // No se pudo guardar
        }
        return $mensaje;
    }


    #endregion

    #region Funcion mesesSinLluvia

    function mesesSinLluvia(){

        for($i = 1; $i <= 12; $i++){
            $a = sumaPrecipitacion($i); // sumamos la precipitacion del mes $i
            if($a < 1 && $a != null){ // si la suma es 0 toma el nombre del mes $i y lo muestra
                $mesSinPrecipitacion = buscarMes($i);
                echo "<p>En el mes de " .$mesSinPrecipitacion ." no hubo precipitaciones.</p>";
            }
        }

        
    }

    #endregion

    #region Funcion buscarMes

            function buscarMes($s){ // busca el nombre del mes correspondiente al numero $s, lo convierte en string y lo devuelve
            $dato = mysqli_query(conectarBD(), "select nombremes from mes where mes = $s");
            $dato = mysqli_fetch_row($dato);
            if($dato == NULL){
                $dato = 0;
            }else{
                $dato = array_shift($dato);
            }

            return $dato;
            }

    #endregion

    #region Funcion SumaPrecipitacion

        function sumaPrecipitacion($s){ // suma las precipitaciones del numero del mes ingresado $s, lo convierte en "int" y lo devuelve
            $dato = mysqli_query(conectarBD(), "select sumaPrecipitaciones($s);");
            $dato = mysqli_fetch_row($dato);
            $dato = array_shift($dato);
            return $dato;
        }
    #endregion

    #region Funcion mesMayorPrecipitacion

        function mesMayorPrecipitacion(){
            $mesPrecipitacionMaxima = 0;
            $precipitacionMaxima = 0;
            for($i = 1; $i < 13;$i++){
                $precipitacion = sumaPrecipitacion($i);
                if($precipitacion > $precipitacionMaxima){
                    $mesPrecipitacionMaxima = $i;
                    $precipitacionMaxima = $precipitacion;
                }
            }
            if($precipitacionMaxima == 0){
                echo "No hay precipitaciones cargadas en el sistema";
            }else{
                $mes = buscarMes($mesPrecipitacionMaxima);
                echo "El mes con mayor precipitacion es " .$mes ." con la cantidad de " .$precipitacionMaxima ."mm";
            }
        }

    #endregion

    #region Funcion bdStandar

    function bdStandar(){
        
        $insert = "";
        $con = conectarBD();
        $diasTotales = 31;

        for($j = 1; $j <= 12; $j++){
            if($j == 2){
                    $diasTotales = 28;
                } else if( $j == 4 || $j == 6 || $j == 9 || $j == 11){
                    $diasTotales = 30;
                }else{
                    $diasTotales = 31;
                }

            for($i = 1; $i <= $diasTotales; $i++){

                if($i == $diasTotales){
                    $insert = $insert  ."($i,$j,2022,0)"; // el ultimo value va a ser sin ,
                }else{
                    $insert = $insert  ."($i,$j,2022,0),"; // desde el primer a anteultimo value van con ,
                }
            }

            $sql = "insert into datos (dia,mes,anio,cantidad) values $insert;";

            mysqli_query($con,$sql);
            if(mysqli_affected_rows($con) > 0){
                echo "Se ha inicializado el mes " .$j ."correctamente <br>";
                $insert = "";
            }else{
                echo "Hubo un error en la carga del mes " .$j ."<br>";
            }
        }
        echo "---------PROCESO FINALIZADO---------";
    }

    #endregion

    #region

    function updateMes($mes,$array){
        $con = conectarBD();
        $dia = 1;
        for($i = 0; $i < count($array); $i++){
            mysqli_query($con,"update datos set cantidad = $array[$i] where mes = $mes and dia = $dia");
            $dia++;
        }
    }

    #endregion
?>