<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="icon" href="../imagenes/logo.png">
    <link rel="stylesheet" href="../Diseño/Admin.css">
</head>
<!-- Pagina vista del Administrador falta añadir Servicios y Factura aunque las tarjetas ya están-->
<body>
    <header>
    <a href="../index.php"><img src="../imagenes/logo.png" alt="" class="logo"></a>
        <nav class="menu"> 
            <ul class="menu-principal">
                <li><a href="Usuario/seleccionar.php">Usuarios</a></li>
                <li><a href="Habitacion/seleccionar.php">Habitaciones</a> </li>
                <li><a href="Reserva/seleccionar.php">Reservar</a></li>
                <li><a href="../perfil.php">Mi Perfil</a></li> <!--- Actualizar diseño del perfil de Administrador y tambien que pueda actualizar su perfil desde el perfil--->
                <li><a href="../index.php">Cerrar Sesión</a></li> <!--- Salir a la pagina web del hotel no a al inicio de sesion--->
            </ul>
        </nav>
    </header>
    <div class="contenido">
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
            <p>Observa los servicios que están disponibles, ya sean, restaurante, bar y entre otros.</p>
            <a href=""><input type="button" value="Registrar"></a>
        </div>

        <div class="card">
            <img src="../imagenes/factura.png" alt="">
            <h4>Facturas</h4>
            <p>Aquí estarán los detalles de cada factura con su respectiva política de privacidad de datos.</p>
            <a href=""><input type="button" value="Registrar"></a>
        </div>

    </div>
    <footer class="piepag">
         <section class="informacion">
            <h3>Ubicación</h3>
            <p>Soacha Cundinamarca
            <p>Calle 30</p></section>
        
        <section class="informacion2">
            <h3>Contacto</h3>
            <a href=""><p>32569785211</p></a>
            <a href="https://www.google.com/intl/es-419/gmail/about/"><p>administrador@sena.edu.co</p></a> <!--- Falta redireccionar al correo del Admin pero eso ya es opcional-->
        </section>
        
        <section class="iconos">
            <h3>Nuestras redes</h3>
            <a href="https://web.facebook.com/sena.soacha/?locale=es_LA&_rdc=1&_rdr"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fsenasoachacide"><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
        </section>
        <div class="terminos">
            <p>Terms & Conditions / Privacy & Cookie Statement</p>
            <p>© 2024 
            All Rights Reserved | Hotel Aurora Oasis | Powered by Cloudbeds</p>
        </div>
        </footer> 
</body>
</html