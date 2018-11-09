<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 07/11/2018
 * Time: 08:30 AM
 */

require("conexion.php");
$titulo = $_GET["titulo"];
$disciplina = $_GET["disciplina"];
$contenido = $_GET["contenido"];

$query="insert into rutinas values (DEFAULT, '$titulo','$disciplina','$contenido',now())";
$result=pg_query($dbcon,$query);
if($result){
    header("Location: index.php");
}else{
    echo "No se pudo llevar a cabo la operacion";
    header("refresh:2; url=index.php");
}