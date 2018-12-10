<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 07/11/2018
 * Time: 08:35 AM
 */

require_once '../../../scripts/config.php';
$xid = $_POST['id'];
$titulo = $_POST["titulo"];
$disciplina = $_POST["disciplina"];
$contenido = $_POST["contenido"];
$user = $_POST["user"];

$query="UPDATE `rutinas` SET 
                      `nombre_rutina` = '$titulo',
                      `id_disciplina` = '$disciplina',
                      `ejercicios_rutina` = '$contenido',
                      `id_usuario_modificacion` = '$user',
                      `fecha_modificacion` = NOW()
                      WHERE `rutinas`.`id_rutina` = $xid;";

$result=mysqli_query($db,$query);

if($result){
    header("location: index.php?exito=1");
}else{
    $message = "No se pudo guardar los cambios, inténtelo de nuevo.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("refresh:2; url=index.php");
}