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

$query="UPDATE rutinas SET 
            titulo='$titulo',
            disciplina=$disciplina,
            contenido='$contenido' 
        WHERE id=$xid
        ";

$result=mysqli_query($db,$query);

if($result){
    header("Location: index.php");
}else{
    echo "No se pudo guardar los cambios, inténtelo de nuevo.";
    header("refresh:2; url=index.php");
}