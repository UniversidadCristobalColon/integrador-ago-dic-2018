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

$query="UPDATE `rutinas` SET 
                      `titulo` = '$titulo',
                      `id_disciplinas` = '$disciplina',
                      `contenido` = '$contenido',
                      `actualizacion` = NOW()
                      WHERE `rutinas`.`id` = $xid;";

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