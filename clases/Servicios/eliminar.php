<?php
require_once('../class.php');
$dato=new Trabajo();
if(isset($_GET['cod'])){
    $cod_serv=$_GET['cod'];
    $codigo=$dato->eliminar_servicio($cod_serv);

    echo 'El usuario se borró exitosamente...';
}
?>