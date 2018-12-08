<?php
    require_once '../../scripts/config.php';

    //Formulario del archivo clasenueva.php
    $id_disciplina=1;
    $id_usuario = 1;
/*
    $id_clase  = $_POST['id_clase'];
    $fecha = $_POST['fecha'];
    $fechaa=date('Y-m-d',strtotime($fecha));
    $hora_revelacion = $_POST['hora_revelacion'];
    $tipo_record = $_POST['tipo_record'];
    $tipo_unidad = $_POST['id_tipo_peso'];
    $titulo_clase = $_POST['titulo_clase'];
    $calentamiento = $_POST['calentamiento'];
    $id_rutina = $_POST['id_rutina'];
    $nombre_rutina = $_POST['nombre_rutina'];
    $ejercicios_rutina =  $_POST['ejercicios_rutina'];
*/

    echo "id_usuario: ".$id_usuario."<br>";
    echo "id_disc ".$id_disciplina."<br>";
    echo "id_clase: ".$id_clase."<br>";
    echo "fecha: ".$fechaa."<br>";
    echo "hora: ".$hora_revelacion."<br>";
    echo "tipo_record: ".$tipo_record."<br>";
    echo "tipo_unidad: ".$tipo_unidad."<br>";
    echo "titulo_clase: ".$titulo_clase."<br>";
    echo "calentamiento: ".$calentamiento."<br>";
    echo "id_rutina: ".$id_rutina."<br>";
    echo "rutina: ".$nombre_rutina."<br>";
    echo "ejercicios: ".$ejercicios_rutina."<br>";

    if($id_clase!=-1){//Actualizar registro
        //Saber si para esa clase es la misma fecha
        $sql_comp="SELECT count(id_clase) AS count_id 
                    FROM clases
                    INNER JOIN rutinas ON clases.id_rutina = rutinas.id_rutina
                    INNER JOIN disciplinas ON disciplinas.id_disciplina = rutinas.id_disciplina
                    WHERE id_clase=$id_clase AND fecha_clase='$fechaa' AND disciplinas.id_disciplina=$id_disciplina";
        $result_comp = mysqli_query($db, $sql_comp);
        $valores_comp = mysqli_fetch_assoc($result_comp);
                                    
         //Saber si para esa disciplina ya existe una clase en la misma fecha
        $sql_comp2="SELECT count(id_clase) AS count_id 
                    FROM clases
                    INNER JOIN rutinas ON clases.id_rutina = rutinas.id_rutina
                    INNER JOIN disciplinas ON disciplinas.id_disciplina = rutinas.id_disciplina
                    WHERE id_clase <> $id_clase AND fecha_clase='$fechaa' AND disciplinas.id_disciplina=$id_disciplina";
        $result_comp2 = mysqli_query($db, $sql_comp2);
        $valores_comp2 = mysqli_fetch_assoc($result_comp2);
        
        if($valores_comp['count_id']==1){
            //La fecha sigue siendo la misma
            if ($id_rutina!=-1){
                    //Comparación de la rutina del formulario con la de la base de datos
                    $query = "SELECT * FROM rutinas
                            WHERE id_rutina=$id_rutina";
                    $result = mysqli_query($db, $query);
                    $valores = mysqli_fetch_assoc($result);

                    if($nombre_rutina != $valores['nombre_rutina'] || $ejercicios_rutina != $valores['ejercicios_rutina']){
                        //Es una rutina editada
                        $rutina_editada = "INSERT INTO rutinas(id_rutina,
                                                    nombre_rutina,
                                                    ejercicios_rutina,
                                                    fecha_modificacion,
                                                    id_disciplina,
                                                    id_usuario_modificacion)
                                            VALUES('0',
                                                  '$nombre_rutina',
                                                  '$ejercicios_rutina',
                                                  CURDATE(),
                                                  '$id_disciplina',
                                                  '$id_usuario')";

                        if ($db->query($rutina_editada) === true) {
                            $saber_id = "SELECT id_rutina, nombre_rutina
                                        FROM rutinas
                                       WHERE nombre_rutina LIKE  '%$nombre_rutina'";
                            $result_id = mysqli_query($db, $saber_id);
                            $valor_id = mysqli_fetch_assoc($result_id);

                            $id_nueva_rutina = $valor_id['id_rutina'];

                            if($tipo_record!=1){
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '0'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }

                            }else{
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                   echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }
                            }
                        }else{
                            echo "Ha ocurrido un error con la rutina.";
                        }
                    }else{
                        //Se tomó una rutina que ya existe y no se modificó
                        if($tipo_record!=1){
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '0'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }

                            }else{
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }
                            }
                    }
                }else{
                    $rutina_nueva = "INSERT INTO rutinas(id_rutina,
                                                    nombre_rutina,
                                                    ejercicios_rutina,
                                                    fecha_modificacion,
                                                    id_disciplina,
                                                    id_usuario_modificacion)
                                            VALUES('0',
                                                  '$nombre_rutina',
                                                  '$ejercicios_rutina',
                                                  CURDATE(),
                                                  '$id_disciplina',
                                                  '$id_usuario')";

                        if ($db->query($rutina_nueva) === true) {
                            $saber_id = "SELECT id_rutina, nombre_rutina
                                        FROM rutinas
                                       WHERE nombre_rutina LIKE  '%$nombre_rutina%'";
                            $result_id = mysqli_query($db, $saber_id);
                            $valor_id = mysqli_fetch_assoc($result_id);

                            $id_nueva_rutina = $valor_id['id_rutina'];

                            if($tipo_record!=1){
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '0'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }

                            }else{
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }
                            }
                        }else{
                            echo "Hubo un error al actualizar la rutina.";
                        }
                
                
                
                
                
            }
        }else{  //Es otra fecha
            if($valores_comp2['count_id']==0){
                //No hay clases en la misma fecha de esa disciplina
                if ($id_rutina!=-1){
                    //Comparación de la rutina del formulario con la de la base de datos
                    $query = "SELECT * FROM rutinas
                            WHERE id_rutina=$id_rutina";
                    $result = mysqli_query($db, $query);
                    $valores = mysqli_fetch_assoc($result);

                    if($nombre_rutina != $valores['nombre_rutina'] || $ejercicios_rutina != $valores['ejercicios_rutina']){
                        //Es una rutina editada
                        $rutina_editada = "INSERT INTO rutinas(id_rutina,
                                                    nombre_rutina,
                                                    ejercicios_rutina,
                                                    fecha_modificacion,
                                                    id_disciplina,
                                                    id_usuario_modificacion)
                                            VALUES('0',
                                                  '$nombre_rutina',
                                                  '$ejercicios_rutina',
                                                  CURDATE(),
                                                  '$id_disciplina',
                                                  '$id_usuario')";

                        if ($db->query($rutina_editada) === true) {
                            $saber_id = "SELECT id_rutina, nombre_rutina
                                        FROM rutinas
                                       WHERE nombre_rutina LIKE  '%$nombre_rutina%'";
                            $result_id = mysqli_query($db, $saber_id);
                            $valor_id = mysqli_fetch_assoc($result_id);

                            $id_nueva_rutina = $valor_id['id_rutina'];

                            if($tipo_record!=1){
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '0'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }

                            }else{
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }
                            }
                        }else{
                            echo "Hubo un error al actualizar la rutina.";
                        }
                    }else{
                        //Se tomó una rutina que ya existe y no se modificó
                        if($tipo_record!=1){
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '0'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la claseeee.";
                                }

                            }else{
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }
                            }
                    }
                }else{
                     $rutina_editada = "INSERT INTO rutinas(id_rutina,
                                                    nombre_rutina,
                                                    ejercicios_rutina,
                                                    fecha_modificacion,
                                                    id_disciplina,
                                                    id_usuario_modificacion)
                                            VALUES('0',
                                                  '$nombre_rutina',
                                                  '$ejercicios_rutina',
                                                  CURDATE(),
                                                  '$id_disciplina',
                                                  '$id_usuario')";

                        if ($db->query($rutina_editada) === true) {
                            $saber_id = "SELECT id_rutina, nombre_rutina
                                        FROM rutinas
                                       WHERE nombre_rutina LIKE  '%$nombre_rutina%'";
                            $result_id = mysqli_query($db, $saber_id);
                            $valor_id = mysqli_fetch_assoc($result_id);

                            $id_nueva_rutina = $valor_id['id_rutina'];

                            if($tipo_record!=1){
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '0'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }

                            }else{
                                //Actualizar la clase
                                $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad'
                                                WHERE id_clase=$id_clase";
                                
                                if ($db->query($update_clase) === true){
                                    echo "Se actualizó la clase.";
                                }else{
                                    echo "No se pudo actualizar la clase.";
                                }
                            }
                        }else{
                            echo "Hubo un error al actualizar la rutina.";
                        }
                }
                
            }else{
                echo "Ya existe una clase para esa fecha.";
            }
            
        }

    }else{
        //Clase nueva
        //Existe la rutina
         //Saber si para esa disciplina ya existe una clase en la misma fecha
        $sql_comp2="SELECT count(id_clase) AS count_id 
                    FROM clases
                    INNER JOIN rutinas ON clases.id_rutina = rutinas.id_rutina
                    INNER JOIN disciplinas ON disciplinas.id_disciplina = rutinas.id_disciplina
                    WHERE fecha_clase='$fechaa' AND disciplinas.id_disciplina=$id_disciplina";
        $result_comp2 = mysqli_query($db, $sql_comp2);
        $valores_comp2 = mysqli_fetch_assoc($result_comp2);

        if ($valores_comp2['count_id'] == 0) {
            if ($id_rutina != -1){
                echo "Comparar rutinas <br>";
                //Comparación de la rutina del formulario con la de la base de datos
                $query = "SELECT * FROM rutinas
                          WHERE id_rutina=$id_rutina";
                $result = mysqli_query($db, $query);
                $valores = mysqli_fetch_assoc($result);

                if ($nombre_rutina != $valores['nombre_rutina'] || $ejercicios_rutina != $valores['ejercicios_rutina']){
                    //Es una rutina editada
                    $rutina_editada = "INSERT INTO rutinas(id_rutina,
                                            nombre_rutina,
                                            ejercicios_rutina,
                                            fecha_modificacion,
                                            id_disciplina,
                                            id_usuario_modificacion)
                                    VALUES('0',
                                          '$nombre_rutina',
                                          '$ejercicios_rutina',
                                          CURDATE(),
                                          '$id_disciplina',
                                          '$id_usuario')";
                    echo $rutina_editada;
                    if ($db->query($rutina_editada) === true){
                        //Saber el id_rutina de la nueva rutina
                        $saber_id = "SELECT id_rutina, nombre_rutina
                                FROM rutinas
                               WHERE nombre_rutina LIKE '%$nombre_rutina'";
                        $result_id = mysqli_query($db, $saber_id);
                        $valor_id = mysqli_fetch_assoc($result_id);

                        $id_nueva_rutina = $valor_id['id_rutina'];

                        if($tipo_record!=1){
                            echo $tipo_record."<br>";
                            //Guardar la clase nueva
                            $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '0')";

                            if ($db->query($clase_nueva) === true){
                                echo "Se guardó la clase.";
                            }else{
                                echo "No se pudo guardar la clase.";
                            }

                        }else{
                            //Guardar la clase nueva
                            $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '$tipo_unidad')";

                            if ($db->query($clase_nueva) === true){
                                echo "Se guardó la clase.";
                            }else{
                                echo "No se pudo guardar la clase.";
                            }

                        }

                    }else{
                        echo "Hubo un error con la rutina";
                    }
                }else{
                    if($tipo_record!=1){
                            //Guardar la clase nueva
                            $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '0')";

                            if ($db->query($clase_nueva) === true){
                                echo "Se guardó la clase.";
                            }else{
                                echo "No se pudo guardar la clase.";
                            }

                        }else{
                            //Guardar la clase nueva
                            $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '$tipo_unidad')";

                            if ($db->query($clase_nueva) === true){
                                echo "Se guardó la clase.";
                            }else{
                                echo "No se pudo guardar la clase.";
                            }

                        }
                    }

            }else{
                $rutina_nueva = "INSERT INTO rutinas(id_rutina,
                                            nombre_rutina,
                                            ejercicios_rutina,
                                            fecha_modificacion,
                                            id_disciplina,
                                            id_usuario_modificacion)
                                    VALUES('0',
                                          '$nombre_rutina',
                                          '$ejercicios_rutina',
                                          CURDATE(),
                                          '$id_disciplina',
                                          '$id_usuario')";

                    if ($db->query($rutina_nueva) === true) {
                        //Saber el id_rutina de la nueva rutina

                        $saber_id = "SELECT id_rutina, nombre_rutina
                                FROM rutinas
                               WHERE nombre_rutina LIKE  '%$nombre_rutina'";
                        $result_id = mysqli_query($db, $saber_id);
                        $valor_id = mysqli_fetch_assoc($result_id);

                        $id_nueva_rutina = $valor_id['id_rutina'];

                        if($tipo_record!=1){
                            //Guardar la clase nueva
                            $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '0')";

                            if ($db->query($clase_nueva) === true){
                                echo "Se guardó la clase.";
                            }else{
                                echo "No se pudo guardar la clase.";
                            }

                        }else{
                            //Guardar la clase nueva
                            $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '$tipo_unidad')";

                            if ($db->query($clase_nueva) === true){
                                echo "Se guardó la clase.";
                            }else{
                                echo "No se pudo guardar la clase.";
                            }

                        }

                    }else{
                        echo "HUbo un error con la rutina.";
                    }
            }
        }else{
            echo "Ya existe una clase para esa fecha.";
        }
    }


