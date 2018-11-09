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

    <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Registro de Usuarios</h4>
        <form class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="firstName">Nombre completo</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Valid first name is required.
                    </div>
                </div>
            </div>


            <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>

            <div class="mb-3">
                <label for="address2">Celular</label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="mb-3">
                <label for="address2">Teléfono</label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">

                <div class="col-md-4 mb-4">
                    <label for="zip">Contraseña</label>
                    <input type="text" class="form-control" id="zip" placeholder="" required>
                    <div class="invalid-feedback">
                        Zip code required.
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">REGISTRAR</button>
        </form>
    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
