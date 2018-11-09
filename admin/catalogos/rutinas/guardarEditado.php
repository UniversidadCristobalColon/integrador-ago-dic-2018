<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 07/11/2018
 * Time: 08:35 AM
 */

require("conexion.php");
$titulo = $_GET["titulo"];
$disciplina = $_GET["disciplina"];
$contenido = $_GET["contenido"];

$query="UPDATE rutinas SET titulo='$titulo', disciplina='$disciplina', contenido='$contenido' WHERE id=$id";

$result = pg_query($dbcon,$query);

if($result){
    header("Location: index.php");
}else{
    echo "No se pudo registrar el nuevo vuelo.";
    header("refresh:2; url=index.php");
}