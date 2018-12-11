

<?php

require_once "../clases/conexioninv.php";

$id=$_REQUEST['id'];

$obj= new conectar();
			$conexion=$obj->conexion();
$sql="delete from inventario where id_producto=$id";

$result=mysqli_query($db,$query);
$result=$conexion->query($sql);
if ($result){
    header("Location: ../index.php");
}else{
    echo "No se pudo llevar a acabo la operacion.";
    header("refresh:4; url=../index.php");
}