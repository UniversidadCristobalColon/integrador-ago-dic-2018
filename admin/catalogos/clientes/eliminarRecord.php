
<?php


        try {
            require_once('../../../scripts/config.php');

            $decodificar = ($_GET['id']);
            $id= htmlspecialchars(decript($decodificar));

            $decodifica = ($_GET['id2']);
            $id2= htmlspecialchars(decript($decodifica));

            $sql =  "DELETE FROM `records` WHERE `records`.`id_record` = '{$id}' ";
            $resultado = $db->query($sql);

            $id3 = encript($id2);

           header("Location: generalExpediente.php?id=".$id3);

        } catch (Exception $e) {

        }

        $db->close();


?>
