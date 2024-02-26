<?php
require_once("../class.php");
$valo=new Trabajo();

if(isset($_POST['Enviar'])){
    $id=$_POST['codigo'];
    $d2=$_POST['numero'];
    $d3=$_POST['tipo'];
    $d4=$_POST['capacidad'];
    $d5=$_POST['precio'];
    $d6=$_POST['estado'];
    $d7=$_POST['descripcion'];
    
    $valor=$valo->actualizar_habitacion($id,$d2,$d3,$d4,$d5,$d6,$d7);
}
if(isset($_GET['cod'])){
    $v1=$_GET['cod'];
    $tipos=$valo->traerTipoHabitacion();
    $estado=$valo->TraerEstado($v1);
    $datos=$valo->traerHabitacion($v1);

    $d1=$datos[0]["cod_tipo_hab"];
    $d2=$datos[0]["nom_tipo_hab"];
    $d3=$datos[0]["capacidad"];
    $d4=$datos[0]["valor_base"];
    $d5=$datos[0]["nro_hab"];
    $d6=$datos[0]["estado_hab"];
    $d7=$datos[0]["descripcion_hab"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Diseño/estilos.css">
    <title>Actualizar datos</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Diseño/estilos.css">
    <link rel="icon" href="imagenes/logo-sombrilla.png">
    <title>Ingresar habitación</title>
</head>
<body>
    <form method="POST" class="form_hab">
    <div class="contenedor">
        <h1>Registro de habitación</h1>
        <label for="">Código tipo de habitación</label>
        <input class="casilla" type="number" name="codigo" id="" value="<?php echo $d1;?>">
        <label for="">Número de habitación</label>
        <input class="casilla" type="number" name="numero" id="" value="<?php echo $d5;?>">
        <label for="">Tipo de habitación</label>
        <select class="casilla" name="tipo" id="" value="<?php echo $d2;?>">
        <?php
                $sel="selected";
                for($i=0;$i<sizeof($tipos);$i++)
                {
                    $t2=$tipos[$i]["nom_tipo_hab"];

                    if ($t2==$d2)
                    {
                        echo '<option value="'.$t2.'" SELECTED>'.$t2.'</option>';
                    }else
                    {
                        echo '<option value="'.$t1.'">'.$t2.'</option>';
                    }
                }
                ?>
        </select>
        <label for="">Capacidad</label>
        <input class="casilla" type="number" name="capacidad" id="" value="<?php echo $d3;?>">
        <label for="">Precio</label>
        <input class="casilla" type="text" name="precio" id="" value="<?php echo $d4;?>">
        <label for="">Estado</label>
        <select class="casilla" name="estado" id="">
            <option value="Mantenimiento">Mantenimiento</option>
            <option value="Ocupada">Ocupada</option>
            <<?php
                $sel="selected";
                for($i=0;$i<sizeof($estado);$i++)
                {
                    //$t1=$estado[$i]["nro_hab"];
                    $t2=$estado[$i]["estado_hab"];

                    if ($t2==$d6)
                    {
                        echo '<option value="'.$t2.'" SELECTED>'.$t2.'</option>';
                    }else
                    {
                        echo '<option value="'.$t1.'">'.$t2.'</option>';
                    }
                }
                ?>
        </select>
        <label for="">Descripción</label>
        <textarea class="casilla" name="descripcion" id="" cols="10" rows="0" values="<?php echo $d7;?>"></textarea>
        <input class="casilla" type="submit" value="Enviar" name="Enviar">
        </div>
    </form>

</body>
</html>