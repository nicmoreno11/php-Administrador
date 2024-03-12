<?php
require_once('../class.php');

$trabajo = new Trabajo();
$pagina_actual=isset($_GET['pagina'])? $_GET['pagina']:1;
$resultados_por_pagina=10;
$inicio=($pagina_actual-1)* $resultados_por_pagina;
$datos = $trabajo->traerDatosHabitacion($inicio,$resultados_por_pagina);
$total=$trabajo->traerTotalHabitacion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../imagenes/logo.png">
    <link rel="stylesheet" href="../../Diseño/estile.css">
    <title>Habitaciones</title>
</head>
<body>
    <div class="contenedor-tabla">
    <table>
        <thead bgcolor="#8CAAF8">
            <tr>
                <th colspan="9">
                    <h2>Listado general de las habitaciones del hotel</h2>
                </th>
                <th><a href="registrar.php"><img src="../../imagenes/habitaciones.png" alt=""></a></th>
            </tr>
        
            <tr>
                <th>Código tipo habitación</th>
                <th>Tipo de habitación</th>
                <th>Capacidad</th>
                <th>Valor base</th>
                <th>Número de habitación</th>
                <th>Estado</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
</thead>
        <tbody>
            
            <?php foreach($datos as $row) { ?>
                <tr>
                    <td><?php echo $row['cod_tipo_hab'];?></td>
                    <td><?php echo $row['nom_tipo_hab'];?></td>
                    <td><?php echo $row['capacidad'];?></td>
                    <td><?php echo $row['valor_base'];?></td>
                    <td><?php echo $row['nro_hab'];?></td>
                    <td><?php echo $row['estado_hab'];?></td>
                    <td><?php echo $row['descripcion_hab'];?></td>
                    <td><img class="imagen_hab" src="imagenes/<?php echo $row['imagen'];?>" alt=""></td>
                    <th>
                        <a href="editar.php?cod=<?php echo $row['cod_tipo_hab'];?>"><img src="../../imagenes/actualizar.png" alt=""></a>
                    </th>
                    <th>
                        <a class="eliminar" id="eliminar" onclick='return confirmacion()' href="eliminar.php?cod=<?php echo $row['cod_tipo_hab'];?>"><img src="../../imagenes/eliminar.png" alt=""></a>
                    </th>
                </tr>
            <?php } ?>
            
        </tbody>
    </table>
    </div>
    <script>
        function confirmacion(){
            var respuesta=confirm('¿Desea borrar el registro?');
            if(respuesta==true){
                return true;
            }
            else{
                return false;
            }
        }
    </script>


    <div style="text-align: center;">
    <a href="../opciones.php" class="linkregreso">Regresar</a>
    <?php
    
    $total_paginas=ceil($total/$resultados_por_pagina);

    if ($pagina_actual > 1) {
        $pagina_anterior=$pagina_actual-1;
        echo "<a href='seleccionar.php?pagina=$pagina_anterior' class='enlace'>Anterior</a>";
    }  

    if ($pagina_actual < $total_paginas) {
        $siguiente_pagina = $pagina_actual + 1;
        echo "<a class='enlaces' href='seleccionar.php?pagina=$siguiente_pagina'>          Siguiente</a> <br>";
    }
    
    if($total_paginas>2){
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo"<a class='enlace' href='seleccionar.php?pagina=".$i."'> ".$i." </a> ";
        }
    }
    ?>
</div>

</body>
</html>
