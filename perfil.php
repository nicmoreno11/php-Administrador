<?php
require_once("Bd/conexion2.php");
$bd = conectar_db();
session_start();
if (!isset($_SESSION['correo_electronico'])){
    header("Location:../index.php");
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
    <link rel="stylesheet" href="../diseño/estilosverusuario.css">
    <title>Cuenta</title>
</head>
<body>
<header>
    <a href="../index.php"><img src="../imagenes/logo.png" alt="" class="logo"></a>
    <nav class="menu">
            <ul class="menu-principal">
                <li><a href="./clases/opciones.php">Mi perfil</a>
                <ul class="submenu">
                    <li><a href="">Actualizar perfil</a></li>
                    <li><a href="./clases/opciones.php">Salir</a></li>
                </ul>
            </li>
            </ul>
        </nav>
    </header>
    <h1><?php echo($row['nombres'] ." ".$row['apellidos']);?></h1>
    <h1><?php echo($row['correo_electronico']);?></h1>
    <h1><?php echo($row['telefono']);?></h1>
    <h1><?php echo($row['direccion']);?></h1>
</body>
</html>