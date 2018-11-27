<?php require_once 'scripts/config.php' ?>
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
        <form class="form-signin">
            <div class="cuadro">


                <h3>Cambio de Contraseña</h3>
                <br>
                <p>Ingrese nueva contraseña.</p>

                <input type="password" id="inputpass" class="form-control" placeholder="Nueva Contraseña" name="newpass" required autofocus>
                <br>
                <input type="password" id="inputpass" class="form-control" placeholder="Confirmar nueva Contraseña" name="newcpass" required autofocus>



                <br>

                <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>