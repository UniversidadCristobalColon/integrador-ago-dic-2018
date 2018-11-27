<?php
session_start();

if(isset($_SESSION['correo'])){
    if($_SESSION['correo']['id_tipo_usuario'] == "1"){
        header('Location: admin/index.php/');
        
    }else if($_SESSION['correo']['id_tipo_usuario'] == "2"){
        header('Location: user/index.php/');
    }
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

	<!-- Bootstrap core CSS -->
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

    <!-- Archivos JS -->
      
    <script src="js/base.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      
  </head>
    
  <body>
    <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
    </div>
      
      
    
    <div class="main">
     <form class="form-signin" action="" method="post" id="formLg" >
         
    <label><img class="mb-4" src="img/logoSarx.png" alt="" width="300" height="160" style="text-align: center"></label>
	<h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
         
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" name="usuariolg" pattern="[A-Za-z0-9_-@.-]{1,15}" required autofocus>
         
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" class="form-control" placeholder="Contraseña"  name="passlg" pattern="[A-Za-z0-9_-]{1,15}"  required>
	<div class="checkbox mb-3">
        
		<label>
            <a href="recuperarpass.php" class="resultado" target="_blank">  ¿Se le olvido su contraseña?</a>
		</label>
	</div>
    <input type="submit" class="botonlg"  value="Iniciar Sesion" >
	
  
    <span id="result"></span>
         
</form>
    </div>
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
  </body>
    
</html>




<?php

/*<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
</head>

<body class="text-center">
<form class="form-signin" action="" method="post" id="formLg" >
    <label><img class="mb-4" src="img/logo2.png" alt="" width="300" height="160" style="text-align: center"></label>
	<h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" name="usuariolg" required autofocus>
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" id="password" name="passlg"required>
	<div class="checkbox mb-3">
		<label>
            <a href="recuperarpass.php" class="resultado" target="_blank">  Se le olvido su contraseña?</a>
		</label>
	</div>
    <input type="submit" class="botonlg"  value="Iniciar Sesion" >
	<button class="btn btn-lg btn-primary btn-block"  >Entrar</button>
  
    <span id="result"></span>
</form>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
        */
        ?>