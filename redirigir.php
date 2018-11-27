<?php
include("scripts/config.php");
//variables del formulario de index.php
$user=$_POST["username"];
$pass=$_POST["password"];

echo $user;
echo $pass;

//Selecciona los usuarios que coincidan con el usuario
$sql1="SELECT * FROM sarx_db.usuarios WHERE correo='$user'";

//Ejecuta el query
$resul=$db->query($sql1);

//Si arrojó más de un resultado inicia sesión
if($resul->num_rows>0){
    $row=$resul->fetch_array(MYSQLI_ASSOC);
    //Si el tipo de usuario es 1, el usuario inicia sesión
    if($row["password"]==$pass and $row["tipo_usuario"]==1 and $row['estado']=='activo'){
        session_start();
        $_SESSION['loggin']=true;
        $_SESSION['username']=$user;
        //  $_SESSION["fullname"]=utf8_encode($row["fullname"]);
        $_SESSION['start']=time();
        $_SESSION['expire']=$_SESSION['start']+5*60;


        echo "Bienvenido ".$_SESSION["username"].", serás redirigido a la página principal del administrador.";
        header("Location:admin/index.php");


    }
    //Si el tipo de usuario es 2, cliente inicia sesión
    else if($row['password']==$pass and $row["tipo_usuario"]==2 and  $row['estado']=='activo'){
        session_start();
        $_SESSION["loggin"]=true;
        $_SESSION["username"]=$user;
        //  $_SESSION["fullname"]=utf8_encode($row["fullname"]);
        $_SESSION["start"]=time();
        $_SESSION["expire"]=$_SESSION["start"]+5*60;

        echo "Bienvenido ".$_SESSION["username"].", serás redirigido a la pagina principal de cliente.";
        header("Location:user/index.php");

    }
    else{ echo "Contraseña incorrecta.";

        ?>
        <meta http-equiv="refresh" content="1;url=index.php">
        <?php

    }
}else{ echo "Nombre del usuario incorrecto";

    echo'$("#inputEmail").before($("<h3>Lista de días</h3>"))';
    ?>
    <meta http-equiv="refresh" content="6;url=index.php">
    <?php

}
?>