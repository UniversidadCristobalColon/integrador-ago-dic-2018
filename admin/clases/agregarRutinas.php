<?php
    require_once '../../scripts/config.php';

    $id_rutina = $_POST['id_rutina'];

    $query="SELECT *
            FROM
              rutinas
            WHERE
              id_rutina=$id_rutina";

    $result = mysqli_query($db,$query);
    $valores=mysqli_fetch_assoc($result);


    $nombre_rutina = $valores['nombre_rutina'];
    $ejercicios_rutina = $valores['ejercicios_rutina'];

    $datos = array(
        'nombre' => $nombre_rutina,
        'ejercicios' => $ejercicios_rutina
    );

    echo json_encode($datos);


?>