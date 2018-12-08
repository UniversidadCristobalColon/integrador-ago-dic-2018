<?php
require_once '../../../scripts/config.php';

$id_disciplina = $_GET["xid"];

$sql = "select * from disciplinas where id_disciplina = $id_disciplina";
$res = mysqli_query($db, $sql);
if($res){
    $f = mysqli_fetch_assoc($res);
    $nombre_disciplina = $f["nombre_disciplina"];
    $descripcion_disciplinas = $f["descripcion_disciplinas"];

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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="icon" href="../../../img/favicon.png">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Hojas de estilos -->
    <link href="../../../css/base.css" rel="stylesheet">

    <!-- Archivos JS -->
    <script src="../../../js/base.js"></script>

</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

    <div class="starter-template">
        <h2>Editar Disciplina</h2>
        <p class="lead">
        <form action="guardarEdit.php" method="post">
            <button type="submit" onclick="location.href='indexn.php'" class="btn btn-success">Guardar</button>
            <?php
            $xid = $_GET['xid'];
            $query="select * from disciplinas where id_disciplina=$xid";
            $result=mysqli_query($db,$query);
            while ($row=mysqli_fetch_array($result)) {
            $nombre_disciplina = $row['nombre_disciplina'];
            $descripcion_disciplinas = $row['descripcion_disciplinas'];
            $fecha_modificacion = $row['fecha_modificacion'];
            ?>
            <input type="hidden" name="id" value="<?php echo $xid; ?>">
            <br><br>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" class="form-control" name="nombre_disciplina" placeholder="Ejemplo: CrossFit" value="<?php echo $nombre_disciplina ?>">
                </div>
                <div class="col-md-6">

                    <label for="inputMonto">Fecha: </label>
                    <input id="datepicker" class="form-control" readonly name="fecha_modificacion" value="<?php echo $fecha_modificacion ?>">
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4',
                            format: 'yyyy-mm-dd'
                            changeMonth:true,
                            changeYear:true,
                        });
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Agregar una nueva descripción</label>
                <textarea class="form-control" name="descripcion_disciplinas" rows="3"><?php echo $descripcion_disciplinas ?></textarea>
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