<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 13/11/2018
 * Time: 10:27 PM
 */
require_once '../../../scripts/config.php' ?>
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
        <h1>Ver detalles de rutina</h1>
        <form action="index.php">
            <button type="submit" class="btn btn-success">Regresar</button>
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
                <div class="col-md-4">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $xid; ?>" readonly>
                    <label for="inputTitulo">Título: </label>
                    <input type="text" class="form-control" id="inputTitulo" placeholder="Título" required
                           value="<?php echo $titulo; ?>" readonly>
                </div>
                <div class="col-md-3">
                    <br>
                    <label for="inputPassword4">Disciplina: </label>
                    <select class="custom-select d-block w-100" id="disciplina" required disabled>
                        <?php
                        $query="select * from disciplinas WHERE id_disciplina=$disciplina";
                        $result=mysqli_query($db,$query);
                        while ($valores=mysqli_fetch_array($result)) {
                            echo '<option value="'.$valores[id_disciplina].'">'.$valores[nombre_disciplina].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <br>
                    <label for="inputPassword4">Usuario: </label>
                    <select class="custom-select d-block w-100" id="user" required disabled>
                        <?php
                        $query2="select * from usuarios where id_usuario=$user";
                        $result2=mysqli_query($db,$query2);
                        while ($valores2=mysqli_fetch_assoc($result2)) {
                            echo '<option value="'.$valores2[id_usuario].'">'.$valores2[nombre_corto].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <label for="contenido">Contenido:</label>
                    <textarea class="form-control" rows="5" id="contenido" required readonly><?php echo $contenido; ?></textarea>
                </div>
            </div>
        </form>
        <?php
        }
        ?>
    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>