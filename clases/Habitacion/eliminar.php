<?php
require_once('../class.php');
$dato=new Trabajo();
if(isset($_GET['cod'])){
    $cod=$_GET['cod'];
    $codigo=$dato->eliminarHabitacion($cod);

    //echo 'El usuario se borró exitosamente...';
}
?>