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
$Hora = $_POST["hora"];
$Minutos = $_POST["minutos"];
$Segundos = $_POST["segundos"];
$Record = $_POST["record"];
$Nota = $_POST["nota"];

$Tiempo = $Hora .":".$Minutos.":".$Segundos;



$query="SELECT * from clases where clases.id_clase like ".$Clase;
$result=mysqli_query($db,$query);
$row=mysqli_fetch_assoc($result);
$id_tipo_record = $row['id_tipo_record'];
$id_rutina = $row['id_rutina'];
$id_tipo_unidad_peso = $row['id_tipo_unidad_peso'];
$id_unidad_puntos = $row['id_unidad_puntos'];
$fecha = date("Y-m-d");


if($id_tipo_record == 1){
    $agregar_record = "INSERT INTO records (
                            `id_rutina`,
                            `id_tipo_record`,
                            `id_unidad_peso`,
                            `peso`,
                            `fecha_creacion`,
                            `id_usuario`,
                            `id_clase`,
                            `nota`) VALUES (
                        '$id_rutina','$id_tipo_record','$id_tipo_unidad_peso','$Record','$fecha','$Usuario', '$Clase','$Nota');";

}elseif($id_tipo_record==2){
    $agregar_record = "INSERT INTO records (
                            `id_rutina`,
                            `id_tipo_record`,
                            `id_unidad_puntos`,
                            `repeticiones_puntos`,
                            `fecha_creacion`,
                            `id_usuario`,
                            `id_clase`,
                            `nota`) VALUES (
                        '$id_rutina','$id_tipo_record','$id_unidad_puntos','$Record','$fecha','$Usuario', '$Clase','$Nota');";
}elseif($id_tipo_record==3){

    $agregar_record = "INSERT INTO records (
                            `id_rutina`,
                            `id_tipo_record`,
                            `tiempo`,
                            `fecha_creacion`,
                            `id_usuario`,
                            `id_clase`,
                            `nota`) VALUES (
                        '$id_rutina','$id_tipo_record','$Tiempo','$fecha','$Usuario', '$Clase','$Nota');";

}





$result = mysqli_query($db, $agregar_record);

var_dump($agregar_record);


if ($result === TRUE) {

    header("location: clase.php?guardado=1&id=$Clase");
}
//Mostrar error
else {
    $message = "No se ha podido completar el registro del record, inténtalo de nuevo.". $agregar_record . "<br>" . $db->error;
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>

