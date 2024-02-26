<?php
require_once('../class.php');
$dato=new Trabajo;
//$valor=$dato->obtenerValor();
if(isset($_POST['Enviar'])){
    $fecha_inicio=$_POST['fecha_inicio'];
    $fecha_fin=$_POST['fecha_fin'];
    $precio=$_POST['precio'];
    $cod_tipo=$_POST['cod_tipo'];
    $num_doc=$_POST['num_doc'];

    $datos=$dato->registrarReserva($fecha_inicio, $fecha_fin, $precio, $cod_tipo, $num_doc);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Diseño/estilos.css">
    <title>Registro reserva</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Registro reserva</h1>
        <label for="">Fecha inicio</label>
            <input type="date" name="fecha_inicio" id="" class="casilla">
        <label for="">Fecha fin</label>
            <input type="date" name="fecha_fin" id="" class="casilla">
        <label for="">Precio</label>
            <input type="text" name="precio" id="" class="casilla">
        <label for="">Código tipo</label>
            <input type="text" name="cod_tipo" id="" class="casilla">
        <label for="">Número de documento</label>
            <input type="text" name="num_doc" id="" class="casilla">
        <input type="submit" value="Enviar" name="Enviar" class="casilla">
    </form>
</body>
</html>