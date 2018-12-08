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
                    center: 'title',
                    right: 'customButtons, listMonth'
                },
                customButtons: {
                    datePickerButton: {
                        themeIcon:'circle-triangle-s',
                        click: function () {


                            var $btnCustom = $('.fc-datePickerButton-button'); // name of custom  button in the generated code
                            $btnCustom.after('<input type="hidden" id="hiddenDate" class="datepicker"/>');

                            $("#hiddenDate").datepicker({
                                showOn: "button",

                                dateFormat:"yy-mm-dd",
                                onSelect: function (dateText, inst) {
                                    $('#calendar').fullCalendar('gotoDate', dateText);
                                },
                            });

                            var $btnDatepicker = $(".ui-datepicker-trigger"); // name of the generated datepicker UI
                            //Below are required for manipulating dynamically created datepicker on custom button click
                            $("#hiddenDate").show().focus().hide();
                            $btnDatepicker.trigger("click"); //dynamically generated button for datepicker when clicked on input textbox
                            $btnDatepicker.hide();
                            $btnDatepicker.remove();
                            $("input.datepicker").not(":first").remove();//dynamically appended every time on custom button click

                        }
                    }
                },
                /*dayClick:function(date, jsEvent, view){

                },*/
                /*defaultDate: '2018-03-12',*/
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'http://localhost:8888/int2018/user/clases/eventoClases.php'
            });

        });

    </script>

</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">

    <h2>Clases</h2><br>

    <form>
        Fecha (mes y año):
        <input type="month" name="fecha"><br>
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
