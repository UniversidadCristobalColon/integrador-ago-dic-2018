<?php
    require_once '../../scripts/config.php';
    $id_asis = $_REQUEST['id'];
    $id_clase = $_REQUEST['idc'];
    echo $id_clase;
    $update_asis = "UPDATE asistencias 
                    SET asistencia='0'
                    WHERE id_asistencia=$id_asis";
    echo $update_asis;
    if ($db->query($update_asis) === true) {
        header("Location: infoclass.php?id=$id_clase");
    }else {
        echo "Ocurrió un error al momento de eliminar la asistencia.";
        ?>
        <meta http-equiv="refresh" content="3;url=infoclass.php?id=<?php echo $id_clase; ?>">
        <?php
    }