<?php
require '../Bd/conexion.php';

if (isset($_GET['id_carrito'])) {
    // Obtén el ID del carrito desde la solicitud GET
    $idCarrito = $_GET['id_carrito'];

    // Conectar a la base de datos
    $bd = conectar_db();

    // Realizar la eliminación en la base de datos
    $queryEliminar = "DELETE FROM carrito_persona WHERE id_carrito = $idCarrito";
    $resultadoEliminar = mysqli_query($bd, $queryEliminar);

    // Manejar el resultado de la eliminación
    if ($resultadoEliminar) {
        // Puedes enviar una respuesta JSON si es necesario
        // echo json_encode(['success' => true]);
        // O simplemente enviar una respuesta
        echo "Producto eliminado correctamente";
    } else {
        // Puedes enviar una respuesta JSON si es necesario
        // echo json_encode(['error' => mysqli_error($bd)]);
        // O simplemente enviar una respuesta
        echo "Error al eliminar el producto: " . mysqli_error($bd);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($bd);
} else {
    // Manejar el caso en que no se proporcionó el ID del carrito
    echo "Error: No se proporcionó el ID del carrito.";
}
?>
