<?php


        try {
          require_once('../../../scripts/config.php');
          $_SESSION['user'] = 4;
          $sql = 'SELECT * FROM usuarios';
          $resultado = $db->query($sql);
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
    <link href="../../../css/base.css" rel="stylesheet">
    <link href="../../../css/controlClientes.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


    <!-- Archivos JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../../js/tablas.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

  <h1>Clientes</h1>
  <br>

  <table id="example" class="table" >
          <thead class="">
              <tr>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Correo</th>
                <th scope="col">Visualizar</th>
              </tr>
          </thead>
          <tbody>
            <?php while($registros = $resultado->fetch_assoc() ) { ?>
            <tr id="<?php $registros['id_usuario']; ?>">
              <td><?php echo $registros['nombre_completo']; ?></td>
              <td><?php echo $registros['correo']; ?></td>
              <td>
                <a class="icono" target="_blank" href="generalExpediente.php?id=<?php echo base64_encode($registros['id_usuario']); ?>"> <ion-icon name="eye"><ion-icon> </a>

              </td>
            </tr>
            <?php } ?>


          </tbody>
          <tfoot>
              <tr>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Correo</th>
                <th scope="col">Visualizar</th>
              </tr>
          </tfoot>
      </table>

 <?php $db->close(); ?>
</main>

<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
