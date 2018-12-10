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
    <link href='../../css/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
    <link href='../../css/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    <!-- Archivos JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../js/base.js"></script>
    <script src='../../js/fullcalendar/moment.min.js'></script>
    <script src='../../js/fullcalendar/fullcalendar.min.js'></script>
    <script src="../../js/es.js"></script>

    <script>

        $(document).ready(function() {

            $('#calendar2').fullCalendar({
                defaultView: 'listMonth',
                header: {
                    left: 'prev,next today',
                    center: 'title'
                },
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "mre" link when too many events
                events: 'eventoClases.php'
            });

        });

    </script>

</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">

    <h2>Clases</h2><br>

    <form>
        Disciplina:
        <select class="custom-select d-block w-100" id="country" required>
            <?php
                $sql="SELECT id_disciplina, nombre_disciplina FROM disciplinas";
                $resul=$db->query($sql);
                $html="<option value='0'>Elige una disciplina...</option>";
                while ($rowm=mysqli_fetch_array($resul))
                {
                    $html.="<option value='".$rowm['id_disciplina']."'>".$rowm['nombre_disciplina']."</option>";
                }
                echo $html;
            ?>
        </select><br>
    </form>
    <div>


    </div>
    <div id='calendar2'></div>


</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
