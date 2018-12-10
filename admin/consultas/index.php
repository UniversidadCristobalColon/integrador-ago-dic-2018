<?php
try {
    require_once('../../scripts/config.php');
    $_SESSION['user'] = 4;
    $sql = 'SELECT id_ingresos, descripcion_ingresos, u.nombre_completo, u.correo, importe FROM ingresos i LEFT JOIN usuarios u ON i.id_usuario = u.id_usuario';
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

    <div class="starter-template">
        <h1>Historial de pagos</h1>

    </div>

    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table id="example" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th>Nombre completo</th>
                        <th>Correo Electronico</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while($registros = $resultado->fetch_assoc() ) { ?>

                        <tr>
                            <td><?php echo $registros['id_ingresos']; ?></td>
                            <td><?php echo $registros['descripcion_ingresos']; ?></td>
                            <td><?php echo $registros['nombre_completo']; ?></td>
                            <td><?php echo $registros['correo']; ?></td>
                            <td>n/a</td>
                            <td><?php echo $registros['importe']; ?></td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
