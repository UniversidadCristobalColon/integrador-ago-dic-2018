<?php
/**
 * Created by PhpStorm.
 * User: Denisse
 * Date: 05/12/2018
 * Time: 01:00 PM
 */

require_once '../../../scripts/config.php';
$id = $_GET['xid'];
$query="delete from usuarios where id_usuario = $id";
$guardarbase=mysqli_query($db,$query);
if ($guardarbase){
    header("Location: indexu.php");
}else{
    echo "No se pudo llevar a acabo la operación.";
    header("refresh:2; url=indexu.php");
}