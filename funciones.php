<?php 
/*
31 enero,marzo,mayo,julio,agosto,octubre,diciembre
30 abril,junio,septiembre,noviembre
28 febrero
*/

    #region Funcion mes de 31 dias
function crearMesLargo(){
    for($i = 1; $i <= 31; $i++){
?> 
        <label for="lluvia<?php echo $i;?>">
            Ingrese la cantidad llovida para el 
            <?php if($i < 10){
                echo "0" .$i;
            }else{
            echo $i;
            }?>/1/2022

            <input type="number" step="0.01" name="lluvia[]" id="lluvia<?php echo$i;?>">
            </label>
        <?php
            }
        ?>
        <button>Guardar registros</button>
<?php    
        }
        #endregion
    
    #region Funcion mes de 30 dias
    function crearMesMedio(){
    for($i = 1; $i <= 30; $i++){
?> 
        <label for="lluvia<?php echo $i;?>">
            Ingrese la cantidad llovida para el 
            <?php if($i < 10){
                echo "0" .$i;
            }else{
            echo $i;
            }?>/1/2022

            <input type="number" step="0.01" name="lluvia[]" id="lluvia<?php echo$i;?>">
            </label>
        <?php
            }
        ?>
        <button>Guardar registros</button>
<?php    
        }
    #endregion

    #region Funcion mes de 28 dias
    function crearMesCorto(){
    for($i = 1; $i <= 28; $i++){
?> 
        <label for="lluvia<?php echo $i;?>">
            Ingrese la cantidad llovida para el 
            <?php if($i < 10){
                echo "0" .$i;
            }else{
            echo $i;
            }?>/1/2022

            <input type="number" step="0.01" name="lluvia[]" id="lluvia<?php echo$i;?>">
            </label>
        <?php
            }
        ?>
        <button>Guardar registros</button>
<?php    
        }
    #endregion

    #region Funcion formulario completo
    function crearForumario($mostrar){
        
        $mes = array(" ","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
        for($i = 1; $i <= 12; $i++){
            ?>
            <form method="GET">
            <input type="hidden" name="mes" value="<?php echo $i;?>">
            <button> Mes de <?php echo $mes[$i]; ?> / 2022</button>
        </form>
        <form class="deslisable">
            <?php 
            if($mostrar == $i){
                crearMesLargo();
            }
            ?>
        </form>
        <?php }
    }
    #endregion
?>