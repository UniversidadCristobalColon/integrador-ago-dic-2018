<?php
$id= htmlspecialchars($_GET['id']);

try {
    require_once ('../../scripts/config.php');
    ////RELLENA EL FORMULARIO DE DATOS DE USUARIO
    $sql = "SELECT * FROM `usuarios` WHERE `id_usuario` LIKE  '{$id}'";
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

    <div class="container">


        <?php while($registros = $resultado->fetch_assoc() ) { ?>
        <div class="row pb-5 p-5">
            <div class="col-md-6">
                <p class="font-weight-bold mb-4">Información del cliente</p>
                <p class="mb-1"><span class="text-muted">Nombre completo: </span><?php echo $registros['nombre_completo']; ?> </p>
                <p class="mb-1"><span class="text-muted">Correo electronico: </span><?php echo $registros['correo']; ?></p>
                <p class="mb-1"><span class="text-muted">Numero de telefono </span><?php echo $registros['telefono']; ?></p>
            </div>

            <?php  } ?>
        </div>

        <div class="row p-5">
            <div class="col-md-6 text-left">
                <p class="font-weight-bold mb-4">Historial de pagos del cliente</p>
            </div>
            <div class="col-md-12">
                <table id="example" class="table">
                    <thead>
                    <tr>
                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Descripcion</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Cantidad</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Costo</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mensualidad de Septiembre</td>
                        <td>1</td>
                        <td>$3452</td>
                        <td>25/11/2018</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mensualidad de Octubre</td>
                        <td>1</td>
                        <td>$2342</td>
                        <td>25/11/2018</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Mensualidad de Noviembre</td>
                        <td>1</td>
                        <td>$2343</td>
                        <td>25/11/2018</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
            <div class="py-3 px-5 text-right">
                <div class="mb-2">Total</div>
                <div class="h2 font-weight-light">$234,234</div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

    </div>


</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

