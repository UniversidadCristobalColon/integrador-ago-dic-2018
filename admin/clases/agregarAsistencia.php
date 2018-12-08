<?php
    require_once '../../scripts/config.php';

    $id_clase = $_POST['id_clase'];
    $id_hora = $_POST['id_hora'];
    $ids_selected = $_POST['id_select'];

    //Si hay datos
    $array = $ids_selected;
    if($ids_selected){
        //verificar si ya están en la base de datos y si ya tienen la asistencia
        $sql="SELECT id_usuario FROM asistencias WHERE id_clase=$id_clase AND id_horario=$id_hora AND asistencia=1";
        $result = mysqli_query($db,$sql);
        while ($valores=mysqli_fetch_assoc($result)) {
            $index = array_search($valores['id_usuario'], $array);
            if ($index!==false){
                //Si está en el array, se elimina
                unset($array[$index]);
            }
        }

        if($array){
            foreach ($array as $value) {
                $asistencias = "INSERT INTO asistencias(id_asistencia,
                                            id_usuario,
                                            id_clase,
                                            id_horario,
                                            asistencia)
                                    VALUES('0',
                                          '$value',
                                          '$id_clase',
                                          '$id_hora',
                                          '1')";

                if ($db->query($asistencias) === true) {
                        echo "se agregaron";
                }
            }

            //Actualizar a los que si estaban
            $resultado = array_diff($ids_selected, $array);
            print_r($resultado);

        }else{
            echo "Todos tienen asistencia";
        }




    }else{
        echo "<script>alert(\"Debe seleccionar\");</script>";
    }




