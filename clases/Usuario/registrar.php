<?php
require_once('../class.php');
$dato=new Trabajo();
$tipos=$dato->traerTipos();
if (isset($_POST['Enviar'])){
    $correo=$_POST['correo'];
    $contraseña=$_POST['contraseña'];
    $imagen=$_POST['imagen'];
    $num_doc=$_POST['num_doc'];
    $tipo_doc=$_POST['tipo_doc'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $tipo_usuario=$_POST['tipo_usuario'];
    $valor=$dato->insertarUsuario($correo, $contraseña, $imagen, $num_doc, $tipo_doc, $nombres, $apellidos, $telefono, $direccion, $tipo_usuario);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Diseño/estilos.css">
    <title>Usuario</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Registro usuario</h1>
        <label for="">Correo electrónico</label>
        <input type="text" name="correo" id="" class="casilla">
        <label for="">Contraseña</label>
        <input type="password" name="contraseña" id="" class="casilla">
        <label for="">Tipo de usuario</label>
        <select name="tipo_usuario" id="">
        <?php
                $sel="selected";
                for($i=0;$i<sizeof($tipos);$i++)
                {
                    $t1=$tipos[$i]["cod_usuario"];
                    $t2=$tipos[$i]["nom_tipo_usuario"];

                    if ($t1==$d7)
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
        <input type="text" name="num_doc" id="" class="casilla">
        <label for="">Tipo de documento</label>
        <select name="tipo_doc" id="">
            <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
            <option value="Cédula de extranjería">Cédula de extranjería</option>
            <option value="Pasaporte">Pasaporte</option>
        </select>
        <label for="">Nombres</label>
        <input type="text" name="nombres" id="" class="casilla">
        <label for="">Apellidos</label>
        <input type="text" name="apellidos" id="" class="casilla">
        <label for="">Teléfono</label>
        <input type="tel" name="telefono" id="" class="casilla">
        <label for="">Dirección</label>
        <input type="text" name="direccion" id="" class="casilla">
        <input type="submit" value="Enviar" name="Enviar" class="casilla">
        <label class="casilla" for="">Foto</label>
        <input type="file" value="Insertar Imagen" name="imagen" class="casilla">
    </form>
</body>
</html>