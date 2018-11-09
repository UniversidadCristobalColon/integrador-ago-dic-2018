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

</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">

    <div class="starter-template">
        <h1>Historial de pagos</h1>

        <div class="pull-right">
            <a href="index.php" class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Actualizar</a>
            <a href= "situacion_clientes.php" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-back"></i> Estado de los clientes</a>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Pago</th>
                        <th>Nombre completo</th>
                        <th>Correo Electronico</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mensualidad mes de Octubre</td>
                        <td>Waqas Hussain</td>
                        <td>example@mirchu.net</td>
                        <td>11/6/2018</td>
                        <td>$899.00</td>
                        <td><span class="label label-info">Procesando pago</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mensualidad mes de Octubre</td>
                        <td>Basit Raza</td>
                        <td>example@bugpluss.com</td>
                        <td>10/6/2018</td>
                        <td>$621.00</td>
                        <td><span class="label label-danger">Retrasado</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mensualidad mes de Octubre</td>
                        <td>Raza Ahmed</td>
                        <td>example@therazz.net</td>
                        <td>11/9/2018</td>
                        <td>$640.00</td>
                        <td><span class="label label-info">Procesando pago</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Botella de agua</td>
                        <td>Mirchu net</td>
                        <td>example@mirchu.net</td>
                        <td>11/6/2018</td>
                        <td>$12.00</td>
                        <td><span class="label label-success">Pagado</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
