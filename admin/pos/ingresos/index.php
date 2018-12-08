<?php require_once '../../../scripts/config.php' ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de gestión de Sarx Wellness Center">
    <meta name="author" content="UCC Sistemas">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="icon" href="../../../img/favicon.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css"/>

    <!-- Hojas de estilos -->
    <link href="../../../css/base.css" rel="stylesheet">

    <!-- Archivos JS -->
    <script src="../../../js/base.js"></script>

    <!--------- links DataTables --------->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabla').DataTable();
            $('.datepicker').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });
            $(".datepicker").attr("readonly", true);
            $('.datepicker1').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });
            $(".datepicker1").attr("readonly", true);
        });
    </script>

</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

    <?php
    $fecha1 = !empty($_GET['fecha1']) ? $_GET['fecha1'] : date('Y-m-01');
    $fecha2 = !empty($_GET['fecha2']) ? $_GET['fecha2'] : date('Y-m-t');
    ?>

    <div class="starter-template">
        <h1>Ingresos</h1>

        <form action="index.php" method="get">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="agrega_ingreso.php" class="btn btn-success" role="button">Nuevo ingreso</a>
                    <button type="submit" class="btn btn-primary" formaction="pdf.php" formmethod="post"
                            formtarget="_blank">Exportar</button>
                </div>
            </div>
            <div class="row mb-3 align-items-end">
                <div class="col-md-3">
                    <label for="inputFecha1">De: </label>
                    <input class="datepicker" name="fecha1" value="<?php echo $fecha1 ?>">
                    <script>
                    </script>
                </div>
                <div class="col-md-3">
                    <label for="inputFecha2">A: </label>
                    <input class="datepicker1" name="fecha2" value="<?php echo $fecha2 ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success" formaction="index.php">Consultar</button>
                </div>
            </div>
        </form>
        <br>
        <table id="tabla" class="table" style="width:100%">
            <thead>
            <tr>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Importe</th>
                <th>Cliente</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "select id_ingresos,
                descripcion_ingresos,
                ingresos.id_usuario AS idingreuser,
                ingresos.id_cliente AS idingrecli,
                cantidad,
                importe,
                ingresos.fecha_modificacion AS ingrefecha,
                nombre_corto 
                from ingresos INNER JOIN usuarios on usuarios.id_usuario = ingresos.id_usuario WHERE ingresos.fecha_modificacion between '$fecha1' AND '$fecha2'";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_array($result)) {
                $id = $row['id_ingresos'];
                $descripcion = $row['descripcion_ingresos'];
                $user = $row['idingreuser'];
                $cliente = $row['idingrecli'];
                $monto = $row['importe'];
                $importe = number_format($monto,2);
                $cantidad = $row['cantidad'];
                $fecha = $row['ingrefecha'];
                $usuario = $row['nombre_corto'];
                ?>
                <tr>
                    <td><?php echo $descripcion ?></td>
                    <td><?php echo $cantidad ?></td>
                    <td><?php echo $importe ?></td>
                    <td><?php echo $cliente ?></td>
                    <td><?php echo $usuario ?></td>
                    <td><?php echo $fecha ?></td>
                    <td>
                        <a href="edita_ingreso.php?xid=<?php echo $id; ?>" class="btn btn-link" role="button">Editar</a>
                        <a href="eliminar_ingreso.php?xid=<?php echo $id; ?>" class="btn btn-link" role="button"
                           onclick='return confirm("¿Está seguro que quiere eliminar este ingreso?");'>Eliminar</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>