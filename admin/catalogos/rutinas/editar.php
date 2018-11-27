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

</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

    <div class="starter-template">
        <h1>Editar rutina</h1>
        <p class="lead">
        <form action="guardarEditado.php" method="post">
            <input type="hidden" name="id" value="<?php echo $xid; ?>">
            <button type="submit" class="btn btn-success">Guardar</button>
            <?php
            $xid = $_GET['xid'];
            $query="select * from rutinas where id_rutina=$xid";
            $result=mysqli_query($db,$query);
            while ($row=mysqli_fetch_array($result)) {
                $titulo = $row['nombre_rutina'];
                $contenido = $row['ejercicios_rutina'];
                $fecha = $row['fecha_modificacion'];
                $disciplina = $row['id_disciplina'];
                $user = $row['id_usuario_modificacion'];
            ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $xid; ?>">
                    <input type="hidden" name="user" value="<?php echo $user ?>">
                    <label for="inputTitulo">Título: </label>
                    <input type="text" class="form-control" id="inputTitulo" name="titulo"
                           placeholder="Título" required
                           value="<?php echo $titulo; ?>">
                </div>
                <div class="col-md-4">
                    <br>
                    <label for="inputPassword4">Disciplina: </label>
                    <select class="custom-select d-block w-100" id="disciplina" name="disciplina" required>
                        <option value="">Selecciona...</option>
                        <?php
                        $query="select * from disciplinas WHERE id_disciplina=$disciplina";
                        $result=mysqli_query($db,$query);
                        while ($valores=mysqli_fetch_array($result)) {
                            echo '<option selected="true" value="'.$valores[id_disciplina].'">'.$valores[nombre_disciplina].'</option>';
                        }
                        ?>
                        <?php
                        $query="select * from disciplinas WHERE id_disciplina!=$disciplina";
                        $result=mysqli_query($db,$query);
                        while ($valores=mysqli_fetch_array($result)) {
                            echo '<option value="'.$valores[id_disciplina].'">'.$valores[nombre_disciplina].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <label for="contenido">Contenido:</label>
                    <textarea class="form-control" rows="5" id="contenido" name="contenido" required><?php echo $contenido; ?></textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>