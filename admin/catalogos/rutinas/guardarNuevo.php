<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 07/11/2018
 * Time: 08:30 AM
 */

require_once '../../../scripts/config.php';
$titulo = $_POST["titulo"];
$disciplina = $_POST["disciplina"];
$contenido = $_POST["contenido"];

$query = "INSERT INTO rutinas (
                            id,
                            titulo, 
                            id_disciplina, 
                            contenido, 
                            actualizacion) VALUES (
                                    null,
                                    '$titulo',
                                    '$disciplina',
                                    '$contenido',
                                    NOW()
                                    )";

$result=$db->query($query);

if ($db->query($query) === TRUE) {
    echo "Los datos se han guardado, serás redirigido a la página principal.";

    ?>
    <!--Redireccionamiento al index de rutinas -->
    <meta http-equiv="refresh" content="1;url=index.php">
    <?php
}
//Mostrar error
else {
    echo "No se ha podido completar el registro, inténtalo de nuevo." . $query . "<br>" . $db->error;
}