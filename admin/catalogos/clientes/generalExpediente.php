<?php


$decodificar = ($_GET['id']);

$id= htmlspecialchars(base64_decode($decodificar));


      try {
        require_once('../../../scripts/config.php');
		  
		  /////////logros

		  $sqlogro = "SELECT * FROM logros";
		  $logros = $db->query($sqlogro);
		  
		  $sqlogrou = "SELECT * FROM `logrosclientes` WHERE id_usuario = '{$id}'";
		  $logrosu = $db->query($sqlogrou);

        /////RELLENA RECORDS TABLA

        $records = "SELECT `nombre_rutina`,`tipo_record`,`t1`.`repeticiones_puntos`,`t1`.`peso`,`t1`.`tiempo`,`t1`.`id_usuario`,`ejercicios_rutina`,`t1`.`id_record` ,`t1`.`id_rutina` FROM `records` `t1`";
        $records .= "INNER JOIN (SELECT `id_rutina`,MAX(`fecha_creacion`) as `fecha` FROM `records` GROUP BY `id_rutina`) `t2` ";
        $records .= "ON (`t1`.`id_rutina` = `t2`.`id_rutina` and `t1`.`fecha_creacion` = `t2`.`fecha`) ";
        $records .= "LEFT JOIN `rutinas` `rut` on `rut`.`id_rutina` = `t1`.`id_rutina` LEFT JOIN `tiporecord` `tp`";
        $records .= "ON `tp`.`id_tipo_record` = `t1`.`id_tipo_record` WHERE `id_usuario` = '{$id}' ";
        $resultado5 = $db->query($records);

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

    <link rel="icon" href="../../../img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="../../../css/controlClientes.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- Archivos JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../../js/base.js"></script>
    <script src="../../../js/tablas.js"></script>
    <script src="../../../js/formulariosValidar.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>

<body>

<?php require_once '../../../scripts/navbar2.php' ?>

<main role="main" class="container">
  <br>  <br><br>  <br>
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
                    <label for="example-text-input" class="col-2 col-form-label">Nombre Completo*</label>
                    <div class="col-10">
                        <input class="form-control" name="nombre_completo" id="nombre_completo" type="text" value="<?php echo $registros['nombre_completo']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nombre Corto*</label>
                    <div class="col-10">
                        <input class="form-control" name="nombre_corto" id="nombre_corto" type="text" value="<?php echo $registros['nombre_corto']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">E-mail*</label>
                    <div class="col-10">
                        <input class="form-control" name="correo" id="correo" type="text" value="<?php echo $registros['correo']; ?>" required>
                      <div id="emailOk">  </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Telefono</label>
                    <div class="col-10">
                        <input class="form-control" name="telefono" id="telefono"  type="text" maxlength="10"  value="<?php echo $registros['telefono']; ?>">
                        <div id="telefonoOk">  </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Celular*</label>
                    <div class="col-10">
                        <input class="form-control" name="celular" id="celular" type="text" maxlength="10" value="<?php echo $registros['celular']; ?>" required>
                        <div id="celOk">  </div>
                    </div>
                </div>
                <br>
                <h2>Contacto en caso de Emergencia</h2>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nombre Completo*</label>
                    <div class="col-10">
                        <input class="form-control" name="nombre_emergencia" id="nombre_emergencia" type="text" value="<?php echo $registros['nombre_emergencia']; ?>" required>
                        <div id="emernomOk">  </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Celular*</label>
                    <div class="col-10">
                        <input class="form-control" name="telefono_emergencia" id="numero_emergencia" type="text" maxlength="10" value="<?php echo $registros['telefono_emergencia']; ?>" required>
                        <div id="emernumOk">  </div>
                    </div>
                </div>

                <input type="hidden" value="<?php echo base64_encode($registros['id_usuario']); ?>" name="id_datos">
                <input type="submit" id="bu" class="btn btn-success btnGuardar" value="Guardar">

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
                    <label for="example-text-input" class="col-2 col-form-label">Peso (Kg)*</label>
                    <div class="col-10">
                        <input class="form-control" name="peso" id="peso" type="text" maxlength="4" value="<?php echo $registro['peso']; ?>" required>
                        <div id="pesoOk">  </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Altura (cm)*</label>
                    <div class="col-10">
                        <input class="form-control" name="altura" id="altura" type="text" maxlength="4" value="<?php echo $registro['altura']; ?>" required>
                        <div id="alturaOk">  </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Fecha de Nacimiento*</label>
                    <div class="col-10">
                        <input class="form-control" name="fecha_nacimiento" type="text" id="datepicker" value="<?php echo $registro['fecha_nacimiento']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Cintura (cm)</label>
                    <div class="col-10">
                        <input class="form-control" name="cintura"  type="text" maxlength="4" value="<?php echo $registro['cintura']; ?>" >
                        <div id="cinturaOk">  </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">IMC</label>
                    <div class="col-10">
                        <input class="form-control" name="imc"  type="text" maxlength="4" value="<?php echo $registro['IMC']; ?>">
                        <div id="imcOk">  </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleTextarea" class="col-2 col-form-label">Comentarios de Salud</label>
                    <div class="col-10">
                        <textarea class="form-control" name="comentarios_salud" id="exampleTextarea" rows="3"><?php echo $registro['antecedentes_salud']; ?></textarea>
                    </div>
                </div>

                <input type="hidden" value="<?php echo base64_encode($registro['id_usuario']); ?>" name="id_ficha">
                <input type="submit" id="but" class="btn btn-success btnGuardar" value="Guardar">

          </form>
           <?php  } ?>
        </div>

<!--************************************* Records ************************************************* -->
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <br><br>

          <form action="nuevoRecord.php" method="post" id="formulario_nuevo">
              <input type="hidden" value="<?php echo base64_encode($id);?>" name="id_record">
              <input type="submit" class="btn btn-success btnNuevoCliente"  value="Nuevo +" >
          </form>
            <br><br>
  <h2>Ultimos Records por Rutina</h2>
  <br>
<table id="example2" class="table" >
            <thead class="">
                        <tr>
                          <th scope="col">Wod</th>
                          <th scope="col">Tipo Record</th>
                          <th scope="col">Peso</th>
                          <th scope="col">Tiempo</th>
                          <th scope="col">Repeticiones/puntos</th>
                           <th scope="col">Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php while($records = $resultado5->fetch_assoc() ) { ?>
                      <tr>
                        <td><?php echo $records['nombre_rutina']; ?></td>
                         <td><?php echo $records['tipo_record']; ?></td>
                         <td><?php echo $records['peso']; ?></td>
                         <td><?php echo $records['tiempo']; ?></td>
                         <td><?php echo $records['repeticiones_puntos']; ?></td>
                         <td>
                             <a class="icono" target="_blank" href="verRecord.php?id=<?php echo base64_encode($records['id_record']);?>&id2=<?php echo base64_encode($records['id_usuario']); ?>"> <ion-icon name="eye"><ion-icon> </a>
                         </td>
                      </tr>
                     <?php  } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                           <th scope="col">Wod</th>
                           <th scope="col">Tipo Record</th>
                           <th scope="col">Peso</th>
                           <th scope="col">Tiempo</th>
                           <th scope="col">Repeticiones/puntos</th>
                           <th scope="col">Visualizar</th>
                        </tr>
                    </tfoot>
           </table>
        </div>
<?php $db->close(); ?>
<!--************************************* Logros ************************************************* -->

                <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact2-tab">
                    <br>
							<!-- logros view -->
					
							  <div class="row">
								<div class="col-lg-12">
								  <h2 class="my-4">Tus Logros</h2>
								</div>
							  
								 

								  <?php while($logrou = $logrosu->fetch_assoc() ) { 	
								   while($logro = $logros->fetch_assoc() ) { ?>
								  
								   
								<div class="col-lg-4 col-sm-6 text-center mb-4">
									
									<img src="../../../img/<?php if($logro['id_logro'] == $logrou['id_logro']){echo $logro['imagen'];}
																			if($logro['id_logro'] != $logrou['id_logro']){echo $logro['imagen']."b";} 
									 ?>.png" class="rounded-circle img-fluid d-block mx-auto">
									
								  <h3>
									<?php echo $logro['nombre_logro']; ?>
								  </h3>
								  <p><?php echo $logro['descripcion_logro']; ?></p>
								</div>
								   <?php }
								  } ?>
								  
							 
							  </div>
					

							</div>
                    </div>

		
         </div>
	
		
	
	
    </main>

      <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  </html>
