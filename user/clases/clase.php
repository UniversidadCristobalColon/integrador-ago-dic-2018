<?php
/**
 * Created by PhpStorm.
 * User: edveno
 * Date: 12/11/18
 * Time: 09:21
 */
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
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>

</head>

<body>

    <?php require_once '../../scripts/navbar2.php' ?>

    <main role="main" class="container">


        <!------------------------- Fecha -------------------------->

        <div class="row justify-content-center">
            <div class="col" style="text-align: center">
                <ion-icon name="arrow-dropleft" style="font-size: 80px"></ion-icon>
            </div>

            <div class="col-6 " style="text-align: center">
                <label style="font-size: 50px">13/NOV/2018</label>
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
            <form action="#" method="post" id="formulario_nuevo">
                <input type="hidden" value="" name="id">
                <input type="submit" class="btn btn-success " value="Asistiré" name="" id="">
            </form>
            <br>
            <table id="example" class="display table table-hover"  style="width:100%">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Cuaso Ariza Pineda</td>
                </tr>
                <tr>
                    <td>Leticia Pamela Reyes Ramón</td>
                </tr>
                </tbody>
            </table>


        <!------------------------------ Top --------------------------------------->

        <br><br>
        <div class="mx-auto" style="width: 700px;">
            <h1 style="text-align: center">Top 10</h1>
        </div>
        <br>
        <table id="example" class="display table table-hover"  style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Record</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Cuaso Ariza Pineda</td>
                <td>50 Sentadillas</td>
            </tr>
            <tr>
                <td>Leticia Pamela Reyes Ramón</td>
                <td>40 Sentadillas </td>
            </tr>
            </tbody>
        </table>







    </main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>