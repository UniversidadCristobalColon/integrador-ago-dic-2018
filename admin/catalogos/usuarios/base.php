<?php

                    try {

                        require_once('../../../scripts/config.php');

                        $correcto= isset($_GET['success']);
                        $repetido= isset($_GET['repetido']);
                        $_SESSION['user'] = 4;

                        $record = "SELECT * FROM `tipousuario`";
                        $resultado3 = $db->query($record);

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

    <link rel="icon" href="../../../img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="../../../css/base.css" rel="stylesheet">


    <!-- Archivos JS -->
    <script src="../../../js/base.js"></script>

</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

    <form action="guardarform.php" method="post">

        <h2>Registro de Usuario</h2>
        <?php
        if($correcto == 1){?>
            <div id="anuncio" class="alert alert-success mb-3"> ¡El usuario ha sido registrado correctamente!</div>
            <?php $correcto=0; }?>
        <?php
        if($repetido == 1){?>
            <div  id="anuncio"  class="alert alert-warning mb-3">¡Intentalo de nuevo! El nombre de usuario ya existe.</div>
            <?php $repetido=0; }?>

        <div class="row mb-3">
            <div class="col-md-12">
                <input type="submit" value="Guardar" class="btn btn-success">
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" name="nombre" placeholder="Nombre completo" class="form-control" required>
            </div>

            <div class="col-md-6">
                <input type="text" name="nombrecorto" placeholder="Nombre usuario" class="form-control" required>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" name="email" placeholder="E-mail" class="form-control" required>
            </div>

            <div class="col-md-4">
            <input type="text" name="celular" placeholder="Celular" class="form-control" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="telefono" placeholder="Teléfono" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="password" name="contrasena" placeholder="Contraseña" class="form-control" required>
            </div>

            <div class="col-md-6">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label>Seleccione el día de pago:</label>
                <input type="date" name="dia_pago" placeholder="Dia de pago" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
            <label>Seleccione tipo de usuario:</label>
            <select name="tipo" class="form-control" required>
                <?php while($rec = $resultado3->fetch_assoc() ) { ?>
                    <option value="<?php echo $rec['id_tipo_usuario']; ?>"><?php echo $rec['desc_tipo_usuario']; ?></option>
                <?php  } ?>
            </select>
            </div>
        </div>


    </form>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

