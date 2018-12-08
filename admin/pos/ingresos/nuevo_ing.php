<?php

require_once '../../../scripts/config.php';

$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$user = $_POST['user'];
$cliente = $_POST['cliente'];
$importe = $_POST['importe'];
$fecha = $_POST['fecha'];

$query="INSERT INTO `ingresos` (
                          `id_ingresos`,
                          `descripcion_ingresos`,
                          `cantidad`,
                          `importe`,
                          `id_cliente`,
                          `id_usuario`,
                          `fecha_modificacion`) VALUES (
                                    NULL,
                                    '$descripcion',
                                    '$cantidad',
                                    '$importe',
                                    '$cliente',
                                    '$user',
                                    '$fecha'
                                    );";

$result=mysqli_query($db,$query);

if ($result === TRUE) {
    $message = "El nuevo ingreso se ha guardado.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    ?>
    <!--Redireccionamiento al index de egresos -->
    <meta http-equiv="refresh" content="1;url=index.php">
    <?php
}
else {
    $message = "No se ha podido completar el registro del nuevo ingreso, inténtalo de nuevo." . $query . "<br>" . $db->error;
    echo "<script type='text/javascript'>alert('$message');</script>";
}