<?php

$id = htmlspecialchars($_POST['id_record']);

      try {
        require_once('../../scripts/config.php');

       ////////

       $record = "SELECT * FROM `records`";
       $resultado3 = $db->query($record);

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

    <!-- Archivos JS -->
    <script src="../../js/base.js"></script>

</head>

<body>

<?php require_once '../../scripts/navbar2.php' ?>

<main role="main" class="container">

  <div>

    <h1>Nuevo Record</h1>
    <br>

      <form action="guardarRecord.php" method="post">
          <br>
          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Wod</label>
              <div class="col-10">

               <select name="wod" class="form-control form-control-sm" required>
                   <?php while($rec = $resultado3->fetch_assoc() ) { ?>
                    <option value="<?php echo $rec['id_record']; ?>"><?php echo $rec['desc_wod']; ?></option>
                    <?php  } ?>
                </select>

              </div>
          </div>
          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Fecha</label>
              <div class="col-10">
                  <input class="form-control" type="date" name="fecha_record" value="">
              </div>
          </div>

     <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Unidades</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" onclick="validaCheckbox1()" >
            <label class="form-check-label" for="inlineCheckbox1">Repeticiones</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" onclick="validaCheckbox2()" >
            <label class="form-check-label" for="inlineCheckbox2">Peso</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" onclick="validaCheckbox3()" >
            <label class="form-check-label" for="inlineCheckbox3">Tiempo</label>
          </div>
      </div>


          <div class="form-group row repeticiones" id="r">
              <label for="example-text-input" class="col-2 col-form-label">Repeticiones</label>
              <div class="col-10">
                  <input class="form-control" type="number" name="repeticiones_record">
              </div>
          </div>
          <div class="form-group row unidad" id="u">
              <label for="example-text-input" class="col-2 col-form-label">Unidad de Peso</label>
              <div class="col-10">
                <select name="unidad_peso_record" class="form-control form-control-sm">
                  <option value="0">Kg</option>
                  <option value="1">Libras</option>
                </select>
              </div>
          </div>
          <div class="form-group row peso" id="p">
              <label for="example-text-input" class="col-2 col-form-label">Peso</label>
              <div class="col-10">
                  <input class="form-control" type="number" name="peso_record">
              </div>
          </div>
          <div class="form-group row tiempo" id="t">
              <label for="example-text-input" class="col-2 col-form-label">Tiempo(minutos)</label>
              <div class="col-10">
                  <input class="form-control" type="number" name="tiempo_record">
              </div>
          </div>

          <a href="generalExpediente.php?id=<?php echo $id ?>" class="btn btn-link"> Regresar</a>

          <input type="hidden" value="" name="id">
          <input type="submit" class="btn btn-success btnGuardar" value="Guardar">

      </form>

  </div>

<?php $db->close(); ?>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
