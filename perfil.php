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
    <title>Mi Perfil</title>
    <link rel="icon" href="./imagenes/logo.png">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap');
    *{
        padding: 0;
        margin: 0;
    }

    body{
        background-color: aliceblue;
        font-family: 'Nonito', sans-serif;
    }
    
    h1{
        padding: 25px;
        margin: 0;
        font-size: 25px;
    }

    .menu{
        margin: 0;
        padding-left: 12px;
        background-color: #fff;
        padding: 25px;
        font: bold;
    }

    .menu ul{ 
        display: flex;
        padding-left: 775px;
        font: bold;
    }

    .menu li{
        padding: 12px;
        list-style: none;
    }

    .menu a{
        text-decoration: none;
        color: #333;
    }

</style>
<body>
<header>
    <a href="../index.php"><img src="../imagenes/logo.png" alt="" class="logo"></a>
    <nav class="menu">
            <ul class="menu-principal">
                <ul class="submenu">
                    <li><a href="">Actualizar perfil</a></li>
                    <li><a href="./clases/opciones.php">Salir</a></li>
                </ul>
            </li>
            </ul>
        </nav>
    </header>
    <h1>Nombres: <?php echo($row['nombres'] ." ".$row['apellidos']);?></h1>
    <h1>Correo Electronico: <?php echo($row['correo_electronico']);?></h1>
    <h1>Telefono: <?php echo($row['telefono']);?></h1>
    <h1>Direccion: <?php echo($row['direccion']);?></h1>
</body>
</html>