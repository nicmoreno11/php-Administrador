<?php
require_once('../class.php');
$dato = new Trabajo();
if(isset($_POST['Enviar'])){
    $cod_servicio=$_POST['cod_servicio'];
    $num_doc_cliente=$_POST['num_doc_cliente'];
    $id_rest=$_POST['id_rest'];
    $nom_producto=$_POST['nom_producto'];
    $valor_rest=$_POST['valor'];
    $dato->insertarServicio($cod_servicio,$num_doc_cliente,$id_rest,$nom_producto,$valor_rest);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicio</title>
    <link rel="stylesheet" href="../../Diseño/estilos.css">
</head>
<body>
    <form action="" method="POST">
        <h1>Registro Servicios</h1>
        <label for="">Codigo Servicio</label>
        <input type="text" name="cod_servicio" id="" class="casilla">
        <label for="">Numero de Documento</label>
        <input type="text" name="num_doc_cliente" id="" class="casilla"><br>
        <label for="">Id Restaurante</label>
        <input ztype="text" name="id_rest" id="" class="casilla">
        <label for="">Nombre del Producto</label>
        <input type="text" name="nom_producto" class="casilla">
        <label for="">Valor</label>
        <input type="text" name="valor" class="casilla">
        <input type="submit" name="Enviar" class="casilla">
    </form>
</body>
</html>