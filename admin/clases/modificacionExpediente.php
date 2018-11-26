<?php

          $id = htmlspecialchars( $_POST['id_ficha'] );
          $peso = htmlspecialchars( $_POST['peso'] );
          $altura = htmlspecialchars( $_POST['altura'] );
          $fecha = htmlspecialchars( $_POST['fecha_nacimiento'] );
          $fecha_nacimiento = date("Y-m-d",strtotime($fecha));
          $cintura = htmlspecialchars( $_POST['cintura'] );
          $imc = htmlspecialchars( $_POST['imc'] );
          $salud = htmlspecialchars( $_POST['comentarios_salud'] );

          try {
              require_once('../../scripts/config.php');

              $sql = "UPDATE `expedientes` SET `peso` = '{$peso}', `altura` = '{$altura}',`cintura` = '{$cintura}', `IMC` = '{$imc}', `antecedentes_salud` = '{$salud}', `fecha_nacimiento` = '{$fecha_nacimiento}',`id_usuario_modificacion` = '{$_SESSION['user']}' WHERE `id_usuario` = '{$id}' ";
              $resultado = $db->query($sql);

             header("Location: generalExpediente.php?id=".$id);

          } catch (Exception $e) {

          }

          $db->close();

?>
