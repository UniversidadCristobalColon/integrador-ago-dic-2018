<?php require_once '../../../scripts/config.php' ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de gestión de Sarx Wellness Center">
    <meta name="author" content="UCC Sistemas">

    <title>Sarx Wellness Center</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="icon" href="../../../img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="../../../css/base.css" rel="stylesheet">

    <!-- Archivos JS -->
    <script src="../../../js/base.js"></script>

</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

    <div class="starter-template">
        <h1>Rutinas</h1>
<!--        <div class="alert alert-success alert-dismissible">-->
<!--            <button type="button" class="close" data-dismiss="alert">&times;</button>-->
<!--            <strong>Success!</strong> Indicates a successful or positive action.-->
<!--        </div>-->
        <a href="nueva.php" class="btn btn-success" role="button">+ Nueva</a>
        <p class="lead">
        <table id="example" class="table" style="width:100%">
            <thead>
            <tr>
                <th>Rutina</th>
                <th>Actualizada</th>
                <th>Disciplinas</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Judith</td>
                <td>hoy</td>
                <td>Crossfit</td>
                <td>
                    <a href="editar.php" class="btn btn-link" role="button">Editar</a>
                    <a href="editar.php" class="btn btn-link" role="button">Eliminar</a>
                </td>
            </tr>
            </tbody>
        </table>
        </p>
    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
