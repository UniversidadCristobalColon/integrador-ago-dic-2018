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

    <?php
    include '../../../scripts/config.php';
    $link  = conectarse();
    $resul = mysqli_query("select*from disciplinas", $link);
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
            <meta charset="utf-8">
                <title>
                    Document
                </title>
            </meta>
        </link>
    </head>
    <body>
                <div class="container">
                    <div class="row">
                        <div class="jumbotron ">
                            <h1>
                                Listado de Disciplinas
                            </h1>
                        </div>
                        <div>
                            <form class="form-inline"" action="bus.php" method="post">
                            <div class="form-group">
                                <input class="form-control" id="b" name="b" placeholder="Ingrese un codigo o Nombre a buscar" type="text">
                                <button type="submit" type="button" name="buscar" class="btn btn-primary" >Buscar<span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </div>

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Nuevo</button>

                            </form>
                    </div>


                            <table class="table table-striped col-md-4 col-xs-5">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Disciplina
                                        </th>
                                        <th>
                                            Fecha
                                        </th>

                                        <th>
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>

                                    <?php
                                        while ($fila = mysqli_fetch_array($resul)) {
                                            echo '<tr>
                                                <td>' . $fila['id_disciplinas'] . '</td>
                                                <td>' . $fila['nombre_disciplinas'] . '</td>
                                                <td>' . $fila['fecha_modificaion'] . '</td>
                                     
                                                <td>
                                               <!-- <a class="btn btn-info" href="update.php?id='.$fila['id_disciplinas'].'">Editar</a> -->
                                              <a class="btn btn-info" href="delete.php?id='.$fila['id_disciplinas'].'">Eliminar</a>
                                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">
                                          Editar
                                        </button>
                                                </td>
                                                
                                            </tr>';
                                        }
                                        ?>

                            </table>
                    </div>
                </div>

                 <script crossorigin="anonymous" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" src="https://code.jquery.com/jquery-3.2.1.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ingreso de datos</h4>
              </div>
              <div class="modal-body">
                  <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <h3>
                                Control de Disciplinas
                            </h3>
                            <form action="insertar.php" id="formulario" method="POST" name="formulario">
                                    <div class="form-group">
                                        <label for="nombre">
                                            ID
                                        </label>
                                        <input class="form-control" id="id_disciplinas" name="id_disciplinas" placeholder="ID" required="" type="text"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="asunto">
                                            Nombres
                                        </label>
                                        <input class="form-control" id="nombre_disciplinas" name="nombre_disciplinas" placeholder="Escribe el nombre de la disciplina" required="" type="text"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                             Fecha
                                        </label>
                                        <input class="form-control" id="fecha_modificacion" name="fecha_modificacion" placeholder="Fecha" required="" type="text"></input>
                                    </div>
                                    <ass class="form-group">
                                        <label for="mensaje">
                                            Direccion
                                        </label>
                                        <input class="form-control" id="direccion" name="direccion" placeholder="Direcion " required="" type="text"></input>
                                    </div>
                                    <input class="btn btn-primary" id="enviar" name="guardar" type="submit" value="Guardar datos"/>


                            </form>
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>
                <!--fin modal -->
                <!-- Modal para editar -->

                <!-- Modal -->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ingreso de datos</h4>
              </div>
              <div class="modal-body">
                  <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <h3>
                                Edicion de Alumnos
                            </h3>
                            <form action="update.php" id="formulario" method="POST" name="formulario">
                                <div class="form-group">
                                    <label for="nombre">
                                       ID
                                    </label>
                                    <input class="form-control" id="id_disciplinas" name="codigou" placeholder="ID" required="" type="text">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="asunto">
                                        Disciplina
                                    </label>
                                    <input class="form-control" id="nombre_disciplinas" name="nombreu" placeholder="Escribe el nombre de la disciplina" required="" type="text">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Fecha
                                    </label>
                                    <input class="form-control" id="fecha_modificacion" name="fechau" placeholder="Fecha" required="" type="text">
                                    </input>
                                </div>
                                <div class="form-group">
                                    <label for="mensaje">
                                        Direccion
                                    </label>
                                    <input class="form-control" id="direccion" name="direccionu" placeholder="Direcion " required="" type="text">
                                    </input>
                                </div>
                                <input class="btn btn-primary" id="enviar" name="guardar" type="submit" value="Guardar datos"/>

                            </form>
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>
                <!-- Modal para editar -->

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                <script src="conecta.js"></script>
    </body>
</html>




</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
