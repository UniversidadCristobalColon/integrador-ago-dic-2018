<?php

            require_once('../../../scripts/config.php');

                      $nombre_disciplina = $_POST["nombre_disciplina"];
                      $descripcion_disciplinas = $_POST["descripcion_disciplinas"];
                      $fecha_modificacion = $_POST["fecha_modificacion"];


                      $query = "INSERT INTO `disciplinas` (`id_disciplina`, `nombre_disciplina`, `descripcion_disciplinas`, `fecha_modificacion`) VALUES (NULL, '{$nombre_disciplina}', '{$descripcion_disciplinas}', '{$fecha_modificacion}')";

                        $result=mysqli_query($db,$query);
                if ($result === TRUE) {
                    $message = "La nueva disciplina se ha guardado.";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    ?>
                    <!--Redireccionamiento al index de egresos -->
                    <meta http-equiv="refresh" content="1;url=indexn.php">
                    <?php
                }
                else {
                    $message = "No se ha podido completar el registro de la nueva disciplina, inténtalo de nuevo." . $query . "<br>" . $db->error;
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }


?>





