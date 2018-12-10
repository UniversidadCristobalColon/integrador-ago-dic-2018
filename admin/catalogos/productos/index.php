<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de gestión de Sarx Wellness Center">
    <meta name="author" content="UCC Sistemas">
	<title>Sarx Wellness Center</title>
	<?php require_once "scripts.php";  ?>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="icon" href="../../../img/favicon.png">
      <script src="../../../js/base.js"></script>
</head>
<body>
    <?php require_once '../../../scripts/navbar.php' ?>
    <br>
    <br>
    <br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-left">
					
					<div class="card-body">
						<span class="btn btn-primary" data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevo">
						<label>Nombre Prducto</label>
						<input type="text" class="form-control input-sm" id="nombre_producto" name="nombre_producto">
						<label> DesripciónProducto</label>
						<input type="text" class="form-control input-sm" id="descripcion_producto" name="descripcion_producto">
						<label>Cantidad</label>
						<input type="int" class="form-control input-sm" id="cantidad" name="cantidad">
                       <label>Precio por unidad</label>
						<input type="int" class="form-control input-sm" id="Precio_unitario" name="Precio_unitario">
                        <label>Usuario</label>
						<input type="int" class="form-control input-sm" id="UsuarioModi" name="UsuarioModi">
                         
                        
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary"  data-dismiss="modal">Agregar</button>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="frmnuevoU">
						<input type="text" hidden="" id="idjuego" name="idjuego">
						<label>Usuario</label>
						<input type="text" class="form-control input-sm" id="nombreU" name="nombreU">
						<label>Fecha</label>
						<input type="text" class="form-control input-sm" id="anioU" name="anioU">
						<label>Producto</label>
						<input type="text" class="form-control input-sm" id="empresaU" name="empresaU">
                        <label>Cantidad</label>
						<input type="text" class="form-control input-sm" id="PrecioU" name="PrecioU">
                        <label>Precio Por Unidad</label>
						<input type="text" class="form-control input-sm" id="DesU" name="DesU">
                         <label>Precio Total</label>
						<input type="text" class="form-control input-sm" id="NomU" name="NomU">
					</form>
				</div>
				<div class="modal-footer">
                    
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizar" data-dismiss="modal">"Actualizar</button>
                  
                
				</div>
			</div>
		</div>
	</div>

</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#btnAgregarnuevo').click(function(){
			datos=$('#frmnuevo').serialize();

			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/agregar.php",
				success:function(r){
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar ");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			datos=$('#frmnuevoU').serialize();

         
            
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/actualizar.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito ");
					}else{
						alertify.error("Fallo al actualizar ");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>




<script type="text/javascript">
	function agregaFrmActualizar(idjuego){
		$.ajax({
			type:"POST",
			data:"idjuego=" + idjuego,
			url:"procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idjuego').val(datos['id_juego']);
				$('#nombreU').val(datos['nombre']);
				$('#anioU').val(datos['anio']);
				$('#empresaU').val(datos['empresa']);
                $('#PrecioU').val(datos['Precio']);
                $('#DesU').val(datos['Des_Pro']);
                $('#NomU').val(datos['Nom_Pro']);
			}
		});
	}


</script>