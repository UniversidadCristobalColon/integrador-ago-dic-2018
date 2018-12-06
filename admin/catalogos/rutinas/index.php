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
            $('#example').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            });
        } );

        function confirmar() {
            return confirm("¿Estás seguro que quieres eliminar esta rutina? ");
        }
    </script>

</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

    <div class="starter-template">
        <h1>Rutinas</h1>
<!--        <div class="alert alert-success alert-dismissible">-->
<!--            <button type="button" class="close" data-dismiss="alert">&times;</button>-->
<!--            <strong>Success!</strong> Indicates a successful or positive action.-->
<!--        </div>-->
        <a href="nueva.php" class="btn btn-success mb-3" role="button">Nueva</a>

        <table id="example" class="table">
            <thead>
            <tr>
                <th width="25%">Rutina</th>
                <th>Disciplina</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query="select * from rutinas";
            $result=mysqli_query($db,$query);
            while ($row=mysqli_fetch_assoc($result)) {
                $id = $row['id_rutina'];
                $titulo = $row['nombre_rutina'];
                $contenido = $row['ejercicios_rutina'];
                $fecha = $row['fecha_modificacion'];
                $disciplina = $row['id_disciplina'];
                $user = $row['id_usuario_modificacion'];
            ?>
            <tr>
                <td>
                    <a href="mostrar.php?xid=<?php echo $id; ?>"><?php echo $titulo; ?></a>
                </td>
                <?php
                $query2="select * from disciplinas where id_disciplina=$disciplina";
                $result2=mysqli_query($db,$query2);
                while ($valores2=mysqli_fetch_assoc($result2)) {
                    echo '<td>'.$valores2['nombre_disciplina'].'</td>';
                }
                ?>
                <td>
                    <a href="editar.php?xid=<?php echo $id; ?>"><img src="../../../img/icons8-edit-24.png"></a>
                    <a href="eliminar.php?xid=<?php echo $id; ?>" onclick='return confirmar();'><img src="../../../img/icons8-trash-24.png"></a>
                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
