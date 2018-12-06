<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 19/11/2018
 * Time: 04:12 PM
 */

require_once '../../../scripts/config.php';
$xid = $_POST['id'];
$descripcion = $_POST['descripcion'];
$user = $_POST['user'];
$importe = $_POST['importe'];
$fecha = $_POST['fecha'];

$query="UPDATE `egresos` SET 
                      `descripcion_egresos` = '$descripcion',
                      `id_usuario` = '$user',
                      `importe` = '$importe',
                      `fecha_modificacion` = '$fecha'
                      WHERE `egresos`.`id_egresos` = $xid;";

$result=mysqli_query($db,$query);

if($result){
    $message = "Los cambios se han guardado.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: index.php");
}else{
    $message = "No se pudo guardar los cambios, inténtelo de nuevo.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("refresh:2; url=index.php");
}