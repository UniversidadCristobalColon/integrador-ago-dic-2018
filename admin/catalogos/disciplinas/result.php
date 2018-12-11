<?php

            require_once('../../../scripts/config.php');

                      $nombre_disciplina = $_POST["nombre_disciplina"];
                      $descripcion_disciplinas = $_POST["descripcion_disciplinas"];


                      $query = "INSERT INTO `disciplinas` (`id_disciplina`, `nombre_disciplina`, `descripcion_disciplinas`, `fecha_modificacion`) VALUES (NULL, '{$nombre_disciplina}', '{$descripcion_disciplinas}',NOW())";

                      $result=mysqli_query($db,$query);
                if ($result === TRUE) {?>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                    <div id="anuncio" class="alert alert-success mb-3"> ¡La nueva disciplina ha sido registrada correctamente!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="location.href='indexn.php'" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                    <!--Redireccionamiento al index de disciplinas -->

                    <?php
                }
                else {
                    $message = "No se ha podido completar el registro de la nueva disciplina, inténtalo de nuevo." . $query . "<br>" . $db->error;
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
?>





