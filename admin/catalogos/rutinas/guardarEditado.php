<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 07/11/2018
 * Time: 08:35 AM
 */

require("conexion.php");
$xid = $_POST['xid'];
$titulo = $_POST["titulo"];
$disciplina = $_POST["disciplina"];
$contenido = $_POST["contenido"];

$query="UPDATE rutinas SET 
            titulo='$titulo',
            disciplina=$disciplina,
            contenido='$contenido' 
        WHERE id=$id
        ";

$result=$db->query($query);

if($result){
    header("Location: index.php");
}else{
    echo "No se pudo guardar los cambios, inténtelo de nuevo.";
    header("refresh:2; url=index.php");
}