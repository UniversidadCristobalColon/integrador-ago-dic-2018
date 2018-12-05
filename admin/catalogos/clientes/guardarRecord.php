<?php

          $decodificar = $_POST['id_nuevo_record'];
          $id = htmlspecialchars(base64_decode($decodificar));
          $wod = htmlspecialchars( $_POST['wod'] );
          $fecha = htmlspecialchars( $_POST['fecha_record'] );
          $fecha_record = date("Y-m-d",strtotime($fecha));
          $repeticiones = htmlspecialchars( $_POST['repeticiones_record'] );
          $repeticiones;
          $unidad_peso = htmlspecialchars( $_POST['unidad_peso_record'] );
          $peso_record = htmlspecialchars( $_POST['peso_records'] );
          $peso_record;
          $hora = htmlspecialchars( $_POST['tiempo_record_hora'] );
          $tipo = htmlspecialchars( $_POST['tipo'] );
          $minutos = htmlspecialchars( $_POST['tiempo_record_minutos'] );
          $segundos = htmlspecialchars( $_POST['tiempo_record_segundos'] );
          $puntos = ":";

          if($peso_record  == null){
            $peso_record  = 0;
          }

          if($repeticiones == null){
            $repeticiones = 0;
          }

          if($hora == NULL){
            $hora="00";
          }
          if($minutos == NULL){
            $minutos="00";
          }
          if($segundos == NULL){
            $segundos="00";
          }

          $nuevo = $hora.$puntos.$minutos.$puntos.$segundos;


          try {
              require_once('../../../scripts/config.php');

               $sql =  "INSERT INTO `records` (`id_record`,`id_rutina` ,`id_tipo_record`, `id_unidad_puntos`, `repeticiones/puntos`, `id_unidad_peso`, `peso`, `tiempo`, `fecha_creacion`, `id_usuario`, `id_clase`) VALUES (NULL,'{$wod}','{$tipo}',NULL, '{$repeticiones}', '{$unidad_peso}', '{$peso_record}', '{$nuevo}','{$fecha_record}','{$id}', NULL)";
               $resultado = $db->query($sql);

              $id2 = base64_encode($id);

             header("Location: generalExpediente.php?id=".$id2);

          } catch (Exception $e) {

          }

          $db->close();

?>
