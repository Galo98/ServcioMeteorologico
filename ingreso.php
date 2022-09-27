<?php 
    require "assets/conex.php";

    $mensaje = 0;
    
    if(isset($_POST['fecha'])){

        $fecha = $_POST['fecha'];
        $clluvia = $_POST['cantidad'];
        if($clluvia > 0){
            $llovio = true;
        }else{
            $llovio = false;
        }
        $clima = $_POST['clima'];


        $query1 = "insert into dia (fecha) values ('$fecha')";

        $ingreso1 = mysqli_query($con,$query1);

        //consulta para obtener la id del producto
        $queryid = "select * from dia order by id_dia desc limit 1;";
        $sql = mysqli_query($con,$queryid);
        $id = mysqli_fetch_row($sql);
        $id = $id[0]++;

        $query2 = "insert into llovio (if_rain, cantidad, tipo_clima,id_dia) values ($llovio,$clluvia,'$clima',$id)";

        $ingreso2 = mysqli_query($con,$query2);

        if(mysqli_affected_rows($con)>0){
            $mensaje = 1;
        }else{
            $mensaje = 2;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <form action="#" method="POST">
        <label for="fec">Seleccione la fecha que quiere ingresar</label>
        <input type="date" name="fecha" id="fec">
        <label for="lluvia">Cantidad de lluvia</label>
        <input type="float" step="" name="cantidad" id="lluvia">
        <label for="tClima">Tipo de clima</label>
        <select name="clima" id="tClima">
            <option value="Frio">Frio</option>
            <option value="Calido">Calido</option>
            <option value="Templado">Templado</option>
            <option value="Humedo">Humedo</option>
        </select>
        <button>Guardar registro</button>
    </form>
    <div>
        <?php switch($mensaje){
            case 0:
                break;
                case 1:?>
                <p>Registro guardado correctamente</p>
            <?php break;
                case 2:?>
                <p>No se ha podido guardar el registro correctamente</p>
            <?php break;
            }?>
    </div>
</body>
</html>