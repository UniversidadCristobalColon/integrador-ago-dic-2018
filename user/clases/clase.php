<?php
/**
 * Created by PhpStorm.
 * User: edveno
 * Date: 12/11/18
 * Time: 09:21
 */
require_once '../../scripts/config.php';
$Usuario=4;
$Clase=1;
$fecha = date("j / n / y");



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
    <!-- <link href="../../css/controlClientes.css" rel="stylesheet"> !>



    <!-- Archivos JS -->
    <script src="../../js/base.js"></script>
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script
            src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
    </script>
    <script>
        $(document).ready( function () {
            $('#lista').DataTable();
            $('#top').DataTable();

        } );
    </script>

</head>

<body>

    <?php require_once '../../scripts/navbar.php' ?>

    <main role="main" class="container">


        <!------------------------- Fecha -------------------------->

        <div class="row justify-content-center">
            <div class="col" style="text-align: center">
                <ion-icon name="arrow-dropleft" style="font-size: 80px"></ion-icon>
            </div>

            <div class="col-6 " style="text-align: center">
                <label style="font-size: 50px"><?php echo $fecha?></label>
            </div>

            <div class="col" style="text-align: center">
                <ion-icon name="arrow-dropright" style="font-size: 80px"></ion-icon>
            </div>
        </div>

        <br><br>

        <!---------------------------- WOD --------------------------------------->

        <div class="mx-auto" style="width: 700px;">
            <h1 style="text-align: center">WOD</h1>
            <p>Información del workout of the day con todos los ejercicios que comprende el WOD</p>
        </div>
        <!-----------------------------Lista de asistencia ------------------------->


            <br><br>
            <div class="mx-auto" style="width: 700px;">
            <h1 style="text-align: center">Lista de asistencia</h1>
            </div>

            <br>
            <table id="lista" class="display table table-hover"  style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Hora</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                $query="SELECT asistencias.id_usuario, nombre_completo, hora FROM asistencias inner join usuarios on asistencias.id_usuario = usuarios.id_usuario inner join horario on asistencias.id_horario = horario.id_horario";
                $result=mysqli_query($db,$query);
                while ($row=mysqli_fetch_assoc($result)) {
                    $nombre_asist = $row['nombre_completo'];
                    $hora = $row['hora'];
                    echo '<td>' . $nombre_asist. '</td>';
                    echo '<td>' . $hora. '</td>';
                    echo '</tr>';
                }?>

                </tbody>
            </table>

        <div class="mx-auto" style="width: 700px; text-align: center" >
        <h4 style="text-align: center">Agendar asistencia</h4>
        <form action="asistir.php" method="post" id="formulario_nuevo">
            <input type="hidden" value="<?php echo $Usuario?>" name="usuario">
            <input type="hidden" value="<?php echo $Clase?>" name="clase">
            <label>Horario</label>
            <select  id="sel1" name="horario" required>
                <option value="">--Selecciona una hora--</option>
                <?php
                $query="SELECT * FROM horario";
                $result=mysqli_query($db,$query);
                while ($row=mysqli_fetch_assoc($result)) {
                    $id_hora = $row['id_horario'];
                    $horario = $row['hora'];
                    echo '<option value='.$id_hora.'>' . $horario. '</option>';
                }?>
            </select><br>
            <input type="submit" class="btn btn-success " value="Asistiré" method="post">
        </form>
        </div>


        <!------------------------------ Top --------------------------------------->

        <br><br>
        <div class="mx-auto" style="width: 700px;">
            <h1 style="text-align: center">Top 10</h1>
        </div>
        <br>
        <table id="top" class="display table table-hover"  style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo record</th>
                <th scope="col">Record</th>
                <th scope="col">Unidad</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Cuaso Ariza Pineda</td>
                <td>Peso</td>
                <td>100</td>
                <td>Kg</td>
            </tr>
            <tr>
                <td>Leticia Pamela Reyes Ramón</td>
                <td>Peso</td>
                <td>70</td>
                <td>Kg</td>
            </tr>
            </tbody>
        </table>


    </main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>