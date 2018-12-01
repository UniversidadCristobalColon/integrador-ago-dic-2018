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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <!-- Archivos JS -->
    <script src="../../../js/funciones.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../../js/base.js"></script>
    <script src="../../../js/tablas.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

</head>


<body>

<?php require_once '../../../scripts/navbar.php' ?>



<main role="main" class="container">


    <button type="button" onclick="location.href='prueba3.php'" class="btn btn-success">Nueva</button>


<hr>





    <div class="container" style="padding-top: 1em;">
        <table id="example" class="table table-striped">
            <thead class="thead-dark" >
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Disciplina</th>
                <th scope="col">Actualización</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Yoga</td>
                <td>2018-11-01</td>
                <td><a href="editar.php"><ion-icon size="large" name="create"><ion-icon></a> </td>
                <td><a href="delete.php"><ion-icon size="large" name="trash"><ion-icon></a> </td>


            </tr>
            <tr>
                <td>2</td>
                <td>Crossfit</td>
                <td>2018-11-01</td>
                <td><a href="editar.php"><ion-icon size="large" name="create"><ion-icon></a> </td>
                <td><a href="eliminar.php"><ion-icon size="large" name="trash"><ion-icon></a> </td>


            </tr>
            <tr>
                <td>3</td>
                <td>Spinning</td>
                <td>2018-11-01</td>
                <td><a href="editar.php"><ion-icon size="large" name="create"><ion-icon></a> </td>
                <td><a href="eliminar.php"><ion-icon size="large" name="trash"><ion-icon></a> </td>


            </tr>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>





</main>

<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
