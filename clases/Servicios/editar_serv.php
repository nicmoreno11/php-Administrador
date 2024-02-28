<?php
require_once("../class.php");
$valo=new Trabajo();

if(isset($_POST['Enviar'])){
    $d1=$_POST['correo'];
    $d2=$_POST['contraseña'];
    $d3=$_POST['num_doc'];
    $d4=$_POST['tipo_doc'];
    $d5=$_POST['nombres'];
    $d6=$_POST['apellidos'];
    $d7=$_POST['telefono'];
    $d8=$_POST['direccion'];
    $id=$_POST['tipo_usuario'];
    
    $valor=$valo->actualizar_usuario($d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$id);
}
if(isset($_GET['cod'])){
    $v1=$_GET['cod'];
    $tipos=$valo->traerTipos();
    $tipo_doc=$valo->traerTipodoc($v1);
    $datos=$valo->traer_Uno($v1);

    $d1=$datos[0]["correo_electronico"];
    $d2=$datos[0]["contraseña"];
    $d3=$datos[0]["num_doc"];
    $d4=$datos[0]["tipo_doc"];
    $d5=$datos[0]["nombres"];
    $d6=$datos[0]["apellidos"];
    $d7=$datos[0]["telefono"];
    $d8=$datos[0]["direccion"];
    $d9=$datos[0]['cod_usuario'];
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
<form action="" method="POST">
        <h1>Actualizar usuario</h1>
        <label for="">Correo electrónico</label>
        <input type="email" name="correo" id="" class="casilla" value="<?php echo $d1; ?>">
        <label for="">Contraseña</label>
        <input type="password" name="contraseña" id="" class="casilla" value="<?php echo $d2; ?>">
        <label for="">Tipo de usuario</label>
        <select name="tipo_usuario" id="">
        <?php
                $sel="selected";
                for($i=0;$i<sizeof($tipos);$i++)
                {
                    $t1=$tipos[$i]["cod_usuario"];
                    $t2=$tipos[$i]["nom_tipo_usuario"];

                    if ($t1==$d9)
                    {
                        echo '<option value="'.$t1.'" SELECTED>'.$t2.'</option>';
                    }else
                    {
                        echo '<option value="'.$t1.'">'.$t2.'</option>';
                    }
                }
                ?>
        </select>
        <label for="">Número de documento</label>
        <input type="text" name="num_doc" id="" class="casilla" value="<?php echo $d3;?>">
        <label for="">Tipo de documento</label>
        <select name="tipo_doc" id="">
        <?php
                $sel="selected";
                for($i=0;$i<sizeof($tipo_doc);$i++)
                {
                    $t2=$tipo_doc[$i]["tipo_doc"];

                    if ($t2==$d4)
                    {
                        echo '<option value="'.$t2.'" SELECTED>'.$t2.'</option>';
                    }else
                    {
                        echo '<option value="'.$t1.'">'.$t2.'</option>';
                    }
                }
                ?>
    </select>
        <label for="">Nombres</label>
        <input type="text" name="nombres" id="" class="casilla" value="<?php echo $d5;?>">
        <label for="">Apellidos</label>
        <input type="text" name="apellidos" id="" class="casilla" value="<?php echo $d6;?>">
        <label for="">Teléfono</label>
        <input type="tel" name="telefono" id="" class="casilla" value="<?php echo $d7;?>">
        <label for="">Dirección</label>
        <input type="text" name="direccion" id="" class="casilla" value="<?php echo $d8;?>">
        <input type="submit" value="Enviar" name="Enviar" class="casilla">
    </form>
</body>
</html>