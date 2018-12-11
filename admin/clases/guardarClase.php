<?php
require_once '../../scripts/config.php';
require_once '../../scripts/funciones_php.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];

//Formulario del archivo clasenueva.php
$id_disciplina= $_POST['id_disciplina'];
$id_clase  = $_POST['id_clase'];

$fecha = $_POST['fecha'];
$fechaa=date('Y-m-d',strtotime($fecha));
$hora_revelacion = $_POST['hora_revelacion'];
$tipo_record = $_POST['tipo_record'];
$tipo_unidad = $_POST['id_tipo_peso'];
$tipo_unidad_puntos = $_POST['id_unidad_puntos'];
$titulo_clase = trim($_POST['titulo_clase']);
$calentamiento = $_POST['calentamiento'];
$id_rutina = $_POST['id_rutina'];
$nombre_rutina = trim($_POST['nombre_rutina']);

$ejercicios_rutina = trim($_POST['ejercicios_rutina']);


/*
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
*/

if($id_clase!=-1){//Actualizar registro
    //Saber si es la misma fecha
    if(misma_fecha($id_clase, $fechaa, $id_disciplina)==1){
        //La fecha sigue siendo la misma
        if ($id_rutina!=-1){
            //Comparación de la rutina del formulario con la de la base de datos
             $existe_rutina_resultado = existe_rutina($id_rutina,$nombre_rutina,$ejercicios_rutina);
             if($existe_rutina_resultado ==4){
                //Es una rutina editada
                $eje_rut= addslashes($ejercicios_rutina);
                //se inserta la rutina
                if (insertar_rutina($nombre_rutina, $eje_rut, $id_disciplina, $id_usuario)==1){
                    //Saber el id de la nueva rutina
                    $id_nueva_rutina = saber_id_rutina($nombre_rutina);
                    if($tipo_record==1){ //Peso
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad',
                                                    id_unidad_puntos = null
                                                WHERE id_clase=$id_clase";
                        if ($db->query($update_clase) === true){
                            echo "1";
                        }else{
                            echo "2";
                        }
                    }
                    else if($tipo_record==2){ //Repeticiones / puntos
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = null,
                                                    id_unidad_puntos = '$tipo_unidad_puntos'
                                                WHERE id_clase=$id_clase";

                        if ($db->query($update_clase) === true){
                            echo "1";
                        }else{
                            echo "2";
                        }
                    }
                    else if ($tipo_record==3){ //Tiempo
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                            SET id_usuario_modificacion= '$id_usuario',
                                                id_rutina = '$id_nueva_rutina',
                                                titulo_clase = '$titulo_clase',
                                                calentamiento = '$calentamiento',
                                                hora_revelacion= '$hora_revelacion',
                                                id_tipo_record = '$tipo_record',
                                                id_tipo_unidad_peso = null,
                                                id_unidad_puntos = null
                                            WHERE id_clase=$id_clase";
                        if ($db->query($update_clase) === true){
                            echo "1";
                        }else {
                            echo "2";
                        }
                    }
                }else{
                    echo "3";
                }
            }
            else if($existe_rutina_resultado==1){
                //No se modifico la rutina
                 if($tipo_record==1) { //Peso
                     //Actualizar la clase
                     $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad',
                                                    id_unidad_puntos = null
                                                WHERE id_clase=$id_clase";
                     if ($db->query($update_clase) === true) {
                         echo "1";
                     } else {
                         echo "2";
                     }
                 }
                 else if($tipo_record==2){ //Repeticiones / puntos
                    //Actualizar la clase
                    $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = null,
                                                    id_unidad_puntos = '$tipo_unidad_puntos'
                                                WHERE id_clase=$id_clase";

                    if ($db->query($update_clase) === true){
                        echo "1";
                    }else{
                        echo "2";
                    }
                 }
                 else if ($tipo_record==3) { //Tiempo
                     //Actualizar la clase
                     $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = null,
                                                    id_unidad_puntos = null
                                                WHERE id_clase=$id_clase";

                     if ($db->query($update_clase) === true){
                         echo "1";
                     }else{
                         echo "2";
                     }

                 }
            }
            else if($existe_rutina_resultado==2){
                 //Rutina con el mismo nombre
                 echo "4";
            }
            else if($existe_rutina_resultado==3){
                 //Rutina con los mismos ejercicios
                 echo "5";
             }
        }
        else{
            //Buscar si ya existe la rutina
            $existe_rutina_nueva_resultado = existe_rutina_nueva($nombre_rutina);
            if($existe_rutina_nueva_resultado==1){
                //Ya existe la rutina con ese nombre
                echo "4";
            }else{
                //se inserta la rutina
                $eje_rut= addslashes($ejercicios_rutina);
                if (insertar_rutina($nombre_rutina, $eje_rut, $id_disciplina, $id_usuario)==1){
                    //Saber el id de la nueva rutina
                    $id_nueva_rutina = saber_id_rutina($nombre_rutina);
                    if($tipo_record==1){ //Peso
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad',
                                                    id_unidad_puntos = null
                                                WHERE id_clase=$id_clase";
                        if ($db->query($update_clase) === true){
                            echo "1";
                        }else{
                            echo "2";
                        }
                    }
                    else if($tipo_record==2){ //Repeticiones / puntos
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = null,
                                                    id_unidad_puntos = '$tipo_unidad_puntos'
                                                WHERE id_clase=$id_clase";

                        if ($db->query($update_clase) === true){
                            echo "1";
                        }else{
                            echo "2";
                        }
                    }
                    else if ($tipo_record==3){ //Tiempo
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                            SET id_usuario_modificacion= '$id_usuario',
                                                id_rutina = '$id_nueva_rutina',
                                                titulo_clase = '$titulo_clase',
                                                calentamiento = '$calentamiento',
                                                hora_revelacion= '$hora_revelacion',
                                                id_tipo_record = '$tipo_record',
                                                id_tipo_unidad_peso = null,
                                                id_unidad_puntos = null
                                            WHERE id_clase=$id_clase";
                        if ($db->query($update_clase) === true){
                            echo "1";
                        }else {
                            echo "2";
                        }
                    }
                }else{
                    echo "3";
                }
            }
        }
    }else{  //Es otra fecha
        if(misma_clase($id_clase,$fechaa, $id_disciplina)==0){
            //No hay clases en la misma fecha de esa disciplina
            if ($id_rutina!=-1){
                //Comparación de la rutina del formulario con la de la base de datos
                $existe_rutina_resultado = existe_rutina($id_rutina,$nombre_rutina,$ejercicios_rutina);
                if($existe_rutina_resultado ==4){
                    //Es una rutina editada
                    $eje_rut= addslashes($ejercicios_rutina);
                    //se inserta la rutina
                    if (insertar_rutina($nombre_rutina, $eje_rut, $id_disciplina, $id_usuario)==1){
                        //Saber el id de la nueva rutina
                        $id_nueva_rutina = saber_id_rutina($nombre_rutina);
                        if($tipo_record==1){ //Peso
                            //Actualizar la clase
                            $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad',
                                                    id_unidad_puntos = null
                                                WHERE id_clase=$id_clase";
                            if ($db->query($update_clase) === true){
                                echo "1";
                            }else{
                                echo "2";
                            }
                        }
                        else if($tipo_record==2){ //Repeticiones / puntos
                            //Actualizar la clase
                            $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = null,
                                                    id_unidad_puntos = '$tipo_unidad_puntos'
                                                WHERE id_clase=$id_clase";

                            if ($db->query($update_clase) === true){
                                echo "1";
                            }else{
                                echo "2";
                            }
                        }
                        else if ($tipo_record==3){ //Tiempo
                            //Actualizar la clase
                            $update_clase = "UPDATE clases
                                            SET id_usuario_modificacion= '$id_usuario',
                                                id_rutina = '$id_nueva_rutina',
                                                titulo_clase = '$titulo_clase',
                                                calentamiento = '$calentamiento',
                                                fecha_clase = '$fechaa',
                                                hora_revelacion= '$hora_revelacion',
                                                id_tipo_record = '$tipo_record',
                                                id_tipo_unidad_peso = null,
                                                id_unidad_puntos = null
                                            WHERE id_clase=$id_clase";
                            if ($db->query($update_clase) === true){
                                echo "1";
                            }else {
                                echo "2";
                            }
                        }
                    }else{
                        echo "3";
                    }
                }
                else if($existe_rutina_resultado==1){
                    //No se modifico la rutina
                    if($tipo_record==1) { //Peso
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad',
                                                    id_unidad_puntos = null
                                                WHERE id_clase=$id_clase";
                        if ($db->query($update_clase) === true) {
                            echo "1";
                        } else {
                            echo "2";
                        }
                    }
                    else if($tipo_record==2){ //Repeticiones / puntos
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = null,
                                                    id_unidad_puntos = '$tipo_unidad_puntos'
                                                WHERE id_clase=$id_clase";

                        if ($db->query($update_clase) === true){
                            echo "1";
                        }else{
                            echo "2";
                        }
                    }
                    else if ($tipo_record==3) { //Tiempo
                        //Actualizar la clase
                        $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    fecha_clase = '$fechaa',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = null,
                                                    id_unidad_puntos = null
                                                WHERE id_clase=$id_clase";

                        if ($db->query($update_clase) === true){
                            echo "1";
                        }else{
                            echo "2";
                        }

                    }
                }
                else if($existe_rutina_resultado==2){
                    //Rutina con el mismo nombre
                    echo "4";
                }
                else if($existe_rutina_resultado==3){
                    //Rutina con los mismos ejercicios
                    echo "5";
                }
            }
            else{
                //Buscar si ya existe la rutina
                $existe_rutina_nueva_resultado = existe_rutina_nueva($nombre_rutina);
                if($existe_rutina_nueva_resultado==1){
                    //Ya existe la rutina con ese nombre
                    echo "4";
                }else{
                    //se inserta la rutina
                    $eje_rut= addslashes($ejercicios_rutina);
                    if (insertar_rutina($nombre_rutina, $eje_rut, $id_disciplina, $id_usuario)==1){
                        //Saber el id de la nueva rutina
                        $id_nueva_rutina = saber_id_rutina($nombre_rutina);
                        if($tipo_record==1){ //Peso
                            //Actualizar la clase
                            $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = '$tipo_unidad',
                                                    id_unidad_puntos = null
                                                WHERE id_clase=$id_clase";
                            if ($db->query($update_clase) === true){
                                echo "1";
                            }else{
                                echo "2";
                            }
                        }
                        else if($tipo_record==2){ //Repeticiones / puntos
                            //Actualizar la clase
                            $update_clase = "UPDATE clases
                                                SET id_usuario_modificacion= '$id_usuario',
                                                    id_rutina = '$id_nueva_rutina',
                                                    titulo_clase = '$titulo_clase',
                                                    calentamiento = '$calentamiento',
                                                    hora_revelacion= '$hora_revelacion',
                                                    id_tipo_record = '$tipo_record',
                                                    id_tipo_unidad_peso = null,
                                                    id_unidad_puntos = '$tipo_unidad_puntos'
                                                WHERE id_clase=$id_clase";

                            if ($db->query($update_clase) === true){
                                echo "1";
                            }else{
                                echo "2";
                            }
                        }
                        else if ($tipo_record==3){ //Tiempo
                            //Actualizar la clase
                            $update_clase = "UPDATE clases
                                            SET id_usuario_modificacion= '$id_usuario',
                                                id_rutina = '$id_nueva_rutina',
                                                titulo_clase = '$titulo_clase',
                                                calentamiento = '$calentamiento',
                                                hora_revelacion= '$hora_revelacion',
                                                id_tipo_record = '$tipo_record',
                                                id_tipo_unidad_peso = null,
                                                id_unidad_puntos = null
                                            WHERE id_clase=$id_clase";
                            if ($db->query($update_clase) === true){
                                echo "1";
                            }else {
                                echo "2";
                            }
                        }
                    }else{
                        echo "3";
                    }
                }
            }
        }
        else{
            //Ya existe una clase en la misma fecha
            echo "6";
        }
    }
}
else{
    //Clase nueva
    //Saber si para esa disciplina ya existe una clase en la misma fecha
    if (misma_clase_nueva($fechaa, $id_disciplina) == 0){
        if ($id_rutina!=-1){
            //Comparación de la rutina del formulario con la de la base de datos
            $existe_rutina_resultado = existe_rutina($id_rutina,$nombre_rutina,$ejercicios_rutina);
            if($existe_rutina_resultado ==4){
                //Es una rutina editada
                $eje_rut= addslashes($ejercicios_rutina);
                //se inserta la rutina
                if (insertar_rutina($nombre_rutina, $eje_rut, $id_disciplina, $id_usuario)==1){
                    //Saber el id de la nueva rutina
                    $id_nueva_rutina = saber_id_rutina($nombre_rutina);
                    if($tipo_record==1){ //Peso
                        //Guardar la clase nueva
                        $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '$tipo_unidad',
                                          null)";
                        if ($db->query($clase_nueva) === true){
                            echo "7";
                        }else{
                            echo "8";
                        }
                    }
                    else if($tipo_record==2){ //Repeticiones / puntos
                        //Guardar la clase nueva
                        $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          null,
                                          '$tipo_unidad_puntos')";
                        if ($db->query($clase_nueva) === true){
                            echo "7";
                        }else{
                            echo "8";
                        }
                    }
                    else if ($tipo_record==3){ //Tiempo
                        //Guardar la clase nueva
                        $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          null,
                                          null)";
                        if ($db->query($clase_nueva) === true){
                            echo "7";
                        }else{
                            echo "8";
                        }
                    }
                }else{
                    echo "3";
                }
            }
            else if($existe_rutina_resultado==1){
                //No se modifico la rutina
                if($tipo_record==1){ //Peso
                    //Guardar la clase nueva
                    $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '$tipo_unidad',
                                          null)";
                    if ($db->query($clase_nueva) === true){
                        echo "7";
                    }else{
                        echo "8";
                    }
                }
                else if($tipo_record==2){ //Repeticiones / puntos
                    //Guardar la clase nueva
                    $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          null,
                                          '$tipo_unidad_puntos')";
                    if ($db->query($clase_nueva) === true){
                        echo "7";
                    }else{
                        echo "8";
                    }
                }
                else if ($tipo_record==3){ //Tiempo
                    //Guardar la clase nueva
                    $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          null,
                                          null)";
                    if ($db->query($clase_nueva) === true){
                        echo "7";
                    }else{
                        echo "8";
                    }
                }
            }
            else if($existe_rutina_resultado==2){
                //Rutina con el mismo nombre
                echo "4";
            }
            else if($existe_rutina_resultado==3){
                //Rutina con los mismo ejercicios
                echo "5";
            }
        }
        else{
            //Buscar si ya existe la rutina
            $existe_rutina_nueva_resultado = existe_rutina_nueva($nombre_rutina);
            if($existe_rutina_nueva_resultado==1){
                //Ya existe la rutina con ese nombre
                echo "4";
            }else{
                //se inserta la rutina
                $eje_rut= addslashes($ejercicios_rutina);
                if (insertar_rutina($nombre_rutina, $eje_rut, $id_disciplina, $id_usuario)==1){
                    //Saber el id de la nueva rutina
                    $id_nueva_rutina = saber_id_rutina($nombre_rutina);
                    if($tipo_record==1){ //Peso
                        //Guardar la clase nueva
                        $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          '$tipo_unidad',
                                          null)";
                        if ($db->query($clase_nueva) === true){
                            echo "7";
                        }else{
                            echo "8";
                        }
                    }
                    else if($tipo_record==2){ //Repeticiones / puntos
                        ///Guardar la clase nueva
                        $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          null,
                                          '$tipo_unidad_puntos')";
                        if ($db->query($clase_nueva) === true){
                            echo "7";
                        }else{
                            echo "8";
                        }
                    }
                    else if ($tipo_record==3){ //Tiempo
                        //Guardar la clase nueva
                        $clase_nueva = "INSERT INTO clases(id_clase,
                                            id_usuario_modificacion,
                                            id_rutina,
                                            titulo_clase,
                                            calentamiento,
                                            fecha_clase,
                                            hora_revelacion,
                                            id_tipo_record,
                                            id_tipo_unidad_peso,
                                            id_unidad_puntos)
                                    VALUES('0',
                                          '$id_usuario',
                                          '$id_nueva_rutina',
                                          '$titulo_clase',
                                          '$calentamiento',
                                          '$fechaa',
                                          '$hora_revelacion',
                                          '$tipo_record',
                                          null,
                                          null)";
                        if ($db->query($clase_nueva) === true){
                            echo "7";
                        }else{
                            echo "8";
                        }
                    }
                }else{
                    echo "3";
                }
            }
        }
    }else{
        echo "6";
    }
}