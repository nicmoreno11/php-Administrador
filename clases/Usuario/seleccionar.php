<?php
require_once('../class.php');

$trabajo = new Trabajo();
$pagina_actual=isset($_GET['pagina'])? $_GET['pagina']:1;
$resultados_por_pagina=10;
$inicio=($pagina_actual-1)* $resultados_por_pagina;
$datos = $trabajo->traerDatos($inicio,$resultados_por_pagina);
$total=$trabajo->traerTotal();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imagenes/corazon.png">
    <link rel="stylesheet" href="../../Diseño/estile.css">
    <title>Usuarios</title>
</head>
<body>
    <div class="contenedor-tabla">
    <table>
        <thead bgcolor="#8CAAF8">
            <tr>
                <th colspan="9">
                    <h2>Usuarios del sistema</h2>
                </th>
                <th><a href="registrar.php"><img src="../../imagenes/adicionar.png" alt=""></a></th>
            </tr>
        
            <tr>
                <th>Documento</th>
                <th>Tipo documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Código usuario</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
</thead>
        <tbody>
            
            <?php foreach($datos as $row) { ?>
                <tr>
                    <td><?php echo $row['num_doc'];?></td>
                    <td><?php echo $row['tipo_doc'];?></td>
                    <td><?php echo $row['nombres'];?></td>
                    <td><?php echo $row['apellidos'];?></td>
                    <td><?php echo $row['correo_electronico'];?></td>
                    <td><?php echo $row['telefono'];?></td>
                    <td><?php echo $row['direccion'];?></td>
                    <td><?php echo $row['cod_usuario'];?></td>
                    <td><?php echo $row['foto'];?></td>
                    <th>
                        <a href="editar.php?cod=<?php echo $row['correo_electronico'];?>"><img src="../../imagenes/actualizar.png" alt=""></a>
                    </th>
                    <th>
                        <a href="eliminar.php?cod=<?php echo $row['correo_electronico'];?>" onclick='return confirmacion()'><img src="../../imagenes/eliminar.png" alt=""></a>
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
        echo "<a href='index.php?pagina=$pagina_anterior' class='enlace'>Anterior</a>";
    }  

    if ($pagina_actual < $total_paginas) {
        $siguiente_pagina = $pagina_actual + 1;
        echo "<a class='enlaces' href='index.php?pagina=$siguiente_pagina'>          Siguiente</a> <br>";
    }
    
    if($total_paginas>2){
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo"<a class='enlace' href='index.php?pagina=".$i."'> ".$i." </a> ";
        }
    }
    ?>
</div>

</body>
</html>
