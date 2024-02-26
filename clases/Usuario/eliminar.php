<?php
require_once('../class.php');
$dato=new Trabajo();
if(isset($_GET['cod'])){
    $email=$_GET['cod'];
    $codigo=$dato->eliminarUsuario($email);

    echo 'El usuario se borró exitosamente...';
}
?>