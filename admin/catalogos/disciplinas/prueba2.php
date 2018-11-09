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
    <button type="button" class="btn btn-success">Nueva</button>


<hr>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>




    <div class="container" style="padding-top: 1em;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Rutina</th>
                <th>Actualización</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Denisse</td>
                <td>2018-11-01</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Marlen</td>
                <td>2018-11-01</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pamela</td>
                <td>2018-11-01</td>
                <td>@twitter</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Diana</td>
                <td>2018-11-01</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Fatima</td>
                <td>2018-11-01</td>
                <td>@fat</td>
            </tr>
            </tbody>
        </table>
    </div>

<br><br><br>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
            </li>
        </ul>
    </nav>



</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
