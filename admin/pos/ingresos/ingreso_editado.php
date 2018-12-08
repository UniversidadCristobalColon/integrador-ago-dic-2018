<?php

require_once '../../../scripts/config.php';
$xid = $_POST['id'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$user = $_POST['user'];
$cliente = $_POST['cliente'];
$importe = $_POST['importe'];
$fecha = $_POST['fecha'];

$query="UPDATE `ingresos` SET 
                      `descripcion_ingresos` = '$descripcion',
                      `cantidad` = '$cantidad',
                      `importe` = '$importe',
                      `id_cliente` = '$cliente',
                      `id_usuario` = '$user',
                      `fecha_modificacion` = '$fecha'
                      WHERE `ingresos`.`id_ingresos` = $xid;";

$result=mysqli_query($db,$query);

if($result){
    $message = "Los cambios se han guardado.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: index.php");
}else{
    $message = "No se pudo guardar los cambios.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("refresh:2; url=index.php");
}