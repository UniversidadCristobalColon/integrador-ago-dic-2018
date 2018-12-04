<?php

          $id = htmlspecialchars( $_POST['id_datos'] );
          $nombre_completo = htmlspecialchars( $_POST['nombre_completo'] );
          $correo = htmlspecialchars( $_POST['correo'] );
          $telefono = htmlspecialchars( $_POST['telefono'] );
          $celular = htmlspecialchars( $_POST['cel'] );
          $nombre_emergencia = htmlspecialchars( $_POST['nombre_emergencia'] );
          $telefono_emergencia = htmlspecialchars( $_POST['telefono_emergencia'] );


          try {
              require_once('../../scripts/config.php');
              $sql = "UPDATE `usuarios` SET `correo` = '{$correo}', `nombre_completo` = '{$nombre_completo}', `telefono` = '{$telefono}',`celular` = '{$celular}',  `nombre_emergencia` = '{$nombre_emergencia}', `telefono_emergencia` = '{$telefono_emergencia}',`id_usuario_modificacion`= '{$_SESSION["user"]}',`fecha_modificacion`= NOW() WHERE `id_usuario` = '{$id}' ";
              $resultado = $db->query($sql);

              header("Location: generalExpediente.php?id=".$id);

          } catch (Exception $e) {

          }

          $db->close();

?>
