<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombreU'],
		$_POST['anioU'],
		$_POST['empresaU'],
        $_POST['PrecioU'],
        $_POST['DesU'],
        $_POST['NomU'],
		$_POST['idjuego']
				);

	echo $obj->actualizar($datos);
	

 ?>