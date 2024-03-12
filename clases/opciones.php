<?php /*
require '../Bd/conexion2.php';
$bd=conectar_db();
session_start();
if(!isset($_SESSION['cod_usuario'])){
    header("Location: ../index.php");
}
else{
    if($_SESSION['cod_usuario']!=2){
        header("Location../index.php");
    }
}
$id=$_SESSION['cod_usuario'];
$sql="SELECT * FROM persona WHERE cod_usuario='$id'";
$resultado=mysqli_query($bd,$sql);
$row=mysqli_fetch_assoc($resultado);
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="icon" href="../imagenes/logo.png">
    <link rel="stylesheet" href="../Diseño/Admin.css">
</head>
<body>
    <header>
    <a href="#"><img src="../imagenes/logo.png" alt="" class="logo"></a>
        <nav class="menu"> 
            <ul class="menu-principal">
                <li><a href="Usuario/seleccionar.php">Usuarios</a></li>
                <li><a href="Habitacion/seleccionar.php">Habitaciones</a></li>
                <li><a href="Reserva/seleccionar.php">Reservas</a></li>
                <li><a href="Servicios/seleccionar.php">Servicios</a></li>
                <li><a href="../perfil.php">Mi Perfil</a>
                <ul class="submenu">
                    <li><a href="../index.php">Salir</a></li>
                </ul>
            </ul>
        </nav>
    </header>
    <div class="contenido">
        <p>Bienvenido <?php /*echo $row['nombres'] ." ".$row['apellidos']*/?></p> <!--- Se le da  una bienvenida a la persona que ingrese a la interfaz del administrador --->
        <p>Registra nuevos usuarios, habitaciones y reservas en el sistema y también gestionar los servicios del hotel y la facturación.</p><a href="https://www.sena.edu.co/es-co/sena/Paginas/quienesSomos.aspx">Nuestra pagina web</a> <!--- Actualizar para que redireccione a la pagian web del hotel--->
    </div>
    <div class="container">
        <div class="card">
            <img src="../imagenes/usuarios.png" alt="">
            <h4>Usuarios</h4>
            <p>Aquí podrás gestionar a todos los usuarios del sistema, empleados, clientes etc.</p>
            <a href="./Usuario/registrar.php"><input type="button" value="Registrar"></a>
        </div>
       
        <div class="card">
            <img src="../imagenes/calendario.png" alt="">
            <h4>Reservas</h4>
            <p>Aquí registras las reservas del hotel y puedes actualizarlas y eliminarlas</p>
            <a href="./Reserva/registrar.php"><input type="button" value="Registrar"></a>
        </div>

        <div class="card">
            <img src="../imagenes/habitaciones.png" alt="">
            <h4>Habitaciones</h4>
            <p>Podrás registrar habitaciones nuevas, actualizarlas según su estado y también su descripción.</p>
            <a href="./Habitacion/registrar.php"><input type="button" value="Registrar"></a>
        </div>
        <div class="card">
            <img src="../imagenes/restaurante.png" alt="">
            <h4>Servicios</h4>
            <p>Registrar y Consultar los servicios que van a estar disponibles dentro del hotel</p>
            <a href="./Servicios/registrar_serv.php"><input type="button" value="Registrar"></a>
        </div>
        <!--- Se adiciono servicios a la interfaz del administrador para que pueda ver los servicios disponibles que hay en el hotel -->

        <div class="card">
            <img src="../imagenes/factura.png" alt="">
            <h4>Facturas</h4>
            <p>Aquí estarán los detalles de cada factura con su respectiva política de privacidad de datos.</p>
            <a href=""><input type="button" value="Ver"></a>
        </div>
    </div>
</body>
</html>