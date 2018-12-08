<?php
	
	$mysqli=new mysqli("35.225.5.28","sarx_user","oBSH6d4RicpMR8Ja","sarx_db"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexión Fallida : ', mysqli_connect_error();
		exit();





	}
	
?>


