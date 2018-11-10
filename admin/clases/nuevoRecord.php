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

  <div>

    <h1>Records</h1>
    <br>

      <form action="generalExpediente.php" method="post">
          <br>
          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Wod</label>
              <div class="col-10">
              <select class="form-control form-control-sm">
                <option>Small select</option>
              </select>
              </div>
          </div>

     <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Unidades</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Repeticiones</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
            <label class="form-check-label" for="inlineCheckbox2">Peso</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
            <label class="form-check-label" for="inlineCheckbox3">Tiempo</label>
          </div>
      </div>


          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Repeticiones</label>
              <div class="col-10">
                  <input class="form-control" type="number" value="">
              </div>
          </div>
          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Unidad de Peso</label>
              <div class="col-10">
                <select class="form-control form-control-sm">
                  <option>Small select</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Peso</label>
              <div class="col-10">
                  <input class="form-control" type="number" value="">
              </div>
          </div>
          <div class="form-group row">
              <label for="example-text-input" class="col-2 col-form-label">Tiempo(minutos)</label>
              <div class="col-10">
                  <input class="form-control" type="number" value="">
              </div>
          </div>

          <input type="hidden" value="" name="id">
          <input type="submit" class="btn btn-success btnGuardar" value="Guardar">

      </form>

  </div>


</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
