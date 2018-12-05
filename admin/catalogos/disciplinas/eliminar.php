<?php

require_once '../../../scripts/config.php';
$id = $_GET['xid'];
$query="delete from disciplinas where id_disciplina = $id";
$result=mysqli_query($db,$query);
if ($result){
    header("Location: indexn.php");
}else{
    echo "No se pudo llevar a acabo la operacion.";
    header("refresh:2; url=indexn.php");
}