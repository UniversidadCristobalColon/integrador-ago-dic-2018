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

    <!-- Archivos JS -->
    <script src="../../js/base.js"></script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker4').datetimepicker({
                format: 'L',
                language: 'es'
            });
        });
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />



</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">
    <div class="starter-template">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Nueva clase</h4>
                <form class="needs-validation" action="" method="" novalidate>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="fecha">Fecha</label>
                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
                                    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="hora">Hora de revelación</label>
                            <select class="custom-select d-block w-100" id="" required>
                                <option value="">Selecciona...</option>
                                <option>20:00</option>
                                <option>21:00</option>
                                <option>22:00</option>
                            </select>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="record">Tipo de record</label>
                            <select class="custom-select d-block w-100" id="" required>
                                <option value="">Selecciona...</option>
                                <option>Peso</option>
                                <option>Tiempo</option>
                                <option>Repeticiones</option>
                            </select>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="ordenar">Ordenar</label>
                            <select class="custom-select d-block w-100" id="" required>
                                <option value="">Selecciona...</option>
                                <option>Mayor a menor</option>
                                <option>Menor a mayor</option>
                            </select>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Calentamiento</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label for="">Descripción de rutina</label>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button class="btn btn-primary btn-sm btn-block" type="submit">Agregar rutina</button>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button class="btn btn-secondary btn-sm btn-block" type="submit">Editar rutina</button>
                                </div>
                            </div>
                            <textarea class="form-control" id="" rows="3"></textarea><br>

                            <input type="text" class="form-control" id="" placeholder="Título de la rutina" value="" required>
                        </div>
                    </div>

                    <!--<hr class="mb-4">-->
                    <div class="row">
                        <div class="col-md-10 mb-2">
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-primary btn-md btn-block" type="submit">Crear clase</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>
