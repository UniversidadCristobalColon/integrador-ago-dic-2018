<?php require_once '../../../scripts/config.php' ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema de gestión de Sarx Wellness Center">
    <meta name="author" content="UCC Sistemas">

    <title>Sarx Wellness Center</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
        <h1>Editar egreso</h1>
        <p class="lead">
        <form action="guardarEditado.php" method="post">
            <button type="submit" class="btn btn-success">Guardar</button>
            <?php
            $xid = $_GET['xid'];
            $query="select * from egresos where id_egresos=$xid";
            $result=mysqli_query($db,$query);
            while ($row=mysqli_fetch_array($result)) {
            $descripcion = $row['descripcion_egresos'];
            $user = $row['id_usuario'];
            $importe = $row['importe'];
            $fecha = $row['fecha_modificacion'];
            ?>
            <input type="hidden" name="id" value="<?php echo $xid; ?>">
            <div class="row mb-3">
                <div class="col-md-10">
                    <br>
                    <label for="inputDescripcion">Descripción: </label>
                    <input type="text" name="descripcion" class="form-control" id="inputDescripcion" placeholder="Descripción" value="<?php echo $descripcion; ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="inputUsuario">Usuario: </label>
                    <select class="custom-select d-block w-100" name="user" id="usuario" required>
                        <option value="">Selecciona...</option>
                        <?php
                        $query="select * from usuarios WHERE id_usuario=$user";
                        $result=mysqli_query($db,$query);
                        while ($valores=mysqli_fetch_array($result)) {
                            echo '<option selected="true" value="'.$valores[id_usuario].'">'.$valores[nombre_corto].'</option>';
                        }
                        ?>
                        <?php
                        $query="select * from usuarios WHERE id_usuario!=$user";
                        $result=mysqli_query($db,$query);
                        while ($valores=mysqli_fetch_array($result)) {
                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_corto].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputMonto">Fecha: </label>
                    <input id="datepicker" name="fecha" value="<?php echo $fecha ?>">
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4',
                            format: 'yyyy-mm-dd'

                        });
                        $("#datepicker").attr("readonly", true);
                    </script>
                </div>
                <div class="col-md-3">
                    <label for="inputMonto">Monto: </label>
                    <input type="text" name="importe" class="form-control" id="inputMonto" placeholder="Monto" value="<?php echo $importe; ?>" required>
                </div>
            </div>
        </form>
        <?php
        }
        ?>
        </p>
    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>