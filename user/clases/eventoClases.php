<?php
    require_once '../../scripts/config.php';
    header('Content-Type: application/json');
    $start=$_GET["start"];
    $end=$_GET["end"];
    $selected=$_GET["selected"];
    $sqlclass="SELECT id_clase, titulo_clase, fecha_clase, calentamiento, ejercicios_rutina FROM clases left join rutinas on clases.id_rutina=rutinas.id_rutina where rutinas.id_disciplina=1";
    //$sqlclass="SELECT id_clase, titulo_clase, fecha_clase, calentamiento, ejercicios_rutina FROM clases left join rutinas on clases.id_rutina=rutinas.id_rutina where rutinas.id_disciplina=".$selected." and fecha_clase BETWEEN '".$start."' and '".$end."'";
    //$sqlclass="SELECT id_clase, titulo_clase, fecha_clase, calentamiento, ejercicios_rutina FROM clases left join rutinas on clases.id_rutina=rutinas.id_rutina where fecha_clase BETWEEN '".$start."' and '".$end."'";
    $resultado=$db->query($sqlclass);
    $con=0;


    while ($rowe=mysqli_fetch_array($resultado)){
        $eventos[$con]["id"] = $rowe['id_clase'];
        $eventos[$con]["title"] = $rowe['titulo_clase'];
        $eventos[$con]["start"] = $rowe['fecha_clase'];
        $eventos[$con]["url"] = '../clases/clase.php?id='.$rowe['id_clase'];

        $con++;
    }


    ECHO json_encode($eventos);
?>
