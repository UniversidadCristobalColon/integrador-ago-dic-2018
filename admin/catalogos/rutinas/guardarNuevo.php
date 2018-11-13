<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 07/11/2018
 * Time: 08:30 AM
 */

require("conexion.php");
$titulo = $_POST["titulo"];
$disciplina = $_POST["disciplina"];
$contenido = $_POST["contenido"];

$query = "INSERT INTO rutinas (
                            id_rutina,
                            titulo, 
                            disciplina, 
                            contenido, 
                            fecha) VALUES (
                                    null,
                                    '$titulo',
                                    '$disciplina',
                                    '$contenido',
                                    NOW()
                                    )";

$result=pg_query($dbcon,$query);

if ($conn->query($query) === TRUE) {
    echo "Los datos se han guardado, serás redirigido a la página principal.";

    ?>
    <!--Redireccionamiento al perfil del alumno -->
    <meta http-equiv="refresh" content="1;url=index.php">
    <?php
}
//Mostrar error
else {
    echo "No se ha podido completar el registro, inténtalo de nuevo." . $query . "<br>" . $conn->error;
}