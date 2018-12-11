<?php
require_once "../clases/conexioninv.php";
require_once '../../../../scripts/config.php' ;
$id=$_REQUEST['id'];
echo $id;



?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de gestión de Sarx Wellness Center">
    <meta name="author" content="UCC Sistemas"> 
 
     <title>Sarx Wellness Center</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="icon" href="../../../img/favicon.png">
</head>
<body>
   <?php require_once '../../../../scripts/navbar.php' ?>
    <br>
    <br>
    <br>
  <main role="main" class="container">

    <div class="starter-template">
        <h1>Editar inventario</h1>
        <p class="lead">
            
      <form action="update.php" method="post">
           <?php
       
       $obj= new conectar();
			$conexion=$obj->conexion();

          $sql="SELECT * FROM inventario where id_producto = {$_REQUEST['id']}";
       
        $result=mysqli_query($conexion,$sql);        
        while($mostrar=mysqli_fetch_array($result)){ 
            
    /**<input  class="modal-title" id="exampleModalLabel"    type="submit" value="Guardar"  class="btn btn-success" style="color: #fff;
    background-color: #28a745;
    border-color: #28a745;border: 1px solid transparent;border-radius: .25rem;padding: .375rem .75rem;">*/
              ?>
            
       
               
            <input    class="modal-title" id="exampleModalLabel"    type="submit" value="Aceptar"   style="color: #fff;
    background-color: #28a745;
    border-color: #28a745;border: 1px solid transparent;border-radius: .25rem;padding: .375rem .75rem;">
           
            <div class="row mb-3">
                <div class="col-md-10">
                    <br>
                    <label for="inputDescripcion">Nombre Producto: </label>
                    <input type="text"  class="form-control" REQUIRED name="nombrepro" id="" placeholder="Usuario..." value="<?php echo $mostrar["nombre_producto"] ?> ">
                </div> <div class="col-md-10">
                    <br>
                    <label for="inputDescripcion">Descripción: Producto: </label>
                    <input type="text"  class="form-control"  REQUIRED name="descpro" id="descpro" placeholder="Nombre Producto..." value="<?php echo $mostrar["descripcion_producto"] ?>">
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                     <label for="inputUsuario">cantidad </label>
                     <input type="text" class="form-control" REQUIRED name="cantidad"id="cantidad"  placeholder="Producto..." value="<?php echo $mostrar["cantidad"] ?> ">
                </div>
                <div class="col-md-3">
                    <label for="inputMonto">Monto: </label>
                    <input type="text" class="form-control"  REQUIRED name="preuni"id="preuni"  placeholder="Cantidad..." value="<?php echo $mostrar["precio_unitario"] ?> ">
                </div>
                
                
                
                 
            </div>
           
            <br><input type="hidden" name="id_producto" value= "<?php echo $_REQUEST['id'];?>">
                 <?php }
    ?> 
     
       </form>
       
      
        
 
    </div>
   
</main>  

 
    
      </body>
       </html>




 






