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

</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">
    <div class="starter-template">
            <div class="col-md-12 order-md-1">
                <h4 class="mb-3">Sesión "20181025"</h4>
                <form class="needs-validation" action="" method="" novalidate>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#informacion" role="tab" aria-controls="home" aria-selected="true">Información</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#asistencia" role="tab" aria-controls="profile" aria-selected="false">Asistencia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#top" role="tab" aria-controls="contact" aria-selected="false">TOP</a>
                        </li>
                    </ul>


                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="informacion" role="tabpanel" aria-labelledby="home-tab">
                            <!-- Contenido de la información -->
                            <br>

                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Fecha de creación</th>
                                    <th>Fecha de publicación</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="" value="24-10-2018"></td>
                                    <td><input type="text" class="form-control" placeholder="" value="25-10-2018"></td>
                                </tr>
                                </tbody>
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="row" colspan="2">CALENTAMIENTO</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="2"><input type="text" class="form-control" placeholder="" value="Descripción del calentamiento..."></td>
                                </tr>
                                </tbody>
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="row" colspan="2">RUTINA</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="2"><input type="text" class="form-control" placeholder="" value="Título de la rutina"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="text" class="form-control" placeholder="" value="Descripción de la rutina..."></td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                        <div class="tab-pane fade" id="asistencia" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Contenido de la asistencia -->
                            <br>
                            <div class="row">
                                <div class="col-md-8 mb-2">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <form class="card p-2">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-secondary">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <table class="table ">
                                <thead class="thead-dark">
                                <tr>
                                    <th >Hora</th>
                                </tr>
                                </thead>
                                <thead class="thead-light">
                                <tr>
                                    <th colspan="2">6 am</th>
                                </tr>
                                </thead>
                            </table>
                            <ul>
                                    <ul>
                                        <table  class="table">
                                            <tr>
                                                <td><li>Diego</li></td>
                                                <td><div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Asistencia</label>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td><li>Rodrigo</li></td>
                                                <td><div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                        <label class="custom-control-label" for="customCheck2">Asistencia</label>
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td><li>Karla</li></td>
                                                <td><div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                        <label class="custom-control-label" for="customCheck3">Asistencia</label>
                                                    </div></td>
                                            </tr>
                                        </table>
                                    </ul>
                            </ul>
                            <table class="table ">
                                <thead class="thead-light">
                                <tr>
                                    <th colspan="2">7 am</th>
                                </tr>
                                </thead>
                            </table>
                            <ul>
                                <ul>
                                    <table  class="table">
                                        <tr>
                                            <td><li>Esteban</li></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">Asistencia</label>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td><li>Perla</li></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">Asistencia</label>
                                                </div></td>
                                        </tr>
                                        <tr>
                                            <td><li>Harry</li></td>
                                            <td><div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                    <label class="custom-control-label" for="customCheck6">Asistencia</label>
                                                </div></td>
                                        </tr>
                                    </table>
                                </ul>
                            </ul>
                            <!--<div class="row">
                                <div class="col-md-10 mb-2">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <button class="btn btn-primary btn-md btn-block" type="submit">Guardar asistencias</button>
                                </div>
                            </div>-->


                        </div>
                        <div class="tab-pane fade" id="top" role="tabpanel" aria-labelledby="contact-tab">
                            <!-- Contenido del TOP -->
                            <br>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <select class="custom-select d-block w-100" id="">
                                        <option value="">Filtrar por nivel...</option>
                                        <option>Todos</option>
                                        <option>Nivel alto</option>
                                        <option>Nivel medio</option>
                                        <option>Nivel bajo</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <select class="custom-select d-block w-100" id="">
                                        <option value="">Ordenar de...</option>
                                        <option>Menor a mayor</option>
                                        <option>Mayor a menor</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <button class="btn btn-primary btn-md btn-block" type="submit">Filtrar</button>
                                </div>
                            </div>

                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nivel alto</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo de record</th>
                                    <th scope="col">Record</th>
                                    <th scope="col">Nivel</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Repeticiones</td>
                                    <td>50</td>
                                    <td>Nivel alto</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Repeticiones</td>
                                    <td>48</td>
                                    <td>Nivel bajo</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>Repeticiones</td>
                                    <td>35</td>
                                    <td>Nivel medio</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Rodrigo</td>
                                    <td>Repeticiones</td>
                                    <td><button class="btn btn-secondary btn-sm btn-block" type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button></td>
                                    <td>Nivel medio</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Karla</td>
                                    <td>Repeticiones</td>
                                    <td><button class="btn btn-secondary btn-sm btn-block" type="submit">Agregar</button></td>
                                    <td>Nivel medio</td>
                                </tr>
                                </tbody>
                            </table>

                            <!-- Modal para agregar el Record del cliente-->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Asignar record a: Rodrigo</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <select class="custom-select d-block w-100" id="">
                                                        <option>Selecciona Tipo de record</option>
                                                        <option>Repeticiones</option>
                                                        <option>Peso</option>
                                                        <option>Distancia</option>
                                                        <option>Tiempo</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Record</label>
                                                    <input type="text" class="form-control" id="recipient-name" />
                                                </div>
                                                <div class="form-group">
                                                    <select class="custom-select d-block w-100" id="">
                                                        <option>Selecciona Nivel</option>
                                                        <option>Nivel 1</option>
                                                        <option>Nivel 2</option>
                                                        <option>Nivel 3</option>
                                                        <option>Nivel 4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Notas:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Send message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-8 mb-2">
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-primary btn-sm btn-block" type="submit">Guardar</button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-danger btn-sm btn-block" type="submit">Eliminar</button>
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
