<?php
require_once("../class.php");
$dato=new Trabajo();

if(isset($_POST['Enviar'])){
    $codigo=$_POST['codigo'];
    $numero=$_POST['numero'];
    $tipoHabitacion=$_POST['tipo'];
    $capacidad=$_POST['capacidad'];
    $precio=$_POST['precio'];
    $estado=$_POST['estado'];
    $descripcion=$_POST['descripcion'];
    $imagen=$_FILES['imagen']['name'];
    if(isset($imagen) && $imagen!=""){
        $tipo=$_FILES['imagen']['type'];
        $temp=$_FILES['imagen']['tmp_name'];
        $valor=$dato->insertarHabitacion($codigo, $numero, $tipoHabitacion, $capacidad, $precio, $estado, $descripcion, $imagen,$temp);
    }
}
else{
    
}

?>
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
    <form method="POST" class="form_hab" enctype="multipart/form-data">
    <div class="contenedor">
        <h1>Registro de habitación</h1>
        <label for="">Código tipo de habitación</label>
        <input class="casilla" type="number" name="codigo" id="">
        <label for="">Número de habitación</label>
        <input class="casilla" type="number" name="numero" id="">
        <label for="">Tipo de habitación</label>
        <select class="casilla" name="tipo" id="">
            <option value="Sencilla">Sencilla</option>
            <option value="Doble">Doble</option>
            <option value="Twin">Twin</option>
            <option value="Triple">Triple</option>
            <option value="Familiar">Familiar</option>
        </select>
        <label for="">Capacidad</label>
        <input class="casilla" type="number" name="capacidad" id="">
        <label for="">Precio</label>
        <input class="casilla" type="text" name="precio" id="">
        <label for="">Estado</label>
        <select class="casilla" name="estado" id="">
            <option value="Disponible">Disponible</option>
            <option value="Ocupada">Ocupada</option>
            <option value="Mantenimiento">Mantenimiento</option>
        </select>
        <label for="">Descripción</label>
        <textarea class="casilla" name="descripcion" id="" cols="10" rows="0"></textarea>
        <label for="">Imagen</label>
        <input type="file" name="imagen" class="img">
        <input class="casilla" type="submit" value="Enviar" name="Enviar">
        </div>
    </form>

</body>
</html>