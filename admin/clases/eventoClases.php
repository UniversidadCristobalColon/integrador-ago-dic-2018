<?php
    require_once '../../scripts/config.php';
    header('Content-Type: application/json');

    $sqlclass="SELECT id_clase, rutinas.id_rutina, nombre_rutina, fecha_clase, calentamiento, ejercicios_rutina FROM clases left join rutinas on clases.id_rutina=rutinas.id_rutina";
    $resultado=$db->query($sqlclass);
    $con=0;

    while ($rowe=mysqli_fetch_array($resultado)){
        $eventos[$con]["id"] = $rowe['id_clase'];
        $eventos[$con]["title"] = $rowe['nombre_rutina'];
        $eventos[$con]["start"] = $rowe['fecha_clase'];
        $eventos[$con]["url"] = 'https://www.google.com';

        $con++;
    }

    /*
    $eventos[0]["title"] = 'evento 1';
    $eventos[0]["start"] = ' 2018-11-25';

    $eventos[1]["title"] = 'evento 2';
    $eventos[1]["start"] = ' 2018-11-22';

    $eventos[2]["title"] = 'evento 3';
    $eventos[2]["start"] = ' 2018-11-27';

    */


    /*$sql="SELECT id_disciplina, nombre_disciplina FROM disciplinas";
    $resul=$db->query($sql);
    $html="<option value='0'>Elige una disciplina...</option>";
    while ($rowm=mysqli_fetch_array($resul))
    {
        $html.="<option value='".$rowm['id_disciplina']."'>".$rowm['nombre_disciplina']."</option>";
    }
    echo $html;*/



    ECHO json_encode($eventos);
?>
