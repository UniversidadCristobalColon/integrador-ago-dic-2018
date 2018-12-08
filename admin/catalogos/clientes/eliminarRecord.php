
<?php
        $decodificar = ($_GET['id']);
        $id= htmlspecialchars(base64_decode($decodificar));

        $decodifica = ($_GET['id2']);
        $id2= htmlspecialchars(base64_decode($decodifica));

        try {
            require_once('../../../scripts/config.php');

            $sql =  "DELETE FROM `records` WHERE `records`.`id_record` = '{$id}' ";
            $resultado = $db->query($sql);

            $id3 = base64_encode($id2);

           header("Location: generalExpediente.php?id=".$id3);

        } catch (Exception $e) {

        }

        $db->close();


?>
