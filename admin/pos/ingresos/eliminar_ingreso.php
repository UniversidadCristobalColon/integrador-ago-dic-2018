<?php

require_once '../../../scripts/config.php';

$id = $_GET['xid'];

$query="delete from ingresos where id_ingresos=$id";

$result=mysqli_query($db,$query);

if ($result){
    header("Location: index.php");
}else{
    echo "No se pudo llevar a acabo la operacion.";
    header("refresh:2; url=index.php");
}