<?php
require '../Bd/conexion.php';

// Conectar a la base de datos
$bd = conectar_db();

// Realizar la consulta para obtener los elementos del carrito
$queryVerCarrito = "SELECT * FROM carrito_persona";
$resultadoVerCarrito = mysqli_query($bd, $queryVerCarrito);

// Verificar si hay resultados
if ($resultadoVerCarrito) {
    $filasCarrito = mysqli_fetch_all($resultadoVerCarrito, MYSQLI_ASSOC);
} else {
    // Manejar el error si la consulta falla
    $errorConsulta = mysqli_error($bd);
    echo "Error al obtener los datos del carrito: $errorConsulta";
    // Puedes redirigir o mostrar un mensaje de error según tus necesidades
}

// Cerrar la conexión a la base de datos
mysqli_close($bd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../diseño/estilocar.css">
    <link rel="icon" href="../imagenes/playa.png">
    <title>Carrito</title>
</head>
<body>

    <h1 class="titulo-carrito">Contenido del Carrito</h1>
    
    <?php if (isset($filasCarrito) && !empty($filasCarrito)) : ?>
        <!-- Mostrar la tabla solo si hay elementos en el carrito -->
        <table class="tabla-carrito">
            <thead>
                <tr>
                    <th>ID Carrito</th>
                    <th>Número de Documento</th>
                    <th>Código de Servicio</th>
                    <th>Nombre del Producto</th>
                    <th>Valor del Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filasCarrito as $fila) : ?>
                    <tr>
                        <td><?= $fila['id_carrito'] ?></td>
                        <td><?= $fila['num_doc'] ?></td>
                        <td><?= $fila['cod_servicio'] ?></td>
                        <td><?= $fila['nombre_producto'] ?></td>
                        <td id="valorProducto<?= $fila['id_carrito'] ?>"><?= $fila['valor_producto'] ?></td>
                        <td>
                            <!-- Mostrar la cantidad actual y agregar un botón para actualizar -->
                            <span id="cantidad<?= $fila['id_carrito'] ?>"><?= $fila['cantidad'] ?></span>
                            <button class="actualizar-cantidad-btn" onclick="mostrarFormularioActualizar(<?= $fila['id_carrito'] ?>)">
                                <i class="fas fa-edit"></i> Actualizar Cantidad
                            </button>
                        </td>
                        <td id="subtotal<?= $fila['id_carrito'] ?>"><?= $fila['subtotal'] ?></td>
                        <td>
                            <button class="eliminar-btn" onclick="eliminarProducto(<?= $fila['id_carrito'] ?>)">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                            <button class="actualizar-btn" onclick="actualizarProducto(<?= $fila['id_carrito'] ?>)">
                                <i class="fas fa-edit"></i> Actualizar
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Formulario oculto para actualizar la cantidad -->
        <div id="formularioActualizar" style="display: none;">
            <form id="formActualizarCantidad" onsubmit="return actualizarCantidad();">
                <label for="nuevaCantidad">Nueva Cantidad:</label>
                <input type="number" id="nuevaCantidad" name="nuevaCantidad" min="1" required>
                <button type="submit">Actualizar</button>
            </form>
        </div>
    <?php else : ?>
        <!-- Mensaje si no hay elementos en el carrito -->
        <p class="mensaje-carrito">No hay elementos en el carrito.</p>
    <?php endif; ?>

    <script>
        function eliminarProducto(idCarrito) {
            // Confirmar con el usuario antes de eliminar
            if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
                // Llamada AJAX para eliminar el producto en el servidor
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // La respuesta del servidor puede contener información adicional si es necesario
                        alert(this.responseText);
                        // Actualizar la página o realizar cualquier otra acción necesaria
                        location.reload();
                    }
                };
                xhttp.open("GET", "eliminar_producto.php?id_carrito=" + idCarrito, true);
                xhttp.send();
            }
        }

        function mostrarFormularioActualizar(idCarrito) {
            // Mostrar el formulario de actualización
            document.getElementById("formularioActualizar").style.display = "block";
            // Prellenar el campo de nueva cantidad con la cantidad actual del producto
            document.getElementById("nuevaCantidad").value = document.getElementById("cantidad" + idCarrito).innerText;
            // Asignar el ID del carrito al formulario
            document.getElementById("formActualizarCantidad").setAttribute("data-idcarrito", idCarrito);
        }

        function actualizarCantidad() {
            // Obtener el ID del carrito del formulario
            var idCarrito = document.getElementById("formActualizarCantidad").getAttribute("data-idcarrito");
            // Obtener la nueva cantidad ingresada por el usuario
            var nuevaCantidad = document.getElementById("nuevaCantidad").value;

            // Validar que la nueva cantidad sea un número positivo
            if (nuevaCantidad > 0) {
                // Calcular el nuevo subtotal
                var valorProducto = parseFloat(document.getElementById("valorProducto" + idCarrito).innerText);
                var nuevoSubtotal = (parseFloat(nuevaCantidad) * valorProducto).toFixed(2);

                // Actualizar el subtotal en la interfaz
                document.getElementById("subtotal" + idCarrito).innerText = nuevoSubtotal;

                // Llamada AJAX para actualizar la cantidad y el subtotal en el servidor
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // La respuesta del servidor puede contener información adicional si es necesario
                        alert(this.responseText);
                        // Ocultar el formulario después de la actualización
                        document.getElementById("formularioActualizar").style.display = "none";
                        // Actualizar la página o realizar cualquier otra acción necesaria
                        location.reload();
                    }
                };

                // Cambia la URL y agrega el parámetro para el nuevo subtotal
                xhttp.open("GET", "actualizar_cantidad.php?id_carrito=" + idCarrito + "&nueva_cantidad=" + nuevaCantidad + "&nuevo_subtotal=" + nuevoSubtotal, true);
                xhttp.send();
            } else {
                // Mostrar un mensaje de error si la nueva cantidad no es válida
                alert("Por favor, ingresa una cantidad válida.");
            }

            // Evitar que el formulario se envíe y recargue la página
            return false;
        }
    </script>
</body>
</html>






