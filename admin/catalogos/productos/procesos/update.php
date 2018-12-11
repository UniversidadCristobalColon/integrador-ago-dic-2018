<?php
require_once "../clases/conexioninv.php";
//session_start();
//if(isset($_SESSION['id_user'])){
//$usuario = $_SESSION['id_user'];
//}
?>

<?php
// Recibir variables
$idp=$_POST['id_producto'];


echo $idp;

// Construir query
$obj= new conectar();
			$conexion=$obj->conexion();
$sql=" UPDATE inventario  SET nombre_producto = '$_POST[nombrepro]',descripcion_producto = '$_POST[descpro]',cantidad = '$_POST[cantidad]',precio_unitario = '$_POST[preuni]', fecha_modificacion = NOW()  where id_producto = '$idp'";
echo $sql;
$result=$conexion->query($sql);
if($result===TRUE) {
    echo "<p>Modificación Exitosa";
    ?>
         <meta  http-equiv="refresh" content="4;url= ../index.php">
        <?php
} else {
    echo "Error al actualizar : ".$result->error;
    echo $sql;
}
?>
