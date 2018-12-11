<?php 
	require_once "../clases/conexioninv.php";
	require_once "../clases/crud.php";
	$obj= new crud();

	$datos=array(
		$_POST['nombre_producto'],
		$_POST['descripcion_producto'],
		$_POST['cantidad'],
        $_POST['Precio_unitario'],
        $_POST['UsuarioModi'] 
       
				);

	echo $obj->agregar($datos);


	

 ?>