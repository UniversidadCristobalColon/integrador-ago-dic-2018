<?php
require 'scripts/conexionlog.php';
include 'funcs.php';
	
	session_start(); //Iniciar una nueva sesión o reanudar la existente
	
	if((isset($_SESSION["id_usuario"]))&&($_SESSION["id_tipo_usuario"] == 1)){ //En caso de existir la sesión redireccionamos
		header("Location: admin/index.php");
	}if((isset($_SESSION["id_usuario"]))&&($_SESSION["id_tipo_usuario"] == 2)){ //En caso de existir la sesión redireccionamos
		header("Location: user/index.php");
	}
	
	$errors = array();                                                         
	
	if(!empty($_POST))
	{
		$usuario = $mysqli->real_escape_string($_POST['usuario']);
		$password = $mysqli->real_escape_string($_POST['password']);
		
		if(isNullLogin($usuario, $password))
		{
			$errors[] = "Debe llenar todos los campos";
		}
		
		$errors[] = login($usuario, $password);	
	}
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Sistema de gestión de Sarx Wellness Center">
    <meta name="author" content="UCC Sistemas">

    <title>Sarx Wellness Center</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="icon" href="img/favicon.png">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>SARX</title>


	<!-- Custom styles for this template -->
	<link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

    <!-- Archivos JS -->
      
    <script src="js/base.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
  </head>

  <body>

    <div class="main">
    
         
         <form id="formLg" class="form-signin" role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
         
    <label><img class="mb-4" src="img/logoSarx.png" alt="" width="300" height="160" style="text-align: center"></label>
	<h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
         
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" name="usuario" pattern="[A-Za-z0-9_-@.-]{1,15}" required autofocus>
         
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" class="form-control" placeholder="Contraseña"  name="password"  maxlength="30"  required>
	<div class="checkbox mb-3">
        
		<label>
            <a href="recuperarpass.php" class="resultado" target="_blank">  ¿Se le olvido su contraseña?</a>
		</label>
	</div>
             <button id="btn-login" type="submit" class="btn btn-success">Iniciar Sesi&oacute;n</button>     
  
    <span id="result"></span>
         
</form>
    <?php echo resultBlock($errors); ?>
    </div>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      

  </body>
</html>

