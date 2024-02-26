<?php
require_once('../class.php');
$dato=new Trabajo();
if(isset($_GET['cod'])){
    $cod=$_GET['cod'];
    $codigo=$dato->eliminarReserva($cod);

    //echo 'La reserva se canceló exitosamente...';
}
?>