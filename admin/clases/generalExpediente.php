<?php

$id = htmlspecialchars($_GET['id']);

      try {
        require_once('../../scripts/config.php');

      ////RELLENA EL FORMULARIO DE DATOS DE USUARIO
        $sql = "SELECT * FROM `usuarios` WHERE `id_usuario` LIKE  '{$id}'";
        $resultado = $db->query($sql);

      /////INSERTA EN LA TABLA EXPEDIENTES SINO EXISTE EL USUARIO EN ELLA
        $select = "SELECT * FROM `expedientes` WHERE `id_usuario` LIKE  '{$id}'";
        $result = $db->query($select);

        $num = $result->num_rows;

        if($num == 0){
                    $insert = "INSERT INTO `expedientes` (`id_expediente`, `peso`, `altura`, `fecha_nacimiento`, `cintura`, `IMC`, `antecedentes_salud`, `id_usuario`, `id_usuario_modificacion`, `eliminado`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL,'{$id}','{$_SESSION["user"]}', NULL)";
                    $insert;
                    $db->query($insert);
            }
            /////RELLENA EL FORMULARIO DE EXPEDIENTE MEDICO
            $sql2 = "SELECT `e`.`id_usuario` ,`peso` , `altura`, `fecha_nacimiento` ,`cintura` ,`IMC`,`antecedentes_salud` FROM `expedientes` `e` LEFT JOIN `usuarios` `u` ON `e`.`id_usuario` = `u`.`id_usuario` WHERE `e`.`id_usuario` LIKE '{$id}' ";
            $resultado2 = $db->query($sql2);


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

    <link rel="icon" href="../../img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="../../css/base.css" rel="stylesheet">
    <link href="../../css/controlClientes.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- Archivos JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../js/base.js"></script>
    <script src="../../js/tablas.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>

<?php require_once '../../scripts/navbar2.php' ?>

<main role="main" class="container">

    <h1>Expediente </h1>
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

     <?php while($registros = $resultado->fetch_assoc() ) { ?>
            <form action="modificacionDatosPersonales.php" method="post">
                <br>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nombre Completo</label>
                    <div class="col-10">
                        <input class="form-control" name="nombre_completo" type="text" value="<?php echo $registros['nombre_completo']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">E-mail</label>
                    <div class="col-10">
                        <input class="form-control" name="correo" type="text" value="<?php echo $registros['correo']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
                    <div class="col-10">
                        <input class="form-control" name="telefono" type="number" value="<?php echo $registros['telefono']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Celular</label>
                    <div class="col-10">
                        <input class="form-control" name="cel" type="number" value="<?php echo $registros['celular']; ?>">
                    </div>
                </div>
                <br>
                <h2>Contacto en caso de Emergencia</h2>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nombre Completo</label>
                    <div class="col-10">
                        <input class="form-control" name="nombre_emergencia" type="text" value="<?php echo $registros['nombre_emergencia']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
                    <div class="col-10">
                        <input class="form-control" name="telefono_emergencia" type="number" value="<?php echo $registros['telefono_emergencia']; ?>">
                    </div>
                </div>

                <input type="hidden" value="<?php echo $registros['id_usuario']; ?>" name="id_datos">
                <input type="submit" class="btn btn-success btnGuardar" value="Guardar">

            </form>
         <?php  } ?>
        </div>
<?php //$db->close(); ?>
<!--************************************* Ficha médica ************************************************* -->

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               <?php while($registro = $resultado2->fetch_assoc() ) { ?>
            <form action="modificacionExpediente.php" method="post">
                <br>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Peso (Kg)</label>
                    <div class="col-10">
                        <input class="form-control" name="peso" type="number" value="<?php echo $registro['peso']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Altura (cm)</label>
                    <div class="col-10">
                        <input class="form-control" name="altura" type="number" value="<?php echo $registro['altura']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Fecha de Nacimiento</label>
                    <div class="col-10">
                        <input class="form-control" name="fecha_nacimiento" type="date" id="" value="<?php echo $registro['fecha_nacimiento']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Cintura (cm)</label>
                    <div class="col-10">
                        <input class="form-control" name="cintura" type="number" value="<?php echo $registro['cintura']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">IMC</label>
                    <div class="col-10">
                        <input class="form-control" name="imc" type="number" value="<?php echo $registro['IMC']; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleTextarea" class="col-2 col-form-label">Comentarios de Salud</label>
                    <div class="col-10">
                        <textarea class="form-control" name="comentarios_salud" id="exampleTextarea" rows="3"><?php echo $registro['antecedentes_salud']; ?></textarea>
                    </div>
                </div>

                <input type="hidden" value="<?php echo $registro['id_usuario']; ?>" name="id_ficha">
                <input type="submit" class="btn btn-success btnGuardar" value="Guardar">

          </form>
           <?php  } ?>
        </div>

<!--************************************* Records ************************************************* -->

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <br><br>

          <form action="nuevoRecord.php" method="post" id="formulario_nuevo">
              <input type="hidden" value="<?php echo $id?>" name="id_record">
              <input type="submit" class="btn btn-success btnNuevoCliente" value="Nuevo +" >
          </form>


            <br><br>


            <table id="example2" class="display table table-hover"  style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">Wod</th>
                           <th scope="col">Records</th>
                           <th scope="col">Visualizar</th>
                           <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          sentadillas
                        </td>
                         <td>50 repeticiones</td>
                         <td>
                             <a class="icono" href="verRecord.php?id=<?php //echo $registro['cve_ofertas']; ?>"> <ion-icon name="eye"><ion-icon> </a>
                         </td>
                         <td>
                            <a class="icono" href="eliminarRecord.php?id=<?php //echo $registro['cve_ofertas']; ?>"> <ion-icon name="trash"><ion-icon> </a>
                         </td>
                      </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                          <th scope="col">Wod</th>
                           <th scope="col">Records</th>
                           <th scope="col">Visualizar</th>
                           <th scope="col">Eliminar</th>
                        </tr>
                    </tfoot>
                </table>
        </div>
<?php $db->close(); ?>

<!--************************************* Logros ************************************************* -->

                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
                    <br>
                      <table id="example" class="display table table-hover"  style="width:100%">
                              <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">Logro</th>
                                     <th scope="col">Tipo</th>
                                     <th scope="col">Fecha Creación</th>
                                     <th scope="col">Eliminar</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <tr>
                                   <td>50 repeticiones</td>
                                   <td>crossfit</td>
                                   <td>20/12/12</td>

                                   <td>
                                    <a class="icono" href="eliminarRecord.php?id=<?php //echo $registro['cve_ofertas']; ?>"> <ion-icon name="trash"><ion-icon> </a>
                                   </td>
                                </tr>
                              </tbody>
                              <tfoot>
                                  <tr>
                                    <th scope="col">Logro</th>
                                     <th scope="col">Tipo</th>
                                     <th scope="col">Fecha Creación</th>
                                     <th scope="col">Eliminar</th>
                                  </tr>
                              </tfoot>
                          </table>
                    </div>
         </div>
    </main>

      <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  </html>
