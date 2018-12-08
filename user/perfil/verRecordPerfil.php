<?php

$decodificar = ($_GET['id']);
$id= htmlspecialchars(base64_decode($decodificar));

$decodifica = ($_GET['id2']);
$id2= htmlspecialchars(base64_decode($decodifica));


    try {
      require_once('../../scripts/config.php');


      $sql2 = "SELECT `id_rutina` FROM `records` WHERE `id_record`= '{$id}' ";
      $res  = $db->query($sql2);

      while($rest = $res->fetch_assoc() ) {
       $id_rutina =  $rest['id_rutina'];
      }

      $sql = "SELECT `nombre_rutina`,`ejercicios_rutina` FROM `rutinas` WHERE `id_rutina` =  '{$id_rutina}'";
      $resultado  = $db->query($sql);


      $records = "SELECT `nombre_rutina`,`tipo_record`,`repeticiones/puntos`,`peso`,`tiempo`,`id_usuario`,`ejercicios_rutina`,`id_record`,`fecha_creacion`  from `records` `rec` LEFT OUTER JOIN `rutinas` `rut` on `rut`.`id_rutina` = `rec`.`id_rutina` LEFT OUTER JOIN `tiporecord` `tp` on `tp`.`id_tipo_record` = `rec`.`id_tipo_record` WHERE `id_usuario` = '{$id2}' AND `rec`.`id_rutina` =  '{$id_rutina}' ORDER BY `fecha_creacion` DESC ";
      $resultado5 = $db->query($records);


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
    <script src="../../js/tablas.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>


<main role="main" class="container">
<?php while($registros = $resultado->fetch_assoc() ) { ?>
    <h2><?php echo $registros['nombre_rutina']; ?></h2>
    <br>
    <p><?php echo $registros['ejercicios_rutina']; ?></p>
    <br><br>
<?php  } ?>


  <h2>Historial</h2>
    <table id="example" class="table" >
            <thead class="">
                <tr>
                  <th scope="col">Wod</th>
                  <th scope="col">Tipo Record</th>
                  <th scope="col">Peso</th>
                  <th scope="col">Tiempo</th>
                  <th scope="col">Repeticiones/puntos</th>
                  <th scope="col">Fecha Creación</th>
                </tr>
            </thead>
            <tbody>
              <?php while($records = $resultado5->fetch_assoc() ) { ?>
              <tr>
                <td><?php echo $records['nombre_rutina']; ?></td>
                 <td><?php echo $records['tipo_record']; ?></td>
                 <td><?php echo $records['peso']; ?></td>
                 <td><?php echo $records['tiempo']; ?></td>
                 <td><?php echo $records['repeticiones/puntos']; ?></td>
                 <td><?php echo $records['fecha_creacion']; ?></td>
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
                   <th scope="col">Fecha Creación</th>
                </tr>
            </tfoot>
        </table>


</main>

<script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
