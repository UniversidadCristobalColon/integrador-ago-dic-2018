<?php

    require_once '../../scripts/config.php';

    $id_user =$_POST['id_user'];
    $id_record =$_POST['id_record'];
    $id_peso =$_POST['id_peso'];
    $id_puntos =$_POST['id_puntos'];
    $record_puntaje =$_POST['record_puntaje'];
    $record_fecha =$_POST['record_fecha'];
    $id_clase =$_POST['id_clase'];
    $notas =$_POST['notas'];
    $id_nivel =$_POST['id_nivel'];

    $sql="select count(id_usuario) as count from records where id_usuario=$id_user and id_clase=$id_clase";

    $result = mysqli_query($db, $sql);
    $valores = mysqli_fetch_assoc($result);

    if($valores['count']>0) {
        if ($id_record == 1) {
            $sql_update = "UPDATE records
                          SET id_tipo_record='$id_record',
                          id_unidad_peso='$id_peso_',
                          peso='$record_puntaje',
                          fecha_creacion='$record_fecha',
                          nota='$notas',
                          id_nivel_rutina='$id_nivel'
                          WHERE id_usuario=$id_user and id_clase=$id_clase";

            if ($db->query($sql_update) === true) {
                echo "1";
            } else {
                echo "0";
            }

        }
        else if ($id_record == 2) {
            $sql_update = "UPDATE records
                          SET id_tipo_record='$id_record',
                          id_unidad_puntos='$id_puntos',
                          repeticiones_puntos='$record_puntaje',
                          fecha_creacion='$record_fecha',
                          nota='$notas',
                          id_nivel_rutina='$id_nivel'
                          WHERE id_usuario=$id_user and id_clase=$id_clase";
            if ($db->query($sql_update) === true) {
                echo "1";
            } else {
                echo "0";
            }
        }
        else {
            $sql_update = "UPDATE records
                          SET id_tipo_record='$id_record',
                          tiempo='$record_puntaje',
                          fecha_creacion='$record_fecha',
                          nota='$notas',
                          id_nivel_rutina='$id_nivel'
                          WHERE id_usuario=$id_user and id_clase=$id_clase";
            if ($db->query($sql_update) === true) {
                echo "1";
            } else {
                echo "0";
            }
        }
    }else{
        if ($id_record == 1) {
            $sql= "INSERT INTO records(id_record,
                                        id_rutina,
                                        id_tipo_record,
                                        id_unidad_puntos,
                                        repeticiones_puntos,
                                        id_unidad_peso,
                                        peso,
                                        tiempo,
                                        fecha_creacion,
                                        id_usuario,
                                        id_clase,
                                        nota,
                                        id_nivel_rutina)
                                VALUES('0',
                                      null,
                                      '$id_record',
                                      null,
                                      null,
                                      '$id_peso',
                                      '$record_puntaje',
                                      null,
                                      '$record_fecha',
                                      '$id_user',
                                      '$id_clase',
                                      '$notas',
                                      '$id_nivel')";

            if ($db->query($sql) === true) {
                echo "1";
            } else {
                echo "0";
            }

        }
        else if ($id_record == 2) {
            $sql = "INSERT INTO records(id_record,
                                        id_rutina,
                                        id_tipo_record,
                                        id_unidad_puntos,
                                        repeticiones_puntos,
                                        id_unidad_peso,
                                        peso,
                                        tiempo,
                                        fecha_creacion,
                                        id_usuario,
                                        id_clase,
                                        nota,
                                        id_nivel_rutina)
                                VALUES('0',
                                      null,
                                      '$id_record',
                                      '$id_puntos',
                                      '$record_puntaje',
                                      null,
                                      null,
                                      null,
                                      '$record_fecha',
                                      '$id_user',
                                      '$id_clase',
                                      '$notas',
                                      '$id_nivel')";
            if ($db->query($sql) === true) {
                echo "1";
            } else {
                echo "0";
            }
        }
        else {
            $sql = "INSERT INTO records(id_record,
                                        id_rutina,
                                        id_tipo_record,
                                        id_unidad_puntos,
                                        repeticiones_puntos,
                                        id_unidad_peso,
                                        peso,
                                        tiempo,
                                        fecha_creacion,
                                        id_usuario,
                                        id_clase,
                                        nota,
                                        id_nivel_rutina)
                                VALUES('0',
                                      null,
                                      '$id_record',
                                      null,
                                      null,
                                      null,
                                      null,
                                      '$record_puntaje',
                                      '$record_fecha',
                                      '$id_user',
                                      '$id_clase',
                                      '$notas',
                                      '$id_nivel')";
            if ($db->query($sql) === true) {
                echo "1";
            } else {
                echo "0";
            }
        }
    }


