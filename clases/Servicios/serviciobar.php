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
            header('location: ../index.php');
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
    <title>Bar</title>
</head>
<body>
    <nav class="menu">
        <a href="../index.html"><img src="../imagenes/logo.png" alt="" class="logo"></a>
        <ul class="menu-principal">
            <li><a href="../Reserva/seleccionar.php">Reserva</a></li>
            <li><a href="../Habitacion/seleccionar.php">Habitaciones</a></li>
            <li><a href="../opciones.php">Volver</a></li>
        <li><a href="servicios.php">Servicios</a></li>
    </ul>
    </nav>
    <div class="contenido">
        <section class="licores">
            <div class="bebida 1">
                <img src="../imagenes/margarita.jpg" alt="">
                <div class="info">
                    <h3>Margarita</h3>
                    <p class="p1">
                        La Margarita es un cóctel clásico que combina tequila, triple sec (licor de naranja) y jugo de limón o lima. Se caracteriza por su refrescante sabor cítrico y su distintivo equilibrio entre la dulzura y la acidez. Este cóctel suele ser servido en un vaso escarchado con sal en el borde, lo que añade un toque adicional de salinidad que complementa perfectamente los sabores.</p>
                    <h4>COP 10.000</h4>
                </div>
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="b1"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name=" NombreProducto" value="Margarita">
                    <input type="hidden" name="ValorProducto" value="10000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div><!-- Campo para la cantidad -->
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>

            <div class="bebida 2">
                <img src="../imagenes/whisky.jpg" alt="">
                <div class="info">
                    <h3>Whisky</h3>
                    <p>El whisky es una bebida alcohólica destilada que se obtiene a partir de la fermentación y destilación de granos malteados, como la cebada, maíz, centeno o trigo. Su nombre proviene del gaélico escocés "uisge beatha" o del irlandés "uisce beathadh", que significan "agua de vida". Este licor tiene una larga historia y es apreciado en todo el mundo por su complejidad de sabores y aromas.</p>
                    <h4>COP 20.000</h4>
                </div>
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="b2"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Whisky">
                    <input type="hidden" name="ValorProducto" value="20000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div> <!-- Campo para la cantidad -->
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>

            <div class="bebida 3">
                <img src="../imagenes/malibu.jpg" alt="">
                <div class="info">
                    <h3>Malibu</h3>
                    <p>Malibu es una marca de licor conocida por su ron con sabor a coco. Es una bebida espirituosa que se ha vuelto popular en cócteles tropicales y otras mezclas refrescantes. Malibu se caracteriza por su sabor dulce y tropical, con un toque distintivo de coco.</p>
                    <h4>COP 15.000</h4>
                </div>
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="b3"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Malibu">
                    <input type="hidden" name="ValorProducto" value="15000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div> <!-- Campo para la cantidad -->
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="bebida 4">
                <img src="../imagenes/vinoblanco.jpg" alt="">
                <div class="info">
                    <h3>Vino Blanco</h3>
                    <p> El vino blanco es un tipo de vino elaborado principalmente a partir de uvas de color verde o amarillo claro. A diferencia del vino tinto, se produce fermentando el mosto sin la piel de las uvas, lo que le confiere su color claro. Hay una amplia variedad de estilos y sabores de vino blanco, ya que diferentes cepas de uva y métodos de vinificación pueden resultar en perfiles de sabor distintos. </p>
                    <h4>COP 8.000</h4>
                </div>
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="b4"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Vino Blanco">
                    <input type="hidden" name="ValorProducto" value="8000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div> <!-- Campo para la cantidad -->
                    <button class="botonres" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="bebida 5">
                <img src="../imagenes/vino.jpg" alt="">
                <div class="info">
                    <h3>Vino de Uva</h3>
                    <p>
                        El término "vino de uva" se refiere simplemente a cualquier vino que se produce a partir de la fermentación del jugo de uva. La uva es la fruta principal utilizada en la producción de vino, y existen muchas variedades de uvas viníferas que se cultivan en todo el mundo para elaborar vinos con una amplia variedad de perfiles de sabor.</p>
                    <h4>COP 8.000</h4>
                </div>
                <form class="formulario" method="POST" action="serviciores.php">
                    <input type="hidden" name="IDCarrito" value="b5"> <!-- Puedes generar un ID único para cada item del carrito -->
                    <input type="hidden" name="NumDoc" value="1234567890"> <!-- Aquí debe ir el número de documento del usuario -->
                    <input type="hidden" name="CodigoServicio" value="101">
                    <input type="hidden" name="NombreProducto" value="Vino de Uva">
                    <input type="hidden" name="ValorProducto" value="8000">
                    <div class="cantidad-container">
    <label for="Cantidad">Cantidad:</label>
    <input type="number" name="Cantidad" value="1" min="1" class="input-cantidad">
</div><!-- Campo para la cantidad -->
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