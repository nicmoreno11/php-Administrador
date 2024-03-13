<?php
require_once("../class.php");
$valo=new Trabajo();

if(isset($_POST['Enviar'])){
    $cod_servicio=$_POST['cod_servicio'];
    $s1=$_POST['id_rest'];
    $s2=$_POST['nom_producto_rest'];
    $s3=$_POST['valor'];
    
    $valor=$valo->actualizar_servicio($cod_servicio, $s1,$s2,$s3);
}
if(isset($_GET['cod'])){
    $serv1=$_GET['cod'];
    //$tipos=$valo->VerServicios();
    //$servcio=$valo->traer_servicios($serv1);
    $datos=$valo->traer_servicios($serv1);
    $cod_servicio=$datos[0]["cod_servicio"];
    $s1=$datos[0]["id_rest"];
    $s2=$datos[0]["nom_producto_rest"];
    $s3=$datos[0]["valor"];
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
        <h1>Actualizar servicio</h1>
        <label for="">Codigo Servicio</label>
        <input type="text" name="cod_servicio" class="casilla" value="<?php echo $cod_servicio; ?>"><br>
        <label for="">Id Servicio</label>
        <input type="text" name="id_rest" class="casilla" value="<?php echo $s1; ?>">
        <label for="">Nombre Producto</label>
        <input type="text" name="nom_producto_rest" class="casilla" value="<?php echo $s2;?>">
        <label for="">Valor</label>
        <input type="text" name="valor" class="casilla" value="<?php echo $s3;?>">
        <input type="submit" value="Enviar" name="Enviar" class="casilla">
    </form>
</body>
</html>