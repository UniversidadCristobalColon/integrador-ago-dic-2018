<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 19/11/2018
 * Time: 03:49 PM
 */
require_once '../../../scripts/config.php';

$descripcion = $_POST['descripcion'];
$user = $_POST['user'];
$importe = $_POST['importe'];
$fecha = $_POST['fecha'];

$query="INSERT INTO `egresos` (
                          `id`,
                          `descripcion`,
                          `id_usuario`,
                          `importe`,
                          `actualizacion`) VALUES (
                                    NULL,
                                    '$descripcion',
                                    '$user',
                                    '$importe',
                                    '$fecha'
                                    );";

$result=mysqli_query($db,$query);

if ($result === TRUE) {
    $message = "El nuevo egreso se ha guardado.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    ?>
    <!--Redireccionamiento al index de egresos -->
    <meta http-equiv="refresh" content="1;url=index.php">
    <?php
}
else {
    $message = "No se ha podido completar el registro del nuevo egreso, inténtalo de nuevo." . $query . "<br>" . $db->error;
    echo "<script type='text/javascript'>alert('$message');</script>";
}