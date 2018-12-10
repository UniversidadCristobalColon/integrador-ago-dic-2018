<?php


          try {
              require_once('../../../scripts/config.php');


                        $decodificar = $_POST['id_datos'];
                        $id = htmlspecialchars(decript($decodificar));
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


              $sql = "UPDATE `usuarios` SET `correo` = '{$correo}', `nombre_completo` = '{$nombre_completo}',`nombre_corto` = '{$nombre_corto}',";
              $sql .= "`telefono` = '{$telefono}',`celular` = '{$celular}',  `nombre_emergencia` = '{$nombre_emergencia}',";
              $sql .= "`telefono_emergencia` = '{$telefono_emergencia}',`id_usuario_modificacion`= '{$_SESSION["id_usuario"]}',`fecha_modificacion`= NOW() WHERE `id_usuario` = '{$id}'";
              echo $sql;
              $resultado = $db->query($sql);

            $id2 = encript($id);

            header("Location: generalExpediente.php?id=".$id2);

          } catch (Exception $e) {

          }

          $db->close();

?>
