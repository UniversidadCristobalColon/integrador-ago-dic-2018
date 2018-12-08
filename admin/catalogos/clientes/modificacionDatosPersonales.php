<?php

          $decodificar = $_POST['id_datos'];
          $id = htmlspecialchars(base64_decode($decodificar));
          $nombre_completo = htmlspecialchars( $_POST['nombre_completo'] );
          $nombre_corto = htmlspecialchars( $_POST['nombre_corto'] );
          $correo = htmlspecialchars( $_POST['correo'] );
          $telefono = htmlspecialchars( $_POST['telefono'] );
          $celular = htmlspecialchars( $_POST['celular'] );
          $nombre_emergencia = htmlspecialchars( $_POST['nombre_emergencia'] );
          $telefono_emergencia = htmlspecialchars( $_POST['telefono_emergencia'] );

          if($telefono == null){
            $telefono = 0;
          }


          try {
              require_once('../../../scripts/config.php');
              $sql = "UPDATE `usuarios` SET `correo` = '{$correo}', `nombre_completo` = '{$nombre_completo}',`nombre_corto` = '{$nombre_corto}', `telefono` = '{$telefono}',`celular` = '{$celular}',  `nombre_emergencia` = '{$nombre_emergencia}', `telefono_emergencia` = '{$telefono_emergencia}',`id_usuario_modificacion`= '{$_SESSION["user"]}',`fecha_modificacion`= NOW() WHERE `id_usuario` = '{$id}' ";
              echo $sql;
              $resultado = $db->query($sql);

            $id2 = base64_encode($id);

            header("Location: generalExpediente.php?id=".$id2);

          } catch (Exception $e) {

          }

          $db->close();

?>
