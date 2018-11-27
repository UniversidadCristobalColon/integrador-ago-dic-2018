<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 13/11/2018
 * Time: 09:40 AM
 */

require_once '../../../scripts/config.php';

$id = $_GET['xid'];

$query="delete from egresos where id_egresos=$id";

$result=mysqli_query($db,$query);

if ($result){
    header("Location: index.php");
}else{
    echo "No se pudo llevar a acabo la operacion.";
    header("refresh:2; url=index.php");
}