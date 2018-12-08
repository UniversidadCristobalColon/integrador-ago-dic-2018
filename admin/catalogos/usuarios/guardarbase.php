<?php

//Recibir los datos y almacenarlos en variables

                $nombre = htmlspecialchars($_POST["nombre"]);
                $nombrecorto = htmlspecialchars($_POST["nombrecorto"]);
                $email = htmlspecialchars($_POST["email"]);
                $celular = htmlspecialchars ($_POST["celular"]);
                $telefono = htmlspecialchars ($_POST["telefono"]);
                $contrasena = htmlspecialchars ($_POST["contrasena"]);
                $contrasena2 = htmlspecialchars ($_POST["contrasena2"]);
                $con = password_hash($contrasena, PASSWORD_DEFAULT);
                $con2 = password_hash($contrasena2, PASSWORD_DEFAULT);
                $fecha = htmlspecialchars ($_POST["dia_pago"]);
                $tipo_usuario = htmlspecialchars ($_POST["tipo"]);
                $estado = "activo";


try {
    require_once('../../../scripts/config.php');

    $comprueba = "SELECT * FROM `usuarios` WHERE `nombre_corto` LIKE '{$nombrecorto}' ";
    $guardarbase = $db->query($comprueba);

    $num = $guardarbase->num_rows;

    if($num == 0){
        $sql = "INSERT INTO `usuarios` (`id_usuario`, `correo`, `contrasena`, `contrasena2`,`nombre_completo`, `nombre_corto`, `telefono`, `celular`, `nombre_emergencia`, `telefono_emergencia`, `estado`, `dias_pago`, `id_tipo_usuario`, `id_usuario_modificacion`, `fecha_creacion`, `fecha_modificacion`) VALUES (NULL,'{$email}','{$con}','{$con2}','{$nombre}','{$nombrecorto}','{$telefono}','{$celular}', NULL, NULL,'{$estado}','{$fecha}','{$tipo_usuario}', '{$_SESSION['user']}',NOW(), NOW())";
    }else{
        $repetido=1;
        header("Location: base.php?repetido=".$repetido);
    }

    if (mysqli_query($db, $sql)) {
        $success=1;
        header("Location: base.php?success=".$success);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
}
catch (Exception $e) {

}


?>



