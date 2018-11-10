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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- Archivos JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../js/base.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

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
        <li class="nav-item">
            <a class="nav-link" id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="logros" aria-selected="false">Logros</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">


<!--************************************* Datos personales ************************************************* -->


        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <form action="modificacionDatosPersonales.php" method="post">
                <br>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nombre</label>
                    <div class="col-10">
                        <input class="form-control" type="text" value="Eduardo">
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
            <form action="modificacionExpediente.php" method="post">
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
          <br><br>

          <form action="nuevoRecord.php" method="post" id="formulario_nuevo">
              <input type="hidden" value="" name="id">
              <input type="submit" class="btn btn-success btnNuevoCliente" value="Nuevo +" name="" id="">
          </form>

            <br><br>


            <table id="example" class="display table table-hover"  style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Nombre</th>
                           <th scope="col">Records</th>
                           <th scope="col">Tipo</th>
                           <th scope="col">Visualizar</th>
                           <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>sentadillas</td>
                         <td>50 repeticiones</td>
                         <td>crossfit</td>
                         <td>
                             <form action="verRecord.php" method="post" id="formulario_">
                                 <input type="hidden" value="" name="id">
                                 <input type="submit" class="btn btn-link" value="Visualizar Record" name="" id="">
                             </form>
                         </td>
                         <td>
                             <form action="eliminarRecord.php" method="post" id="formulario_">
                                 <input type="hidden" value="" name="id">
                                 <input type="submit" class="btn btn-danger" value="Eliminar Record" name="" id="">

                             </form>
                         </td>
                      </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th scope="col">Nombre</th>
                           <th scope="col">Records</th>
                           <th scope="col">Tipo</th>
                           <th scope="col">Visualizar</th>
                           <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                </table>
        </div>


<!--************************************* Logros ************************************************* -->

                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
                    <br>

                      <table id="example" class="display table table-hover"  style="width:100%">
                              <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Logro</th>
                                     <th scope="col">Tipo</th>
                                     <th scope="col">Eliminar</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                   <td>50 repeticiones</td>
                                   <td>crossfit</td>

                                   <td>
                                       <form action="eliminarRecord.php" method="post" id="formulario_">
                                           <input type="hidden" value="" name="id">
                                           <input type="submit" class="btn btn-danger" value="Eliminar Record" name="" id="">

                                       </form>
                                   </td>
                                </tr>
                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th scope="col">Logro</th>
                                     <th scope="col">Tipo</th>
                                     <th scope="col">Eliminar</th>
                                  </tr>
                              </tfoot>
                          </table>


                </div>
    </div>

                </main>


                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                </body>
                </html>
