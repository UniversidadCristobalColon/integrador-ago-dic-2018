<?php
    require_once '../../scripts/config.php';
    header('Content-Type: application/json');
    $start=$_GET["start"];
    $end=$_GET["end"];
    $sqlclass="SELECT id_clase, nombre_rutina, fecha_clase, calentamiento, ejercicios_rutina FROM clases left join rutinas on clases.id_rutina=rutinas.id_rutina where fecha_clase BETWEEN '".$start."' and '".$end."'";
    $resultado=$db->query($sqlclass);
    $con=0;

    while ($rowe=mysqli_fetch_array($resultado)){
        $eventos[$con]["id"] = $rowe['id_clase'];
        $eventos[$con]["title"] = $rowe['nombre_rutina'];
        $eventos[$con]["start"] = $rowe['fecha_clase'];
        $eventos[$con]["url"] = '../clases/clase.php';
        //$eventos[$con]["url"] = '../clases/clase.php?id='.$rowe['id_clase'];

        $con++;
    }


    ECHO json_encode($eventos);
?>
