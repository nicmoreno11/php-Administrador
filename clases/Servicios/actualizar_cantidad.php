<?php
require '../Bd/conexion.php';

if (isset($_GET['id_carrito']) && isset($_GET['nueva_cantidad'])) {
    // Obtén el ID del carrito y la nueva cantidad desde la solicitud GET
    $idCarrito = $_GET['id_carrito'];
    $nuevaCantidad = $_GET['nueva_cantidad'];

    // Conectar a la base de datos
    $bd = conectar_db();

    // Actualizar la cantidad en la base de datos
    $queryActualizarCantidad = "UPDATE carrito_persona SET cantidad = $nuevaCantidad WHERE id_carrito = $idCarrito";
    $resultadoActualizarCantidad = mysqli_query($bd, $queryActualizarCantidad);

    // Manejar el resultado de la actualización
    if ($resultadoActualizarCantidad) {
        // Puedes enviar una respuesta JSON si es necesario
        // echo json_encode(['success' => true]);
        // O simplemente enviar una respuesta
        echo "Cantidad actualizada correctamente";
    } else {
        // Puedes enviar una respuesta JSON si es necesario
        // echo json_encode(['error' => mysqli_error($bd)]);
        // O simplemente enviar una respuesta
        echo "Error al actualizar la cantidad: " . mysqli_error($bd);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($bd);
} else {
    // Manejar el caso en que no se proporcionó el ID del carrito o la nueva cantidad
    echo "Error: No se proporcionó el ID del carrito o la nueva cantidad.";
}
?>


