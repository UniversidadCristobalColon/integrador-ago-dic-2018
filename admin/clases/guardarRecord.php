<?php

          $id = htmlspecialchars( $_POST['id_record'] );
          $peso = htmlspecialchars( $_POST['repeticiones_record'] );
          $altura = htmlspecialchars( $_POST['unidad_peso_record'] );
          $fecha = htmlspecialchars( $_POST['fecha_record'] );
          $fecha_record = date("Y-m-d",strtotime($fecha));
          $cintura = htmlspecialchars( $_POST['tiempo_record'] );
          $imc = htmlspecialchars( $_POST['peso_record'] );

          try {
              require_once('../../scripts/config.php');
              $insert = "INSERT INTO `Records` (`id_record`, `id_unidad_puntos`, `repeticiones`, `id_unidad_peso`, `peso`, `tiempo`, `fecha_creacion`, `id_horario`, `wod_id_wod`, `id_usuario`, `id_usuario_modificacion`, `eliminado`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL)";

            //  $sql = "UPDATE `expedientes` SET `peso` = '{$peso}', `altura` = '{$altura}',`cintura` = '{$cintura}', `IMC` = '{$imc}', `antecedentes_salud` = '{$salud}', `fecha_nacimiento` = '{$fecha_nacimiento}',`usuario_modifico` = '{$_SESSION['usuario']}' WHERE `usuarios_id_usuario` = '{$id}' ";
            //  $resultado = $db->query($sql);

             header("Location: generalExpediente.php?id=".$id);

          } catch (Exception $e) {

          }

          $db->close();

?>
