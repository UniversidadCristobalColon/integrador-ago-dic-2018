<?php 
/*,descripcion_producto,cantidad,Precio_unitario,id_usuario_modificacion '$datos[1]',
                                            '$datos[2]',
                                            '$datos[3]',
                                            '$datos[4]'*/
	class crud{
		public function agregar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();
            

			$sql="INSERT INTO inventario (nombre_producto,descripcion_producto,cantidad,Precio_unitario,id_usuario_modificacion,fecha_creacion)
									values (
											'$datos[0]',
											 '$datos[1]',
                                              '$datos[2]',
                                               '$datos[3]',
                                            '$datos[4]',NOW()
                                            )";
			return mysqli_query($conexion,$sql);
		}
 
		public function obtenDatos($idjuego){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="SELECT id_producto,
            nombre_producto,descripcion_producto,
            cantidad,Precio_unitario,id_usuario_modificacion,
            fecha_creacion,fecha_modificacion
					from inventario
					where id_producto='$idjuego'";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'id_producto'             => $ver[0],
				'nombre_producto'         => $ver[1],
				'anio'                    => $ver[2],
				'descripcion_producto'    => $ver[3],
                'cantidad'                => $ver[4],
                'Precio_unitario'         => $ver[5],
               
               
				);
			return $datos;
		}

		public function actualizar($datos){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="UPDATE t_juegos set nombre='$datos[0]',
										anio='$datos[1]',
										empresa='$datos[2]',
                                        Precio='$datos[3]',
                                        Des_Pro='$datos[4]',
                                        Nom_Pro='$datos[5]'
						where id_juego='$datos[5]'";
			return mysqli_query($conexion,$sql);
		}
		public function eliminar($idjuego){
			$obj= new conectar();
			$conexion=$obj->conexion();

			$sql="DELETE from t_juegos where id_juego='$idjuego'";
			return mysqli_query($conexion,$sql);
		}
	}

 ?>