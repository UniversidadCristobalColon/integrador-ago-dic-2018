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

    <?php

    $selected=1;

    if(isset($_GET['disciplinas']))
    {
        $selected= $_GET['disciplinas'];
    }
    ?>

    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'botonClase, month,listMonth'
                },
                customButtons:{
                    botonClase:{
                        text: "Nueva Clase",
                        click:function(){
                            window.location.href = '../clases/clasenueva.php?id_dis=<?php echo $selected ?>'; //mandar el id de la diciplina
                        }
                    }
                },
                /*dayClick:function(date, jsEvent, view){
                },*/
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events:
                    'eventoClases.php?selected=<?php echo $selected ?>'
            });
        });

    </script>

</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">



    <div class="container">
        <div class="row">
            <div class="col-sm"><h2>Calendario de clases</h2></div>
            <div class="col-sm"></div>
            <div class="col-sm">
                <label for="disciplinas">Disciplina</label>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <select class="custom-select d-block w-100" name="disciplinas" id="disciplinas" onchange="this.form.submit();" required>
                        <?php
                        $sql="SELECT id_disciplina, nombre_disciplina FROM disciplinas";
                        $resul=$db->query($sql);
                        while ($rowm=mysqli_fetch_array($resul))
                        {
                            $p_selected = $selected == $rowm["id_disciplina"] ? 'selected="selected"' : '';
                            $html.="<option value='".$rowm['id_disciplina']."' $p_selected>".$rowm['nombre_disciplina']."</option>";
                        }
                        echo $html;
                        ?>
                    </select>
                </form>
                <div class="invalid-feedback">
                    Favor de seleccionar una disciplina válida..
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-5 mb-3"></div>

    <div id='calendar'></div>


</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
