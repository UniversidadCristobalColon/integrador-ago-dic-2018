<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 07/11/2018
 * Time: 08:30 AM
 */

require_once '../../../scripts/config.php';
$titulo = $_POST["titulo"];
$disciplina = $_POST["disciplina"];
$contenido = $_POST["contenido"];
$user = $_POST['user'];

$query="INSERT INTO `rutinas` (
                          `id_rutina`,
                          `nombre_rutina`,
                          `ejercicios_rutina`,
                          `fecha_modificacion`,
                          `id_disciplina`,
                          `id_usuario_modificacion`) VALUES (
                                    NULL,
                                    '$titulo',
                                    '$contenido',
                                    NOW(),
                                    '$disciplina',
                                    '$user'
                                    );";

$result=mysqli_query($db,$query);

if ($result === TRUE) {
    header("location: index.php?exito=1");
}
//Mostrar error
else {
    $message = "No se ha podido completar el registro de la nueva rutina, inténtalo de nuevo." . $query . "<br>" . $db->error;
    echo "<script type='text/javascript'>alert('$message');</script>";
}