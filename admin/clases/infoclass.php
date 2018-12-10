<?php
    session_start();
    require_once '../../scripts/config.php';
    require_once '../../scripts/funciones_php.php';




    //Informacion de la clase
    $id_clase=$_REQUEST['id'];
    $sql = "SELECT count(clases.id_clase) AS count,
                  clases.id_rutina AS idrutina,
                  titulo_clase,
                  calentamiento,
                  fecha_clase,
                  hora_revelacion,
                  clases.id_tipo_record AS idrecord,
                  nombre_rutina,
                  ejercicios_rutina,
                  tipo_record
            FROM clases 
            INNER JOIN rutinas ON rutinas.id_rutina=clases.id_rutina
            INNER JOIN tiporecord ON tiporecord.id_tipo_record=clases.id_tipo_record
            WHERE id_clase=$id_clase";

    $result = mysqli_query($db, $sql);
    $valores = mysqli_fetch_assoc($result);

    if($id_clase==""){
        echo "<script>window.location.href = 'index.php';</script>";
    }else{
       if($valores['count']==0){
           echo "<script>window.location.href = 'index.php';</script>";
       }
    }

    if(isset($_POST['submit'])){
        $id_asis = $_POST['id_asistencia'];
        $idcla = $_POST['id_clase'];
        $id_us = $_POST['id_usuario'];
        $sql_borrar ="UPDATE asistencias
                    SET asistencia ='0'
                    WHERE id_asistencia=$id_asis
                    AND id_clase = $idcla
                    AND id_usuario= $id_us";
        echo $sql_borrar;
        $resultado = mysqli_query($db, $sql_borrar);
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

    <link rel="icon" href="../../img/favicon.png">

    <!-- Hojas de estilos -->
    <link href="../../css/base.css" rel="stylesheet">

    <!-- Archivos JS -->
    <script src="../../js/base.js"></script>

    <!--selectpcker -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://www.jqueryscript.net/demo/Bootstrap-4-Chosen-Plugin/dist/css/component-chosen.css" rel="stylesheet">
</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">
    <div class="starter-template">
        <div class="col-md-12 order-md-1">
            <h1 class="mb-3"><?php echo $valores['titulo_clase']; ?></h1>
            <form class="needs-validation" novalidate>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#informacion" role="tab" aria-controls="home" aria-selected="true">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#asistencia" role="tab" aria-controls="profile" aria-selected="false">Asistencia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#top" role="tab" aria-controls="contact" aria-selected="false">TOP</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="informacion" role="tabpanel" aria-labelledby="home-tab">
                        <!-- Contenido de la información -->

                        <br>
                        <div class="row">
                            <div class="col-md-9 mb-2">
                            </div>
                            <div class="col-md-3 mb-2">
                            <button class="btn btn-primary btn-sm btn-block" type="button" onClick="location.href='clasenueva.php?id='+<?php echo $id_clase;?>">Editar clase</button>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>FECHA DE LA CLASE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input class="form-control" value="<?php echo fecha_larga($valores['fecha_clase']); ?>" readonly></td>
                            </tr>
                            </tbody>
                            <thead class="thead-dark">
                            <tr>
                                <th scope="row" colspan="2">CALENTAMIENTO</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="2">
                                    <textarea class="form-control" rows="10" readonly><?php echo $valores['calentamiento']; ?></textarea>
                            </tr>
                            </tbody>
                            <thead class="thead-dark">
                            <tr>
                                <th scope="row" colspan="2">RUTINA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="2">TÍTULO DE LA RUTINA: <br><input class="form-control" value="<?php echo $valores['nombre_rutina'];?>" readonly></td>
                            </tr>
                            <tr>
                                <input type="hidden" id="idrecord" name="idrecord" value="<?php echo $valores['idrecord']; ?>">
                                <td colspan="2">TIPO DE RÉCORD: <br><input class="form-control" value="<?php  echo desctiporecord($valores['idrecord'], $id_clase); ?>" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="2">DESCRIPCIÓN DE LA RUTINA:
                                <textarea class="form-control" rows="10" readonly><?php echo stripslashes($valores['ejercicios_rutina']); ?></textarea>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <div class="tab-pane fade" id="asistencia" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- Contenido de la asistencia -->
                        <br>
                        <div class="row">
                            <div class="col-md-8 mb-2">
                                <select id="optgroup" name="id_select[]" class="form-control form-control-chosen" data-placeholder="Escriba el nombre..." multiple required>
                                    <optgroup label="A">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'A%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="B">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'B%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="C">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'C%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="D">
                                    <?php
                                    $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'D%'
                                            ORDER BY nombre_completo";
                                    $result=mysqli_query($db,$query);
                                    while ($valores=mysqli_fetch_assoc($result)) {
                                        echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                    }
                                    ?>
                                    </optgroup>
                                    <optgroup label="E">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'E%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="F">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'F%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="G">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'G%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="H">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'H%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="I">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'I%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="J">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'J%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="K">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'K%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="L">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'L%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="M">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'M%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="N">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'N%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="O">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'O%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="P">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'P%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="Q">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'Q%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="R">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'R%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="S">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'S%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="T">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'T%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="U">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'U%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="V">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'V%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="W">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'W%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="X">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'X%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="Y">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'Y%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                    <optgroup label="Z">
                                        <?php
                                        $query="SELECT id_usuario, nombre_completo 
                                            FROM usuarios
                                            WHERE nombre_completo 
                                            LIKE 'Z%'
                                            ORDER BY nombre_completo";
                                        $result=mysqli_query($db,$query);
                                        while ($valores=mysqli_fetch_assoc($result)) {
                                            echo '<option value="'.$valores[id_usuario].'">'.$valores[nombre_completo].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <select class="custom-select d-block w-100" name="id_hora" id="id_hora"required>
                                    <option value="">Hora</option>
                                    <?php
                                    $query="select * from horario";
                                    $result=mysqli_query($db,$query);
                                    while ($valores=mysqli_fetch_assoc($result)) {
                                        echo '<option value="'.$valores[id_horario].'">'.$valores[hora].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <input type="hidden" id="id_clase" name="id_clase" value="<?php echo $id_clase; ?>">
                                <button id="agregarAsis" class="btn btn-primary btn-md btn-block" type="button">Agregar asistencias</button>
                            </div>
                        </div>
                        <br>
                        <hr>

                        <table id="tableAsis" name="tableAsis" class="table table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th >Hora</th>
                                <th >Nombre</th>
                                <th >Adeudo</th>
                                <th >Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php

                                $buscar_asistencia="SELECT id_asistencia,
                                                            nombre_completo, 
                                                            asistencia, 
                                                            hora, 
                                                            clases.id_clase AS idclase,
                                                            asistencias.id_usuario AS idusuario,
                                                            dias_pago
                                                    FROM usuarios
                                                    INNER JOIN asistencias ON usuarios.id_usuario = asistencias.id_usuario
                                                    INNER JOIN horario ON asistencias.id_horario = horario.id_horario
                                                    INNER JOIN clases ON asistencias.id_clase = clases.id_clase
                                                    WHERE asistencias.id_clase =$id_clase
                                                    AND asistencia=1 ORDER BY hora";
                                $result=mysqli_query($db,$buscar_asistencia);
                                while($row=mysqli_fetch_array($result)){

                                ?>
                                    <tr>
                                        <td><?php echo $row['hora'];?></td>
                                        <td><?php echo $row['nombre_completo'];?></td>
                                        <td><?php
                                            date_default_timezone_set('America/Mexico_City');
                                            $fecha = date('d-m-Y');
                                            $dia = date('d',strtotime($fecha));
                                            if($dia>=$row['dias_pago']){
                                                echo "<img style=\"width:25px;height:25px;\" src=\"../../img/bag.svg\">";
                                            }
                                            ?>
                                        </td>
                                        <td><a href="eliminarAsistencia.php?id=<?php echo $row['id_asistencia']; ?>&idc=<?php echo $id_clase; ?>"><img title="Eliminar asistencia" src="../../img/icons8-trash-24.png"></a></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane fade" id="top" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- Contenido del TOP -->
                        <br>
                        <?php
                            $record_count ="SELECT count(usuarios.id_usuario) AS count
                                            FROM usuarios
                                            INNER JOIN asistencias ON asistencias.id_usuario = usuarios.id_usuario
                                            INNER JOIN clases ON clases.id_clase = asistencias.id_clase
                                            INNER JOIN tiporecord ON tiporecord.id_tipo_record = clases.id_tipo_record
                                            WHERE asistencias.id_clase=$id_clase AND asistencia =1";
                            $resultado=mysqli_query($db,$record_count);
                            $valores_count = mysqli_fetch_assoc($resultado);
                            if($valores_count['count']>0){
                                echo "<table id=\"tableTop\" class=\"table\">
                                    <thead class=\"thead-dark\">
                                    <tr>
                                        <th scope=\"col\">Puesto</th>
                                        <th scope=\"col\">Nombre</th>
                                        <th scope=\"col\">Record</th>
                                        <th scope=\"col\">Nivel</th>
                                        <th scope=\"col\">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>";

                                $buscar_record = "SELECT usuarios.id_usuario AS iduser, nombre_completo,  clases.id_tipo_record AS idtiporecord, id_tipo_unidad_peso, id_unidad_puntos,tipo_record, fecha_clase 
                                                FROM usuarios
                                                INNER JOIN asistencias ON asistencias.id_usuario = usuarios.id_usuario
                                                INNER JOIN clases ON clases.id_clase = asistencias.id_clase
                                                INNER JOIN tiporecord ON tiporecord.id_tipo_record = clases.id_tipo_record
                                                WHERE asistencias.id_clase=$id_clase AND asistencia =1";
                                $result = mysqli_query($db, $buscar_record);
                                $num = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $nivel = nivel_cliente($id_clase, $row['iduser']);
                                    $record = record_cliente($row['idtiporecord'], $id_clase, $row['iduser']);
                                    $nota = record_nota($row['iduser'],$id_clase);
                                    $datos_record=$row['nombre_completo']."||".$record."||".$nivel."||".$row['idtiporecord']."||".$nota."||".$row['iduser']."||".$id_clase."||".$row['id_tipo_unidad_peso']."||".$row['id_unidad_puntos']."||".$row['fecha_clase'];


                                $num = $num + 1;
                                echo "<td>" . $num . "</td>";
                                ?>
                                    <td><?php echo $row['nombre_completo']; ?></td>
                                    <td><?php echo record_cliente($row['idtiporecord'], $id_clase, $row['iduser']); ?></td>
                                    <td><?php echo nivel_cliente($id_clase, $row['iduser']); ?></td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm btn-block" type="button"
                                                data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" onclick="agregarRecord('<?php echo $datos_record;?>')">
                                            Editar
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                }
                            }else{
                                echo "<table id=\"tableTop\" class=\"table\">
                                    <thead class=\"thead-dark\">
                                    <tr>
                                        <th scope=\"col\">Puesto</th>
                                        <th scope=\"col\">Nombre</th>
                                        <th scope=\"col\">Record</th>
                                        <th scope=\"col\">Nivel</th>
                                        <th scope=\"col\">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>";


                            }
                            ?>
                            </tbody>
                        </table>

                        <!-- Modal para agregar el Record del cliente-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="record_nombre"></h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <input type="hidden" id="recordid" name="">
                                                <input type="hidden" id="recordiduser" name="">
                                                <input type="hidden" id="recordclase" name="">
                                                <input type="hidden" id="recordrecord" name="">
                                                <input type="hidden" id="recordunidad_puntos" name="">
                                                <input type="hidden" id="recordunidad_peso" name="">
                                                <input type="hidden" id="recordfecha" name="">

                                                <label for="recipient-name" id="" class="col-form-label">Record</label>
                                                <input class="form-control"  type="text" id="record_puntaje" name="record_puntaje">


                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select d-block w-100" id="recordnivel" required>
                                                    <option value="">Selecciona un nivel</option>
                                                    <?php
                                                    $query="select * from niveles_rutina";
                                                    $result=mysqli_query($db,$query);
                                                    while ($valores=mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$valores[id_nivel_rutina].'">'.$valores[nivel].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Notas:</label>
                                                <textarea class="form-control" rows="3"  id="recordnota"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" id="actualizaDatos" data-dismiss="modal">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>
    </div>

</main>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>
<script src="../../js/jquery.rowspanizer.min.js"></script>

<script type="text/javascript">
    $('.form-control-chosen').chosen({
        allow_single_deselect: true,
        width: '100%'
    });


    $('.form-control-chosen-optgroup').chosen({
        width: '100%'
    });
    $(function() {
        $('[title="clickable_optgroup"]').addClass('chosen-container-optgroup-clickable');
    });
    $(document).on('click', '[title="clickable_optgroup"] .group-result', function() {
        var unselected = $(this).nextUntil('.group-result').not('.result-selected');
        if(unselected.length) {
            unselected.trigger('mouseup');
        } else {
            $(this).nextUntil('.group-result').each(function() {
                $('a.search-choice-close[data-option-array-index="' + $(this).data('option-array-index') + '"]').trigger('click');
            });
        }
    });
</script>

<script>
    $(document).ready(function(){
        $("#agregarAsis").click(function () {
            var idclase = $('#id_clase').val();
            var idhora = $('#id_hora').val();
            var idsselected = $('#optgroup').val();
            console.log(idhora);
            console.log(idclase);

            if(idhora!=""){
                if(idsselected!=""){
                    $.ajax({
                        type: 'post',
                        url: 'agregarAsistencia.php',
                        data: {
                            id_clase: idclase,
                            id_hora: idhora,
                            id_select: idsselected
                        },
                        success: function (response) {
                            console.log(response);
                            switch (response) {
                                case '1':
                                    alert('Se actualizaron las asistencias.');
                                    window.location.href = 'infoclass.php?id='+idclase;
                                    break;
                                case '2':
                                    alert('Todos tienen asistencia.');
                                    break;

                            }
                        }
                    });//termina ajax

                }else{
                    alert("No ha seleccionado los asistentes");
                }
            }//termina el if
            else{
                alert("No ha seleccionado la hora");
            }
        });
    });
</script>

<!-- datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready( function () {
        $('#tableTop').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    } );
</script>

<script>
    $(document).ready( function () {

        $('#tableAsis').rowspanizer({
            columns: [0]
        });

        $('#actualizaDatos').click(function(){
            var iduser = $('#recordiduser').val();
            var idrecord = $('#recordid').val();
            var idpeso = $('#recordunidad_peso').val();
            var idpuntos = $('#recordunidad_puntos').val();
            var puntaje = $('#record_puntaje').val();
            var fecha = $('#recordfecha').val();
            var idclase = $('#recordclase').val();
            var nota = $('#recordnota').val();
            var idnivel = $('#recordnivel').val();

            if(idrecord!="") {
                if(idnivel!="") {
                    $.ajax({
                        type: 'post',
                        url: 'actualizaRecords.php',
                        data: {
                            id_user: iduser,
                            id_record: idrecord,
                            id_peso: idpeso,
                            id_puntos: idpuntos,
                            record_puntaje: puntaje,
                            record_fecha: fecha,
                            id_clase: idclase,
                            notas: nota,
                            id_nivel: idnivel
                        },
                        success: function (response) {
                            console.log(response);
                            switch (response) {
                                case '1':
                                    alert('Se actualizaron los records.');
                                    window.location.href = 'infoclass.php?id=' + idclase;
                                    break;
                            }
                        }
                    });//termina ajax
                }else{
                    alert("No ha seleccionado unu nivel.");
                }
            }else{
                alert("Debe escribir un record.");
            }



        });


    });


</script>
</body>
</html>
