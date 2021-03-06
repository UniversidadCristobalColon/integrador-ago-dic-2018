<?php
try {
    require_once('../../scripts/config.php');
    $_SESSION['user'] = 4;
    $sql = 'SELECT * FROM usuarios LIMIT 50';
    $resultado = $db->query($sql);
} catch (Exception $e) {
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

    <link rel="icon" href="../../img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="../../css/base.css" rel="stylesheet">

    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">

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



            <!-- LIST -->
            <div class=col-md-12>

                <form id="form-list-client">
                    <legend>Situación de los clientes</legend>

                    <div class="pull-right">
                        <a href="situacion_clientes.php" class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Actualizar</a>
                        <a href="index.php" target="_blank" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-back"></i> Historial de pagos</a>
                    </div>
                    <table  id="example" class="table table-bordered table-condensed table-hover">
                        <thead>
                        <tr>
                            <td>Nombre</td>
                            <th>Correo electronico</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                        </thead>
                        <tbody id="form-list-client-body">

                        <?php while($registros = $resultado->fetch_assoc() ) { ?>
                            <tr id="<?php $registros['id_usuario']; ?>">
                                <td><?php echo $registros['nombre_completo']; ?></td>
                                <td><?php echo $registros['correo']; ?></td>
                                <td><?php echo $registros['estado']; ?></td>
                                <td>
                                    <a title="Ver este usuario" href="estado_cliente.php?id=<?php echo $registros['id_usuario']; ?>" target="_blank" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>



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
