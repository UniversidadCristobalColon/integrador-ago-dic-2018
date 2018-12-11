<?php
    require_once 'config.php';

    # Retorna la fecha en formato de: 03 de Diciembre de 2018
    function fecha_larga($fecha){
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
            "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

        $dia = date('d', strtotime($fecha));
        $mes = $meses[date('m', strtotime($fecha)) - 1];
        $anio = date('Y', strtotime($fecha));
        $nombre = $dias[date('w',strtotime($fecha))];
        $fecha = $nombre.", ".$dia." de ".$mes." de ".$anio;

        return $fecha;
    }
    
    //  ACTUALIZAR CLASES Y CREAR CLASES
    //Saber si la fecha es la misma
    function misma_fecha($id_clase, $fechaa, $id_disciplina){
        global $db;
        
        $sql_comp="SELECT count(id_clase) AS count_id 
                        FROM clases
                        INNER JOIN rutinas ON clases.id_rutina = rutinas.id_rutina
                        INNER JOIN disciplinas ON disciplinas.id_disciplina = rutinas.id_disciplina
                        WHERE id_clase=$id_clase AND fecha_clase='$fechaa' AND disciplinas.id_disciplina=$id_disciplina";
        $result_comp = mysqli_query($db, $sql_comp);
        $valores_comp = mysqli_fetch_assoc($result_comp);
    
        return $valores_comp['count_id'];
    }
    
   //Saber si para esa disciplina ya existe una clase en la misma fecha
    function misma_clase($id_clase, $fechaa, $id_disciplina){
        global $db;
        
        $sql_comp2="SELECT count(id_clase) AS count_id 
                        FROM clases
                        INNER JOIN rutinas ON clases.id_rutina = rutinas.id_rutina
                        INNER JOIN disciplinas ON disciplinas.id_disciplina = rutinas.id_disciplina
                        WHERE id_clase <> $id_clase AND fecha_clase='$fechaa' AND disciplinas.id_disciplina=$id_disciplina";
        $result_comp2 = mysqli_query($db, $sql_comp2);
        $valores_comp2 = mysqli_fetch_assoc($result_comp2);
        
        return $valores_comp2['count_id'];
    }    

    //Saber si para esa disciplina ya existe una clase en la misma fecha
    function misma_clase_nueva($fechaa, $id_disciplina){
        global $db;
      
        $sql_comp2="SELECT count(id_clase) AS count_id 
                        FROM clases
                        INNER JOIN rutinas ON clases.id_rutina = rutinas.id_rutina
                        INNER JOIN disciplinas ON disciplinas.id_disciplina = rutinas.id_disciplina
                        WHERE fecha_clase='$fechaa' AND disciplinas.id_disciplina=$id_disciplina";
        $result_comp2 = mysqli_query($db, $sql_comp2);
        $valores_comp2 = mysqli_fetch_assoc($result_comp2);
        
        return $valores_comp2['count_id'];
        
    }

    //Saber si existe la rutina
    function existe_rutina($id_rutina, $nombre_rutina, $ejercicios_rutina){
        global $db;
        //Comparación de la rutina del formulario con la de la base de datos
            $query = "SELECT * FROM rutinas
                    WHERE id_rutina=$id_rutina";
            $result = mysqli_query($db, $query);
            $valores = mysqli_fetch_assoc($result);

            if($nombre_rutina == $valores['nombre_rutina'] && $ejercicios_rutina == stripslashes($valores['ejercicios_rutina'])){
                $resultado = 1;
            }else if($nombre_rutina == $valores['nombre_rutina'] && $ejercicios_rutina != stripslashes($valores['ejercicios_rutina'])){
                $resultado = 2;
            }else if($nombre_rutina != $valores['nombre_rutina'] && $ejercicios_rutina == stripslashes($valores['ejercicios_rutina'])){
                $resultado = 3;
            }elseif($nombre_rutina != $valores['nombre_rutina'] && $ejercicios_rutina != stripslashes($valores['ejercicios_rutina'])){
                $resultado = 4;
            }
        return $resultado;
    }
    
    //Saber si el nombre de la rutina ya existe
     function existe_rutina_nueva($nombre_rutina){
        global $db;
        //Comparación de la rutina del formulario con la de la base de datos
            $query = "SELECT count(id_rutina) AS idrutina
                    FROM rutinas
                    WHERE nombre_rutina LIKE '$nombre_rutina'";
            $result = mysqli_query($db, $query);
            $valores = mysqli_fetch_assoc($result);

            if($valores['idrutina']==1){
                $resultado = 1;
            }else{
                $resultado = 2;
            }
        return $resultado;
    }

    //Inserta una rutina nueva
    function insertar_rutina($nombre_rutina, $eje_rut, $id_disciplina, $id_usuario){
        global $db;
        
            $rutina = "INSERT INTO rutinas(id_rutina,
                                        nombre_rutina,
                                        ejercicios_rutina,
                                        fecha_modificacion,
                                        id_disciplina,
                                        id_usuario_modificacion)
                                VALUES('0',
                                      '$nombre_rutina',
                                      '$eje_rut',
                                      CURDATE(),
                                      '$id_disciplina',
                                      '$id_usuario')";
            if ($db->query($rutina) === true) {
                $resultado = 1;
            }else{
                $resultado = 0;
            }
        
        return $resultado;
    }

    //Obtener el id de la rutina creada
    function saber_id_rutina($nombre_rutina){
        global $db;
        
            $saber_id = "SELECT id_rutina, nombre_rutina
                        FROM rutinas
                        WHERE nombre_rutina LIKE  '%$nombre_rutina'";
            $result_id = mysqli_query($db, $saber_id);
            $valor_id = mysqli_fetch_assoc($result_id);

            $id_nueva_rutina = $valor_id['id_rutina'];
        
        return $id_nueva_rutina;
    }

    //Retorna el tipo de record
    function  desctiporecord($id_record, $id_clase){
        global $db;

        if($id_record==1){
            $sql = "SELECT clases.id_tipo_unidad_peso, desc_tipo_unidad_peso
                    FROM clases
                    INNER JOIN tipounidadpeso ON tipounidadpeso.id_tipo_unidad_peso = clases.id_tipo_unidad_peso
                    AND id_clase=$id_clase";

            $result = mysqli_query($db, $sql);
            $valores = mysqli_fetch_assoc($result);

            $descripcion = "Peso (".$valores['desc_tipo_unidad_peso'].")";
        }else if($id_record==2){
            $sql = "SELECT id_unidad_puntos, desc_tipo_unidad
                    FROM clases
                    INNER JOIN tipounidad ON id_tipo_unidad = id_unidad_puntos
                    WHERE id_clase=$id_clase";

            $result = mysqli_query($db, $sql);
            $valores = mysqli_fetch_assoc($result);

            $descripcion = "".$valores['desc_tipo_unidad'];
        }else{
            $descripcion = "Tiempo";
        }

        return $descripcion;
    }


    function record_cliente($idtiporecord, $id_clase, $id_usuario){
        global $db;

        if($idtiporecord==1){ //peso
            $buscar_puntos="peso";
        }else if($idtiporecord==2){
            $buscar_puntos="repeticiones_puntos";
        }else if($idtiporecord==3){
            $buscar_puntos="tiempo";
        }

        $sql = "select ".$buscar_puntos." from records where id_clase=$id_clase AND id_usuario=$id_usuario";

        $result = mysqli_query($db, $sql);
        $valores = mysqli_fetch_assoc($result);

        if($valores[''.$buscar_puntos]=='null'){
            $record="";
        }else{
            $record=$valores[''.$buscar_puntos];
        }

    return $record;

    }


function nivel_cliente($id_clase, $id_usuario){
    global $db;

    $sql = "select records.id_nivel_rutina, nivel from records inner join niveles_rutina on niveles_rutina.id_nivel_rutina = records.id_nivel_rutina
            where id_clase=$id_clase AND id_usuario=$id_usuario";

    $result = mysqli_query($db, $sql);
    $valores = mysqli_fetch_assoc($result);

    return $valores['nivel'];

}

    function record_nota($id_user,$id_clase){
        global $db;
        $sql = "select nota from records where id_usuario=$id_user and id_clase=$id_clase";

          $result = mysqli_query($db, $sql);
          $valores = mysqli_fetch_assoc($result);

        return $valores['nota'];
}