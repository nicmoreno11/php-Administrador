<?php
require '../../Bd/conexion2.php';

$bd = conectar_db();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idZonaHumeda = $_POST['IDZonaHumeda'];
    $codigoServicio = $_POST['CodigoServicio'];
    $nombreProducto = $_POST['NombreProducto'];
    $valorProducto = $_POST['ValorProducto'];
    $cantidadProducto = $_POST['CantidadProducto'];  // Añade esta línea para obtener la cantidad

    // Validaciones (puedes agregar las validaciones que necesites)
    if (empty($nombreProducto)) {
        $errores[] = 'El nombre del producto es obligatorio.';
    }

    if (empty($valorProducto) || !is_numeric($valorProducto)) {
        $errores[] = 'El valor del producto debe ser un número válido.';
    }

    if (empty($cantidadProducto) || !is_numeric($cantidadProducto) || $cantidadProducto <= 0) {
        $errores[] = 'La cantidad del producto debe ser un número válido mayor a cero.';
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        // Verifica si el servicio ya existe en servicios_adicionales
        $queryExisteServicio = "SELECT * FROM servicios_adicionales WHERE cod_servicio = '$codigoServicio'";
        $resultadoExisteServicio = mysqli_query($bd, $queryExisteServicio);

        if (mysqli_num_rows($resultadoExisteServicio) == 0) {
            // El servicio no existe, insertarlo primero en servicios_adicionales
            $queryInsertarServicio = "INSERT INTO servicios_adicionales (cod_servicio) VALUES ('$codigoServicio')";
            $resultadoInsertarServicio = mysqli_query($bd, $queryInsertarServicio);

            if (!$resultadoInsertarServicio) {
                $errores[] = 'Error al insertar el servicio en servicios_adicionales: ' . mysqli_error($bd);
            }
        }

        // Después de asegurarnos de que el servicio existe, insertarlo en zonas_humedas
        $queryZonasHumedas = "INSERT INTO zonas_humedas (id_zon_hum, cod_servicio, nom_servicio_zh, valor)
                              VALUES ('$idZonaHumeda', '$codigoServicio', '$nombreProducto', $valorProducto)";
        
        $resultadoZonasHumedas = mysqli_query($bd, $queryZonasHumedas);

        if ($resultadoZonasHumedas) {
            // Inserta el producto en carrito_persona
            $queryInsertarCarrito = "INSERT INTO carrito_persona (num_doc, cod_servicio, cantidad, subtotal)
                                     VALUES ('$numDoc', '$codigoServicio', $cantidadProducto, $valorProducto * $cantidadProducto)";
            $resultadoInsertarCarrito = mysqli_query($bd, $queryInsertarCarrito);

            if (!$resultadoInsertarCarrito) {
                $errores[] = 'Error al insertar en la tabla carrito_persona: ' . mysqli_error($bd);
            }

            // Redirecciona después de la inserción exitosa
            header('location: ../serviciozona.php');
        } else {
            $errores[] = 'Error al insertar en la tabla zonas_humedas: ' . mysqli_error($bd);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha256-xxxxxx" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../Diseño/servicios.css">
    <link rel="icon" href="../imagenes/logo.png">
    <title>Zonas Humedas</title>
</head>
<body>
    <nav class="menu">
        <a href="../index.php"><img src="../imagenes/logo.png" alt="" class="logo"></a>
        <ul class="menu-principal">
            <li><a href="../Reserva/seleccionar.php">Reserva</a></li>
            <li><a href="../Habitacion/seleccionar.php">Habitaciones</a></li>
            <li><a href="../opciones.php">Volver</a></li>
            <li><a href="servicios.php">Servicios</a></li>
        </ul>
    </nav>
    <div class="contenido">
        <section class="zonas">
            <div class="humeda 1">
                <img src="../imagenes/spaser.jpg" alt="">
                <div class="info">
                    <h3>Spa</h3>
                    <p>
                        Un spa es un refugio de tranquilidad y rejuvenecimiento que busca proporcionar a sus visitantes una experiencia holística para el cuidado del cuerpo y la mente. Sus instalaciones suelen contar con ambientes serenos y acogedores, con una atención centrada en el cliente.</p>
                    <h4>COP 50.000</h4>
                </div>
                <form class="formulario" method="POST" action="serviciozona.php">
                    <input type="hidden" name="IDZonaHumeda" value="z1"> 
                    <input type="hidden" name="CodigoServicio" value="100">
                    <input type="hidden" name="NombreProducto" value="Spa">
                    <input type="hidden" name="ValorProducto" value="50000">
                    <button class="botonzona" type="submit">Añadir el producto</button>
                </form>
            </div>

            <div class="humeda 2">
                <img src="../imagenes/piscinaser.jpg" alt="">
                <div class="info">
                    <h3>Piscina</h3>
                    <p>Una piscina es un oasis acuático que puede encontrarse tanto en espacios privados, como en patios traseros, como en instalaciones públicas, como clubes, hoteles o complejos recreativos. Su diseño puede variar, pero generalmente consta de un área revestida con material impermeable, como azulejos o láminas de vinilo, que retiene el agua.</p>
                    <h4>COP 20.000</h4>
                </div>
                <form class="formulario" method="POST" action="serviciozona.php">
                    <input type="hidden" name="IDZonaHumeda" value="z2"> 
                    <input type="hidden" name="CodigoServicio" value="100">
                    <input type="hidden" name="NombreProducto" value="Piscina">
                    <input type="hidden" name="ValorProducto" value="50000">
                    <button class="botonzona" type="submit">Añadir el producto</button>
                    </form>
            </div>
            <div class="botones-acciones">
                <a href="vercarrito.php" class="boton-ver-carrito">Ver Carrito</a>
            </div>
        </section>
    </div>
</body>
</html>  

