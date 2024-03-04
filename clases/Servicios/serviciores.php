<?php
require '../../Bd/conexion2.php';

$bd = conectar_db();
$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCarrito = $_POST['IDCarrito'];
    $numDoc = $_POST['NumDoc'];
    $codigoServicio = $_POST['CodigoServicio'];
    $nombreProducto = $_POST['NombreProducto'];
    $valorProducto = $_POST['ValorProducto'];

    // Validaciones (puedes agregar las validaciones que necesites)
    if (empty($nombreProducto)) {
        $errores[] = 'El nombre del producto es obligatorio.';
    }

    if (empty($valorProducto) || !is_numeric($valorProducto)) {
        $errores[] = 'El valor del producto debe ser un número válido.';
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        // Calcula el subtotal
        $cantidad = $_POST['Cantidad']; // Asegúrate de tener un campo en tu formulario llamado Cantidad
        $subtotal = $valorProducto * $cantidad;

        // Realiza la inserción en la tabla 'carrito_persona'
        $queryCarrito = "INSERT INTO carrito_persona (id_carrito, num_doc, cod_servicio, nombre_producto, valor_producto, cantidad, subtotal)
                         VALUES ('$idCarrito', '$numDoc', '$codigoServicio', '$nombreProducto', $valorProducto, $cantidad, $subtotal)";
        
        $resultadoCarrito = mysqli_query($bd, $queryCarrito);

        if ($resultadoCarrito) {
            // Redirecciona después de la inserción exitosa
            header('location: ../index.html');
        } else {
            $errores[] = 'Error al insertar en la tabla carrito_persona: ' . mysqli_error($bd);
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
    <title>Restaurante</title>
</head>
<body>
    <nav class="menu">
        <a href="../index.php"><img src="../imagenes/logo.png" alt="" class="logo"></a>
        <ul class="menu-principal">
            <li><a href="../Reserva/seleccionar.php">Reserva</a></li>
            <li><a href="../Habitacion/seleccionar.php">Habitaciones</a></li>
            <li><a href="servicios.php">Servicios</a></li>
            <li><a href="../opciones.php">Volver</a></li>
        </ul>
    </nav>
    <div class="contenido">
        <section class="menur">
            <div class="alimento 1">
                <img src="../imagenes/bandeja.jpg" alt="">
                <div class="info">
                    <h3>Bandeja Paisa</h3>
                    <p class="p1">La Bandeja Paisa es un plato colombiano emblemático, especialmente asociado con la región de Antioquia. Es conocida por ser una comida abundante que combina una variedad de ingredientes. Incluye carne (molida o asada), arroz, frijoles, huevo frito, aguacate, plátano maduro frito, morcilla, arepas y hogao. Este plato representa la riqueza culinaria de Colombia y es apreciado por su mezcla de sabores y texturas. Es una opción popular para aquellos que buscan una experiencia gastronómica completa y satisfactoria.</p>
                    <h4>COP 40.000</h4>
                </div><!-- ... (código del primer alimento) ... -->
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="1"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Bandeja Paisa">
                    <input type="hidden" name="ValorProducto" value="40000">
                    <div class="cantidad-container">
                <label for="Cantidad">Cantidad:</label>
                <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
            </div> <!-- Campo para la cantidad -->
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="alimento 2">
                <img src="../imagenes/arroz.jpg" alt="">
                <div class="info">
                    <h3>Arroz chino</h3>
                    <p>El arroz chino es un platillo de la cocina asiática que consiste en arroz frito en un wok con ingredientes como verduras, carne y huevo. Es conocido por su versatilidad y delicioso sabor, siendo popular en todo el mundo.</p>
                    <h4>COP 40.000</h4>
                </div><!-- ... (código del primer alimento) ... -->
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="2"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Arroz chino">
                    <input type="hidden" name="ValorProducto" value="40000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div> <!-- Campo para la cantidad -->
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="alimento 3">
                <img src="../imagenes/ajiaco.jpg" alt="">
                <div class="info">
                    <h3>Sopa de Ajiaco</h3>
                    <p>La sopa de ajiaco es un plato tradicional de la cocina colombiana. Se caracteriza por ser espesa y abundante, con ingredientes clave como papas, mazorcas de maíz, guascas (hierba aromática), pollo, y varios tipos de papas. Se le añade alcaparras y crema de leche al momento de servir, proporcionando un sabor único y reconfortante. La sopa de ajiaco es especialmente apreciada por su riqueza y la combinación de sabores que reflejan la diversidad culinaria de Colombia.</p>
                    <h4>COP 15.000</h4>
                </div><!-- ... (código del primer alimento) ... -->
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="3"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Sopa de Ajiaco">
                    <input type="hidden" name="ValorProducto" value="15000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div> <!-- Campo para la cantidad -->
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="alimento 4">
                <img src="../imagenes/sancocho.jpg" alt="">
                <div class="info">
                    <h3>Sancocho de Gallina</h3>
                    <p> El sancocho de gallina es un plato tradicional latinoamericano, presente en diversas variantes en diferentes países. Se prepara con gallina, y a veces pollo, cocidos lentamente con una variedad de vegetales como yuca, plátano, mazorcas de maíz, papa, entre otros. El caldo resultante es abundante y muy sabroso, impregnado con los sabores de los ingredientes. Es un plato reconocido por su carácter reconfortante y su presencia en celebraciones familiares y eventos especiales.</p>
                    <h4>COP 15.000</h4>
                </div>
                <!-- ... (código del primer alimento) ... -->
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="4"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Sancocho de Gallina">
                    <input type="hidden" name="ValorProducto" value="40000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div> <!-- Campo para la cantidad -->
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="alimento 5">
                <img src="../imagenes/pollo.jpg" alt="">
                <div class="info">
                    <h3>Pollo Asado</h3>
                    <p>El pollo asado es un plato popular que se prepara asando pollo sazonado al horno, a la parrilla o a la brasa. Antes de la cocción, el pollo se adoba con especias, hierbas, aceite de oliva u otros condimentos para realzar su sabor. El resultado es una piel crujiente por fuera y una carne jugosa por dentro. El pollo asado es versátil y se sirve comúnmente como plato principal en comidas familiares o eventos. Puede acompañarse de diversas guarniciones, como patatas asadas, vegetales al vapor o ensaladas, según las preferencias culinarias.</p>
                    <h4>COP 30.000</h4>
                </div><!-- ... (código del primer alimento) ... -->
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="5"> 
                    <input type="hidden" name="NumDoc" value="1234567890"> 
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Pollo Asado">
                    <input type="hidden" name="ValorProducto" value="30000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div>
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="botones-acciones">
        <a href="vercarrito.php" class="boton-ver-carrito">Ver Carrito</a>
            </div>
        </section>
    </div>
</body>
</html>

