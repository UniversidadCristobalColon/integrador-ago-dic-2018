<?php require_once '../../scripts/config.php' ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de gestión de Sarx Wellness Center">
    <meta name="author" content="UCC Sistemas">

    <title>Sarx Wellness Center</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="icon" href="../../img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="../../css/base.css" rel="stylesheet">

    <!-- Archivos JS -->
    <script src="../../js/base.js"></script>

    <!--Data table -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
    </script>
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>

</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">

    <div class="container">
        <div class="row">

            <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">

            <!-- LIST -->
            <div class=col-md-12>

                <form id="form-list-client">
                    <legend>Situación de los clientes</legend>

                    <div class="pull-right">
                        <a href="situacion_clientes.php" class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Actualizar</a>
                        <a href="index.php" class="btn btn-default-btn-xs btn-danger"><i class="glyphicon glyphicon-back"></i> Regresar</a>
                    </div>
                    <table class="table table-bordered table-condensed table-hover">
                        <thead>
                        <tr>
                            <td>Nombre</td>
                            <th>Correo electronico</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                        </thead>
                        <tbody id="form-list-client-body">
                        <tr>
                            <td>Eduardo</td>
                            <td>eluz@counterpath.com</td>
                            <td>Activo</td>
                            <td>
                                <a title="Ver este usuario" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                                <a title="Editar este usuario" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                                <a title="Borrar este usuario" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>


            </div>


            <br>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
