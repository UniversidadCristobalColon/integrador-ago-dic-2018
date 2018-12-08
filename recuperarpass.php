<?php 

    require 'scripts/conexionlog.php';
	include 'funcs.php';
	
	session_start();
	
	if((isset($_SESSION["id_usuario"]))&&($_SESSION["id_tipo_usuario"] == 1)){ //En caso de existir la sesión redireccionamos
		header("Location: admin/index.php");
	}if((isset($_SESSION["id_usuario"]))&&($_SESSION["id_tipo_usuario"] == 2)){ //En caso de existir la sesión redireccionamos
		header("Location: user/index.php");
	}
	
	$errors = array();
	
	if(!empty($_POST))
	{
		$email = $mysqli->real_escape_string($_POST['email']);
		
		if(!isEmail($email))
		{
			$errors[] = "Debe ingresar un correo electronico valido";
		}
        if(emailExiste($email))
		{			
			$user_id = getValor('id_usuario', 'correo', $email);
			$nombre = getValor('nombre_completo', 'correo', $email);
			
         
			$token = generaTokenPass($user_id);
			
			$url = 'http://'.$_SERVER["SERVER_NAME"].'/int7/newpass.php?user_id='.$user_id.'&token='.$token;
			
			$asunto = 'Recuperar Password - Sistema de Usuarios';
			$cuerpo = "Hola $nombre: <br /><br />   Se ha solicitado un reinicio de contrase&ntilde;a. <br/><br/>Para restaurar la contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";
			
			if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
				echo "Hemos enviado un correo electronico a las direcion $email para restablecer tu password.<br />";
				echo "<a href='index.php' >Iniciar Sesion</a>";
				exit;
			}else{$errors[] = "error en enviar correo";}
			} else {
			$errors[] = "La direccion de correo electronico no existe";
		}
	}
	
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de gestión de Sarx Wellness Center">
    <meta name="author" content="UCC Sistemas">

    <title>Sarx Wellness Center</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="icon" href="img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="css/recuperarpass.css" rel="stylesheet">

    <!-- Archivos JS -->
    <script src="js/base.js"></script>



</head>

<body>

<?php $navbar = '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Sarx</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    
</nav>';
echo $navbar?>

<main role="main" class="container">


<div class="container">
    
   <!--   <form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">-->
    <form class="form-signin" id="loginform" ole="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
    <div class="cuadro">


        <h3>Recuperar Contraseña</h3>
        <br>
        <p>Ingrese su correo electronico para poder cambiar su contraseña.</p>
        
        
        
        
        
        <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico"  name="email" required autofocus>



        <br>

        <button class="btn btn-lg btn-primary" type="submit">Enviar Correo</button>
        
        
        
        
    </div>
    </form>
     <?php echo resultBlock($errors); ?>
</div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>