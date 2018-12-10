<?php


          try {
              require_once('../../../scripts/config.php');

              $decodificar = $_POST['id_ficha'];
              $id = htmlspecialchars(decript($decodificar));
              $peso = htmlspecialchars( $_POST['peso'] );
              $altura = htmlspecialchars( $_POST['altura'] );
              $fecha = htmlspecialchars( $_POST['fecha_nacimiento'] );
              $fecha_nacimiento = date("Y-m-d",strtotime($fecha));
              $cintura = htmlspecialchars( $_POST['cintura'] );
              echo $cintura;
              $imc = htmlspecialchars( $_POST['imc'] );
              echo $imc;
              $salud = htmlspecialchars( $_POST['comentarios_salud'] );

              if($cintura == null){
                  $cintura = 0;
              }
              if($imc == null){
                  $imc = 0;
              }


              $sql = "UPDATE `expedientes` SET `peso` = '{$peso}', `altura` = '{$altura}',`fecha_nacimiento` = '{$fecha_nacimiento}',`cintura` = '{$cintura}', `IMC` = '{$imc}', `antecedentes_salud` = '{$salud}',`id_usuario_modificacion` = '{$_SESSION["id_usuario"]}' WHERE `id_usuario` = '{$id}' ";
              $resultado = $db->query($sql);

              $id2 = encript($id);

             header("Location: generalExpediente.php?id=".$id2);

          } catch (Exception $e) {

          }

          $db->close();

?>
