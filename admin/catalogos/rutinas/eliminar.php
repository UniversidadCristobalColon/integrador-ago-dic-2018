<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 09/11/2018
 * Time: 04:33 PM
 */
require_once '../../../scripts/config.php';

$xid = $_POST['xid'];

$query="delete from rutinas where id=$xid";

$result=$db->query($query);

if ($result){
    header("Location: index.php");
}else{
    echo "No se pudo llevar a acabo la operacion.";
    header("refresh:2; url=index.php");
}