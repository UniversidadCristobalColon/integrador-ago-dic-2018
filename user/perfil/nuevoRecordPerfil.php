<?php


      try {
        require_once('../../scripts/config.php');

        $decodificar = $_GET['id_record'];
        $id = htmlspecialchars(decript($decodificar));

       ////////

       $record = "SELECT * FROM `rutinas`";
       $resultado3 = $db->query($record);

       $tipo_peso = "SELECT * FROM `tipounidadpeso`";
       $resultado4 = $db->query($tipo_peso );

       $tiporecord = "SELECT * FROM `tiporecord`";
       $resultado5 = $db->query($tiporecord);

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Archivos JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../js/formulariosValidar.js"></script>
    <script src="../../js/tablas.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">

  <div>

    <h1>Nuevo Record</h1>
    <br>

      <form action="guardarRecordPerfil.php" method="post">
          <br>
          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Wod</label>
              <div class="col-10">

               <select name="wod" class="form-control form-control-sm" required>
                   <?php while($rec = $resultado3->fetch_assoc() ) { ?>
                    <option value="<?php echo $rec['id_rutina']; ?>"><?php echo $rec['nombre_rutina']; ?></option>
                    <?php  } ?>
                </select>

              </div>
          </div>
          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Fecha</label>
              <div class="col-10">
                  <input class="form-control" type="text" id="datepicker" name="fecha_record" required>
              </div>
          </div>

     <div class="form-group row">
      <label for="example-text-input" class="col-2 col-form-label">Unidades</label>
       <?php while($reco = $resultado5->fetch_assoc() ) { ?>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" onclick="validar()" value="<?php echo $reco['id_tipo_record']; ?>">
            <label class="form-check-label" for="inlineRadio1"><?php echo $reco['tipo_record']; ?></label>
          </div>
        <?php  } ?>
      </div>

          <div class="form-group row repeticiones" id="r">
              <label for="example-text-input" class="col-2 col-form-label">Repeticiones</label>
              <div class="col-10">
                  <input class="form-control" type="text" maxlength="4" name="repeticiones_record">
              </div>
          </div>



          <div class="form-group row unidad" id="u">
              <label for="example-text-input" class="col-2 col-form-label">Unidad de Peso</label>
              <div class="col-10">
                <select name="unidad_peso_record" class="form-control form-control-sm">
                    <?php while($pes = $resultado4->fetch_assoc() ) { ?>
                     <option value="<?php echo $pes['id_tipo_unidad_peso']; ?>"><?php echo $pes['desc_tipo_unidad_peso']; ?></option>
                     <?php  } ?>
                 </select>
              </div>
          </div>

          <div class="form-group row peso" id="p">
              <label for="example-text-input" class="col-2 col-form-label">Peso</label>
              <div class="col-10">
                  <input class="form-control" type="text" maxlength="4" name="peso_records">
              </div>
          </div>
          <div class="form-group row hora" id="h">
              <label for="example-text-input" class="col-2 col-form-label">Hora</label>
              <div class="col-10">
                  <input class="form-control"  id="hora" type="text"  value="00" maxlength="2" name="tiempo_record_hora">
                  <div id="horaOk">  </div>
              </div>
          </div>
          <div class="form-group row tiempo" id="t">
              <label for="example-text-input" class="col-2 col-form-label">Minutos</label>
              <div class="col-10">
                  <input class="form-control" value="00" id="min" type="text" maxlength="2" name="tiempo_record_minutos">
              </div>
          </div>
          <div class="form-group row segundos" id="s">
              <label for="example-text-input" class="col-2 col-form-label">Segundos</label>
              <div class="col-10">
                  <input class="form-control" value="00" id="seg" type="text" maxlength="2" name="tiempo_record_segundos">
              </div>
          </div>



          <a href="generalExpediente.php?id=<?php echo encript($id);?>" class="btn btn-link"> Regresar</a>

          <input type="hidden" value="<?php echo encript($id); ?>" name="id_nuevo_record">
          <input type="submit" id="bu" disabled class="btn btn-success btnGuardar" value="Guardar">

      </form>

  </div>

<?php $db->close(); ?>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
