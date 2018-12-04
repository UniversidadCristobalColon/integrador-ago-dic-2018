<?php
/**
 * Created by PhpStorm.
 * User: edveno
 * Date: 12/11/18
 * Time: 09:21
 */
require_once '../../scripts/config.php';
$Usuario=4;
$hide= 0;

$Clase=  !empty($_GET["id"]) ? $_GET["id"] : '';



if ($Clase == null){
    $Clase = 2;
}

$query="SELECT fecha_clase from clases where id_clase =".$Clase;
$result=mysqli_query($db,$query);
$row=mysqli_fetch_assoc($result);
$fecha = $row['fecha_clase'];




$lenguage = 'es_ES.UTF-8';
putenv("LANG=$lenguage");
setlocale(LC_ALL, $lenguage);
//echo strftime("%A %e %B %Y");//viernes 19 febrero 2010


$q2="SELECT id_clase FROM clases WHERE fecha_clase > '".trim($fecha)."' ORDER BY fecha_clase LIMIT 1";
$r2=mysqli_query($db,$q2);
$row2=mysqli_fetch_assoc($r2);
$despues = $row2['id_clase'];


$q3="SELECT id_clase FROM clases WHERE fecha_clase < '".trim($fecha)."' ORDER BY fecha_clase desc LIMIT 1";
$r3=mysqli_query($db,$q3);
$row3=mysqli_fetch_assoc($r3);
$antes = $row3['id_clase'];


$q4="SELECT * from clases inner join rutinas on clases.id_rutina=rutinas.id_rutina where id_clase = ".$Clase;
$r4=mysqli_query($db,$q4);
$row4=mysqli_fetch_assoc($r4);
$wod = $row4['nombre_rutina'];
$titulo_clase = $row4['titulo_clase'];
$calentamiento = $row4['calentamiento'];
$ejercicios = $row4['ejercicios_rutina'];








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
            $('#records').DataTable();
            $('#top').DataTable();

        } );
    </script>

</head>

<body>

    <?php require_once '../../scripts/navbar.php' ?>

    <main role="main" class="container">


        <!------------------------- Fecha -------------------------->

        <!-- SELECT * FROM clases WHERE fecha_clase > "2018-11-29" ORDER BY fecha_clase LIMIT 1  ;;; strftime -->

        <div class="row justify-content-center">
            <div class="col" style="text-align: center">
                <form action="clase.php" method="get" id="antes">
                    <button type="submit">
                        <ion-icon name="arrow-dropleft" style="font-size: 80px"></ion-icon>
                    </button>
                    <input type="hidden" name="id" value="<?php echo $antes;?>">
                </form>
            </div>

            <div class="col-6 " style="text-align: center">
                <!-- <label style="font-size: 50px"> </label>  -->
                <label style="font-size: 50px"><?php //echo strftime("%A %e %B %Y", $fecha);
                    echo $fecha;?></label>
            </div>

            <div class="col" style="text-align: center">
                <form action="clase.php" method="get" id="despues">
                    <input type="hidden" name="id" value="<?php echo $despues;?>">
                    <button type="submit" >
                        <ion-icon name="arrow-dropright" style="font-size: 80px"></ion-icon>
                    </button>

                </form>
            </div>
        </div>

        <br><br>

        <!---------------------------- WOD --------------------------------------->

        <div class="mx-auto" style="width: 700px;">
            <h1 style="text-align: center"> Titulo : <?php echo $titulo_clase ;?> </h1>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     </h1>
            <p>Calentamiento: <br><?php echo $calentamiento;?></p>
            <p>Ejercicios: <br> <?php echo $ejercicios ;?></p>
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
                $query="SELECT asistencias.id_usuario, nombre_completo, hora FROM asistencias inner join usuarios on asistencias.id_usuario = usuarios.id_usuario inner join horario on asistencias.id_horario = horario.id_horario where id_clase like ".$Clase.";";
                $result=mysqli_query($db,$query);
                while ($row=mysqli_fetch_assoc($result)) {
                    $nombre_asist = $row['nombre_completo'];
                    $hora = substr($row['hora'],0,5);
                    echo '<td>' . $nombre_asist. '</td>';
                    echo '<td>' . $hora. '</td>';
                    echo '</tr>';
                }?>

                </tbody>
            </table>



        <div class="mx-auto" style="width: 700px; text-align: center" id="Agendar" >
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
                    $horario = substr($row['hora'],0,5);

                    echo '<option value='.$id_hora.'>' . $horario. '</option>';
                }?>
            </select><br>
            <input type="submit" class="btn btn-success " value="Asistiré" method="post">
        </form>
        </div>

        <?php
        $q7="SELECT * from asistencias inner join clases on asistencias.id_clase = clases.id_clase where asistencias.id_clase = ". $Clase ." and asistencias.id_usuario = ". $Usuario;
        $r7=mysqli_query($db,$q7);
        $row7=mysqli_fetch_assoc($r7);
        $asist = $row7['id_usuario'];


        if($asist!= null ){

            $hide = 1;
        }

        echo '
        <script>
            if ( '.$hide.'== 1){
                $("#Agendar").hide();
            }
                
        </script> ';

        ?>

        <!------------------------------ Records --------------------------------------->

        <?php
        $query="SELECT records.id_tipo_record from records inner join tiporecord on records.id_tipo_record = tiporecord.id_tipo_record";
        $result=mysqli_query($db,$query);
        $row=mysqli_fetch_assoc($result);
        $id_tipo_record = $row['id_tipo_record'];

        if($id_tipo_record== "1"){

        }else if($id_tipo_record=="2"){
            $tiporecord1="repeticiones/puntos";
            $tiporecord2="id_unidad_puntos";
        } else {
            $tiporecord1="tiempo";
            $tiporecord2="peso";
        }

        ?>

        <br><br>
        <div class="mx-auto" style="width: 700px;">
            <h1 style="text-align: center">Récords</h1>
        </div>
        <br>
        <table id="records" class="display table table-hover"  style="width:100%">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Rutina</th>
                <th scope="col">Tipo record</th>
                <th scope="col">Record</th>
                <th scope="col">Unidad</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $query="SELECT records.id_tipo_record from records inner join tiporecord on records.id_tipo_record = tiporecord.id_tipo_record";
                $result=mysqli_query($db,$query);
                $row=mysqli_fetch_assoc($result);
                $id_tipo_record = $row['id_tipo_record'];


                if($id_tipo_record== "1"){ //----------------------------------------------------    Peso -----------------------------------------

                    $query="SELECT usuarios.nombre_completo, rutinas.nombre_rutina, tiporecord.tipo_record, records.peso , tipounidadpeso.desc_tipo_unidad_peso FROM records 
                        inner join usuarios on records.id_usuario = usuarios.id_usuario 
                        inner join rutinas on records.id_rutina = rutinas.id_rutina 
                        inner join tiporecord on records.id_tipo_record = tiporecord.id_tipo_record 
                        inner join tipounidadpeso on records.id_unidad_peso = tipounidadpeso.id_tipo_unidad_peso 
                        where records.id_clase like ".$Clase;

                    $result=mysqli_query($db,$query);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $nombre_record = $row['nombre_completo'];
                        $rutina_record = $row['nombre_rutina'];
                        $tipo_record = $row['tipo_record'];
                        $record = $row['peso'];
                        $unidad = $row['desc_tipo_unidad_peso'];
                        echo '<td>' . $nombre_record. '</td>';
                        echo '<td>' . $rutina_record. '</td>';
                        echo '<td>' . $tipo_record. '</td>';
                        echo '<td>' . $record. '</td>';
                        echo '<td>' . $unidad. '</td>';
                        echo '</tr>';
                    }


                }else if($id_tipo_record=="2"){ //----------------------------------------------------     Puntos/repeticiones  -----------------------------------------


                    $query="SELECT usuarios.nombre_completo, rutinas.nombre_rutina, tiporecord.tipo_record, records.peso , tipounidadpeso.desc_tipo_unidad_peso FROM records 
                        inner join usuarios on records.id_usuario = usuarios.id_usuario 
                        inner join rutinas on records.id_rutina = rutinas.id_rutina 
                        inner join tiporecord on records.id_tipo_record = tiporecord.id_tipo_record 
                        inner join tipounidadpeso on records.id_unidad_peso = tipounidadpeso.id_tipo_unidad_peso 
                        where records.id_clase like ".$Clase;

                    $result=mysqli_query($db,$query);
                    while ($row=mysqli_fetch_assoc($result)) {
                        $nombre_record = $row['nombre_completo'];
                        $rutina_record = $row['nombre_rutina'];
                        $tipo_record = $row['tipo_record'];
                        $record = $row['peso'];
                        $unidad = $row['desc_tipo_unidad_peso'];
                        echo '<td>' . $nombre_record. '</td>';
                        echo '<td>' . $rutina_record. '</td>';
                        echo '<td>' . $tipo_record. '</td>';
                        echo '<td>' . $record. '</td>';
                        echo '<td>' . $unidad. '</td>';
                        echo '</tr>';
                    }


                } else { //----------------------------------------------------     Tiempo  -----------------------------------------
                        $query="SELECT usuarios.nombre_completo, rutinas.nombre_rutina, tiporecord.tipo_record, records.peso , tipounidadpeso.desc_tipo_unidad_peso FROM records 
                            inner join usuarios on records.id_usuario = usuarios.id_usuario 
                            inner join rutinas on records.id_rutina = rutinas.id_rutina 
                            inner join tiporecord on records.id_tipo_record = tiporecord.id_tipo_record 
                            inner join tipounidadpeso on records.id_unidad_peso = tipounidadpeso.id_tipo_unidad_peso 
                            where records.id_clase like ".$Clase;

                        $result=mysqli_query($db,$query);
                        while ($row=mysqli_fetch_assoc($result)) {
                            $nombre_record = $row['nombre_completo'];
                            $rutina_record = $row['nombre_rutina'];
                            $tipo_record = $row['tipo_record'];
                            $record = $row['peso'];
                            $unidad = $row['desc_tipo_unidad_peso'];
                            echo '<td>' . $nombre_record. '</td>';
                            echo '<td>' . $rutina_record. '</td>';
                            echo '<td>' . $tipo_record. '</td>';
                            echo '<td>' . $record. '</td>';
                            echo '<td>' . $unidad. '</td>';
                            echo '</tr>';
                        }
                }

                ?>

            </tbody>
        </table>






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