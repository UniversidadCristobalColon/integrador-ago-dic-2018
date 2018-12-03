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
$Horario =  $_POST["horario"];


$asistir = "INSERT INTO asistencias (
                            id_usuario,
                            id_clase,
                            id_horario,
                            asistencia) VALUES (
                        '$Usuario', '$Clase', '$Horario', 0
                    );";

var_dump($Usuario);
var_dump($Clase);
var_dump($Horario);


$result = mysqli_query($db, $asistir);

if ($result === TRUE) {
    $message = "Asistencia guardada";
    echo "<script type='text/javascript'>alert('$message');</script>";
    ?>
    <!--Redireccionamiento al index de rutinas -->
    <meta http-equiv="refresh" content="1;url=clase.php">
    <?php
}
//Mostrar error
else {
    $message = "No se ha podido completar el registro en la clase, inténtalo de nuevo." . $asistir . "<br>" . $db->error;
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>

