<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Diseño/servicios.css">
    <link rel="icon" href="../imagenes/logo.png">
    <title>Servicios</title>
</head>
<body>
    <?php
    session_start();
    ?>
    <header>
    <a href="../opciones.php"><img src="../../imagenes/logo.png" alt="" class="logo"></a> 
        <nav class="menu">
            <ul class="menu-principal">
                <li><a href="../Reserva/reserva.php">Reserva</a></li>
                <li><a href="">Habitaciones</a></li>
            <?php if(isset($_SESSION['correo_electronico'])):?>
                <ul class="submenu">
                    <li><a href="Usuarios/salir.php" onclick='return confirmacion()'>Salir</a></li>
                </ul>
                </li>
                <script>
                    function confirmacion(){
                        var respuesta=confirm('¿Seguro desea salir?');
                        if(respuesta==true){
                            return ture;
                        }
                        else{
                            return false;
                        }
                    }
                </script>
            <?php else :?>
                <ul class="submenu">
                    <li><a href="../Usuarios/iniciarsesion.php">Iniciar sesión</a></li>
                    <li><a href="../Usuarios/crear.php">Registrarse</a></li>
                </ul>
            </li>
            <?php endif;?>
            <li><a href="../Servicios/servicios.html">Servicios</a>
            <li><a href="../opciones.php">Volver</a></li>
            <ul class="submenu">
                <li><a href="">Piscina</a></li>
                <li><a href="">Restaurante</a></li>
                <li><a href="">Gimnasio</a></li>
                <li><a href="">Bar</a></li>
                <li><a href="">Zonas húmedas</a></li>
                </ul>
            </li>
            <?php if(isset($_SESSION['cod_usuario']) && $_SESSION['cod_usuario'] ==2): ?>
                    <li><a href="pagina_admin.php">Administrar</a></li>
                <?php endif; ?>
        </ul>
        </nav>

    </header>
    <div class="contenido">
        <section class="servicios">
            <div class="servicio 1">
                <img src="../../imagenes/restaurante-1.jpg" alt="">
                <div class="info">
                    <h3>Restaurante</h3>
                    <p class="p1">¡Bienvenido al restaurante Gloria en Oasis! Sumérgete en una experiencia gastronómica donde la elegancia se encuentra con los sabores exquisitos. Nuestro espacio ofrece una variedad de platos cuidadosamente elaborados, opciones locales auténticas creaciones culinarias internacionales. Con un servicio atento y un ambiente acogedor, es el lugar perfecto para disfrutar de momentos culinarios inolvidables. ¡Te invitamos a explorar una deliciosa combinación de cocina de alta calidad y hospitalidad excepcional!</p>
                </div>
                <button class="botons"><a href="../Servicios/serviciores.php">Ver Menú Restaurante</a></button>
            </div>

            <div class="servicio 2">
                <img src="../../imagenes/bar.jpeg" alt="">
                <div class="info">
                    <h3>Bar</h3>
                    <p>¡Bienvenido al Bar Gloria en Oasis! Disfruta de un ambiente animado, cócteles innovadores y la mejor compañía. Desde cócteles creativos hasta cervezas artesanales, nuestro bar es el lugar perfecto para relajarte y disfrutar de momentos inolvidables. ¡Te esperamos para una experiencia única en el Bar Gloria</p>
                </div>
                <button class="botons"><a href="../Servicios/serviciobar.php">Ver Tipos de Bebidas</a></button>
            </div>

            <div class="servicio 3">
                <img src="../../imagenes/piscina.jpg" alt="">
                <div class="info">
                    <h3>Zonas Húmedas</h3>
                    <p>¡Te damos la bienvenida al Spa en Oasis! Sumérgete en un oasis de serenidad con nuestra piscina rejuvenecedora. Además, disfruta de experiencias de sauna, baño turco y jacuzzi para relajar cuerpo y mente. Nuestro Spa ofrece momentos de bienestar en un entorno tranquilo y elegante. ¡Descubre el lujo del descanso en Oasis</p>
                </div>
                <button class="botons"><a href="../Servicios/serviciozona.php">Ver Zonas Humedas</a></button>
            </div>
        </section>
    </div>
</body>
</html>
