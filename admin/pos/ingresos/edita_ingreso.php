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

    <link rel="icon" href="../img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="../../../css/base.css" rel="stylesheet">

    <!-- Archivos JS -->
    <script src="../../../js/base.js"></script>

</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

    <h1>Editar Ingreso</h1>

<h4>Actividad de ingreso</h4>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Producto</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option></option>
            <option>Mensualidad</option>
            <option>Membresia</option>
            <option>Agua</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Cantidad</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    </div>
    <div class="form-group">
        <label for="producto">Cliente</label>
        <input type="text" class="form-control" id="producto" aria-describedby="" placeholder="">
    </div>
    <div class="form-group">
        <label for="producto">Precio $</label>
        <input type="text" class="form-control" id="producto" aria-describedby="" placeholder="">
    </div>

    <input class="btn btn-primary" type="submit" value="Guardar cambios">
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
