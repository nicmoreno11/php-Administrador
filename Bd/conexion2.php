<?php
function conectar_db(){
    $db=mysqli_connect('localhost', 'root' , '', 'base_proyecto');
    if (!$db){
        echo 'No se pudo conectar a la base de datos.';
        exit;
    }
    else{
        return $db;
    }
}
?>