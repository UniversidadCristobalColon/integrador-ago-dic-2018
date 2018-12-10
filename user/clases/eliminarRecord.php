<?php
/**
 * Created by PhpStorm.
 * User: edveno
 * Date: 23/11/18
 * Time: 09:13
 */

require_once '../../scripts/config.php';

$Usuario = $_POST["usuario"];
$Clase = $_POST["clase"];

$record = $_POST["id_record"];

var_dump($record);

$eliminarRecord = "DELETE FROM `records` WHERE id_record like ".$record;


$result = mysqli_query($db, $eliminarRecord);



if ($result === TRUE) {

    header("location: clase.php?guardado=1&id=$Clase");
}
//Mostrar error
else {
    $message = "No se ha podido completar la eliminación del record, inténtalo de nuevo.". $eliminarRecord . "<br>" . $db->error;
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>

