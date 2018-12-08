<?php
/**
 * Created by PhpStorm.
 * User: Denisse
 * Date: 01/12/2018
 * Time: 02:27 AM
 */
require_once '../../../scripts/config.php';
$xid = $_POST['id'];
$nombre_disciplina = $_POST['nombre_disciplina'];
$descripcion_disciplinas = $_POST['descripcion_disciplinas'];
$fecha_modificacion = $_POST['fecha_modificacion'];

$query="UPDATE `disciplinas` SET 
                      `nombre_disciplina` = '$nombre_disciplina',
                      `descripcion_disciplinas` = '$descripcion_disciplinas',
                      `fecha_modificacion` = '$fecha_modificacion'
                      WHERE `disciplinas`.`id_disciplina` = $xid;";
$result=mysqli_query($db,$query);

if($result){
    $message = "Los cambios se han guardado.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: indexn.php");
}else{
    $message = "No se pudo guardar los cambios, inténtelo de nuevo.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("refresh:2; url=indexn.php");
}

