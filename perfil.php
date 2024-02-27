<?php
require_once("Bd/conexion2.php");
$bd = conectar_db();
session_start();
if (!isset($_SESSION['correo_electronico'])){
    header("Location: ../index.php");
}
$iduser=$_SESSION['correo_electronico'];
$sql="SELECT * FROM usuarios JOIN persona ON usuarios.correo_electronico=persona.correo_electronico WHERE usuarios.correo_electronico='$iduser'";
$resultado=$bd->query($sql);
$row=$resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="icon" href="./imagenes/logo.png">
    <link rel="stylesheet" href="./Diseño/perfil.css">
</head>
<body>
<div class="container">
    <nav class="menu">
        <ul class="menu-principal">
            <ul class="submenu">
                <li><a href="">Actualizar perfil</a></li>
                <li><a href="./clases/opciones.php">Volver</a></li>
            </ul>
        </ul>
    </nav>
    <div class="card">
        <div class="card-header">
            <h2>Perfil del Administrador</h2>
        </div>
        <div class="card-body">
            <div class="profile-info">
                <h3>Nombres: <?php echo($row['nombres'] ." ".$row['apellidos']);?></h3>
                <p>Correo Electronico: <?php echo($row['correo_electronico']);?></p>
                <p>Telefono: <?php echo($row['telefono']);?></p>
                <p>Direccion: <?php echo($row['direccion']);?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>