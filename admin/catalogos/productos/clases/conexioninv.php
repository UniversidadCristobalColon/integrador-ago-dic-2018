<?php 

	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('35.225.5.28','sarx_user','oBSH6d4RicpMR8Ja','sarx_db');
			return $conexion;
		}
	}
 
$obj= new conectar();
if($obj->conexion()){
    echo "";
}

 ?>