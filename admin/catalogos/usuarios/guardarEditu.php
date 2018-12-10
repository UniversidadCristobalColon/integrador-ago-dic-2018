<?php
/**
 * Created by PhpStorm.
 * User: Denisse
 * Date: 01/12/2018
 * Time: 02:27 AM
 */
require_once '../../../scripts/config.php';
        $xid = $_POST['id'];
        $nombre_completo = $_POST['nombre'];
        $nombre_corto = $_POST['nombrecorto'];
        $correo = $_POST['email'];
        $celular = $_POST['celular'];
        $telefono = $_POST['telefono'];
        $dias_pago = $_POST['dia_pago'];


$query="UPDATE `usuarios` SET 
                      `nombre_completo` = '$nombre_completo',
                      `nombre_corto` = '$nombre_corto',
                      `correo` = '$correo',
                      `celular` = '$celular',
                      `telefono` = '$telefono',
                      `dias_pago` = '$dias_pago'
                      WHERE `usuarios`.`id_usuario` = $xid;";

$guardarbase=mysqli_query($db,$query);

    if($guardarbase){
        $message = "Los cambios se han guardado.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Location: indexu.php");
    }else{
        $message = "No se pudo guardar los cambios, inténtelo de nuevo.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("refresh:2; url=indexu.php");
    }

