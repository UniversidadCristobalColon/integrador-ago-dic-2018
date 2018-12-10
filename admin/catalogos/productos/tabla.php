
<?php 
//require_once '../../../scripts/config.php';
require_once "clases/conexioninv.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT 
id_producto,
nombre_producto,
descripcion_producto,
cantidad,
Precio_unitario,
id_usuario_modificacion,
fecha_creacion,
fecha_modificacion
from inventario";
$result=mysqli_query($conexion,$sql);
?>

<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>


<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color: #ffff ;color: black; font-weight: bold;">
			<tr>
				
				<td>Nombre Producto</td>
				<td>Descripción Producto</td>
				<td>Cantidad</td>
				<td>Precio Por Unidad </td>
                <td>usuario Modificación</td>
				<td>fecha de creación</td>
				<td>fecha modificación</td>
				<td>Editar</td>
                <td>Eliminar</td>
         
                
                
			</tr>
		</thead>
		
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr >
                  
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[3] ?></td>
					<td><?php echo $mostrar[4] ?></td>
					<td><?php echo $mostrar[5] ?></td>
                    <td><?php echo $mostrar[6] ?></td>
                    <td><?php echo $mostrar[7] ?></td>
                   
                     
                    
					<td style="text-align: center;">
        
  

						<a href="procesos/Editar.php?id=<?php echo $mostrar[0]; ?>">Editar</a>
                           
                        
					</td>
					<td style="text-align: center;">
						<a href="procesos/eliminar.php?id=<?php echo $mostrar[0]; ?>" class="btn btn-link" role="button" onclick='return confirm("¿Está seguro que quiere eliminar este ingreso?");'>Eliminar</a>
					</td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>












































































	
	
	