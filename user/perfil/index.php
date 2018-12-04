<?php require_once '../../scripts/config.php' ?>
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
    <link href="../../css/controlClientes.css" rel="stylesheet">

    <!-- Archivos JS -->
    <script src="../../js/base.js"></script>

</head>

<body>

<?php require_once '../../scripts/navbar2.php' ?>

<main role="main" class="container">

    <h1>Expediente</h1>
    <br>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="datos" aria-selected="true">Datos personales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="expediente" aria-selected="false">Expediente Médico</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="records" aria-selected="false">Records</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">


<!--************************************* Datos personales ************************************************* -->


        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <form action="creacionExpediente.php" method="post">
                <br>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nombre</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="Eduardo">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Apellido</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="Velazquez">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">E-mail</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="eduardo45@live.com.mx">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="223">
                    </div>
                </div>

                <input type="hidden" value="" name="id">
                <input type="submit" class="btn btn-success btnGuardar" value="Guardar">

            </form>

        </div>

<!--************************************* Ficha médica ************************************************* -->


        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="creacionExpediente.php" method="post">
                <br>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Peso</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="223">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Altura</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="223">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Fecha de Nacimiento</label>
                    <div class="col-10">
                        <input class="form-control" type="date" id="" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Cintura</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="223">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">IMC</label>
                    <div class="col-10">
                        <input class="form-control" type="number" value="22">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleTextarea" class="col-2 col-form-label">Comentarios de Salud</label>
                    <div class="col-10">
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>
                </div>

                <input type="hidden" value="" name="id">
                <input type="submit" class="btn btn-success btnGuardar" value="Guardar">

            </form>
        </div>

<!--************************************* Records ************************************************* -->

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br>
            <p>Buscar Record</p>
            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <span class="input-group-text red lighten-3" id="basic-text1"></span>
                </div>
            </div>
            <br><br><br>

            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Logro</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>50 sentadillas</td>
                    <td>
                        <form action="editarRecord.php" method="post" id="formulario_">
                            <input type="hidden" value="" name="id">
                            <input type="submit" class="btn btn-link" value="Visualizar Record" name="" id="">
                        </form>
                    </td>
                    <td>
                        <form action="eliminarRecords.php" method="post" id="formulario_">
                            <input type="hidden" value="" name="id">
                            <input type="submit" class="btn btn-danger" value="Eliminar Record" name="" id="">

                        </form>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

                </main>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                </body>
                </html>
