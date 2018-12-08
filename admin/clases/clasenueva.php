<?php
    require_once '../../scripts/config.php';

    $id_disciplina=1;
    $id_clase = $_REQUEST['id'];


    $sql="SELECT nombre_disciplina 
              FROM disciplinas
              WHERE id_disciplina=$id_disciplina";

    $result = mysqli_query($db,$sql);
    $valores=mysqli_fetch_assoc($result);
    $disciplina =$valores['nombre_disciplina'];

    date_default_timezone_set('America/Mexico_City');
    $fecha = date('d-m-Y');
    $dia = date('d',strtotime($fecha));
    $mes = date('m',strtotime($fecha));
    $anio = date('Y',strtotime($fecha));

    if($id_clase!=""){
        $sql_clase = "SELECT clases.id_rutina AS idrutina,
                          titulo_clase,
                          calentamiento,
                          fecha_clase,
                          hora_revelacion,
                          clases.id_tipo_record AS idrecord,
                          clases.id_tipo_unidad_peso AS idunidad,
                          nombre_rutina,
                          ejercicios_rutina,
                          tipo_record
                    FROM clases 
                    INNER JOIN rutinas ON rutinas.id_rutina=clases.id_rutina
                    INNER JOIN tiporecord ON tiporecord.id_tipo_record=clases.id_tipo_record
                    WHERE id_clase=$id_clase";

        $result_clase = mysqli_query($db, $sql_clase);
        $valores_clase = mysqli_fetch_assoc($result_clase);

        $titulo = $valores_clase['titulo_clase'];
        $fecha_clase = date('d-m-Y',strtotime($valores_clase['fecha_clase']));
        $titulos_clase = $valores_clase['titulo_clase'];
        $titulo_rutina = $valores_clase['nombre_rutina'];
        $calentamiento = $valores_clase['calentamiento'];
        $ejercicios = $valores_clase['ejercicios_rutina'];
        $boton="Guardar";
        $idclase = $id_clase;
        $id_rutina=$valores_clase['idrutina'];
        if ($valores_clase['idunidad']==0){
            $disabled = 'disabled';
        }else{
            $disabled= '';
        }
    }else{
        $titulo  = "Nueva clase (".$disciplina.")";
        $fecha_clase = $fecha;
        $titulos_clase = $dia."".$mes."".$anio;
        $titulo_rutina= $dia."".$mes."".$anio;
        $calentamiento ="";
        $ejercios = "";
        $boton="Crear clase";
        $idclase=-1;
        $id_rutina=-1;
        $disabled = 'disabled';
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

    <!--selectpicker -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://www.jqueryscript.net/demo/Bootstrap-4-Chosen-Plugin/dist/css/component-chosen.css" rel="stylesheet">

    <!--datepicker -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../../js/core.js" type="text/javascript"></script>
    <script src="../../js/datepickert.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

<?php require_once '../../scripts/navbar.php' ?>

<main role="main" class="container">
    <div class="starter-template">
            <div class="col-md-12 order-md-1">
                <h1 class="mb-3"><?php echo $titulo; ?></h1>
                <form class="needs-validation" action="guardarClase.php" method="POST" >
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="fecha">Fecha</label>
                            <input id="datepicker" id="fecha" name="fecha" value="<?php echo $fecha_clase; ?>" required>
                            <script>
                                /*
                                var today = new Date();
                                var day = today.getDate();
                                var month = today.getMonth();
                                var year = today.getFullYear();
                                var fecha = day+"-"+month+"-"+year;

                                //console.log(fecha);
                                */

                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap4',
                                    format: 'd-m-yyyy',
                                    locale: 'es-es',

                                });

                                $('#datepicker').attr("readonly",true);
                            </script>

                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="hora">Hora de revelación</label>
                            <select name="hora_revelacion" class="custom-select d-block w-100" id="horaRevelacion" name="horarevelacion" required>
                                <option value="">Selecciona...</option>
                                <?php
                                $query="SELECT * FROM horario";
                                $result=mysqli_query($db,$query);
                                while ($valores=mysqli_fetch_assoc($result)){
                                    $hora =""+$valores[hora];
                                    if($id_clase!=0){
                                        if($hora==$valores_clase['hora_revelacion']){
                                            echo '<option value="'.$valores[hora].'" selected >'.$valores[hora].'</option>';
                                        }else{
                                            echo '<option value="'.$valores[hora].'" >'.$valores[hora].'</option>';
                                        }
                                    }else{
                                        if($hora=='21:00:00'){
                                            echo '<option value="'.$valores[hora].'" selected >'.$valores[hora].'</option>';
                                        }else{
                                            echo '<option value="'.$valores[hora].'" >'.$valores[hora].'</option>';
                                        }
                                    }


                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="record">Tipo de record</label>
                            <select name="tipo_record" class="custom-select d-block w-100" id="tipoRecord" required>
                                <option value="">Selecciona...</option>
                                <?php
                                $query="SELECT id_tipo_record, tipo_record 
                                        FROM tiporecord
                                        ORDER BY tipo_record ASC";
                                $result=mysqli_query($db,$query);
                                while ($valores=mysqli_fetch_assoc($result)) {
                                    if($id_clase!=0) {
                                        if($valores['id_tipo_record']==$valores_clase['idrecord']){
                                            echo '<option value="'.$valores[id_tipo_record].'" selected>'.$valores[tipo_record].'</option>';
                                        }else{
                                            echo '<option value="'.$valores[id_tipo_record].'">'.$valores[tipo_record].'</option>';
                                        }
                                    }else{
                                        echo '<option value="'.$valores[id_tipo_record].'">'.$valores[tipo_record].'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="peso">Tipo de unidad</label>
                            <select name="id_tipo_peso" class="custom-select d-block w-100" id="tipoUPeso" <?php echo $disabled; ?>>
                                <option value="-1">Selecciona...</option>
                                <?php
                                $query="SELECT id_tipo_unidad_peso, desc_tipo_unidad_peso
                                        FROM tipounidadpeso
                                        ORDER BY desc_tipo_unidad_peso ASC";
                                $result=mysqli_query($db,$query);
                                while ($valores=mysqli_fetch_assoc($result)) {
                                    if($id_clase!=0){
                                        if($valores['id_tipo_unidad_peso']==$valores_clase['idunidad']){
                                            echo '<option value="'.$valores[id_tipo_unidad_peso].'" selected>'.$valores[desc_tipo_unidad_peso].'</option>';
                                        }else{
                                            echo '<option value="'.$valores[id_tipo_unidad_peso].'">'.$valores[desc_tipo_unidad_peso].'</option>';
                                        }
                                    }else{
                                        echo '<option value="'.$valores[id_tipo_unidad_peso].'">'.$valores[desc_tipo_unidad_peso].'</option>';
                                    }

                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <input type="hidden" id="codigo_clase" name="codigo_clase" value="<?php echo $titulos_clase; ?>">
                            <label for="titulo_clase">Título de la clase</label>
                            <input type="text" name="titulo_clase" class="form-control" id="tituloClaseID"  value="<?php echo $titulos_clase; ?>" required>
                            <br>
                            <label for="calentamiento">Descripción del calentamiento</label>
                            <textarea name="calentamiento" class="form-control" id="textCalentamientoID" rows="10" required><?php echo $calentamiento; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <h1>Rutina</h1>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button class="btn btn-secondary btn-sm btn-block" type="button" data-toggle="modal" data-target="#modalRutina" data-whatever="@mdo">Agregar rutina</button>
                                </div>
                                <!--
                                <div class="col-md-2 mb-3">
                                    <button id="editarRutinaID" data-estado="apagado" class="btn btn-secondary btn-sm btn-block" type="button" disabled>Editar rutina</button>
                                </div>
                                -->
                                <div class="col-md-2 mb-3">
                                    <button id="borrarRutinaID" class="btn btn-secondary btn-sm btn-block" type="button" >Borrar rutina</button>
                                </div>

                            </div>
                                <div>

                                    <input type="hidden" id="id_rutina" name="id_rutina" value="<?php echo $id_rutina;?>">
                                    <label for="nombre_rutina">Título de la rutina</label>
                                    <input type="text" name="nombre_rutina" class="form-control" value="<?php echo $titulo_rutina; ?>" id="tituloRutinaID">
                                    <br>
                                    <label for="ejercicios_rutina">Descripción de la rutina</label>
                                    <textarea name="ejercicios_rutina" id="textDescRutinaID"  class="form-control" rows="10" required><?php echo $ejercicios; ?></textarea><br>

                                </div>
                            <div class="row">
                                <div class="col-md-10 mb-2">
                                </div>
                                <div class="col-md-2 mb-2">
                                    <input type="hidden" id="id_clase" name="id_clase" value="<?php echo $idclase;?>">
                                    <button id="enviarDatos" class="btn btn-primary btn-md btn-block" type="submit"><?php echo $boton;?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                    <!-- Modal para agregar las rutinas-->
                    <div class="modal fade" id="modalRutina" tabindex="-1" role="dialog" aria-labelledby="modalListaRutinas" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalListaRutinas">Rutinas</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div>
                                        <select id="selectRutinaID" class="form-control form-control-chosen" data-placeholder="Seleccione la rutina...">
                                            <option></option>
                                            <?php
                                            $query="SELECT id_rutina, nombre_rutina, id_disciplina
                                                    FROM rutinas
                                                    WHERE id_disciplina = $id_disciplina
                                                    ORDER BY nombre_rutina ASC";
                                            $result=mysqli_query($db,$query);
                                            while ($valores=mysqli_fetch_assoc($result)) {
                                                echo '<option value="'.$valores[id_rutina].'">'.$valores[nombre_rutina].'</option>';
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="agregarRutinaID" class="btn btn-primary" data-dismiss="modal"  >Agregar</button>
                                            <button type="button" id="agregarRutinaID" class="btn btn-secondary" data-dismiss="modal"  >Cancelar</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.6/chosen.jquery.min.js"></script>



<script type="text/javascript">
    $('.form-control-chosen').chosen({
        allow_single_deselect: true,
        width: '100%'
    });

</script>

<script>
    $(document).ready(function () {
        $('#agregarRutinaID').click(function () {
            var id_rutina = $("#modalRutina #selectRutinaID").val().trim();
            var data = 'id_rutina='+id_rutina;

            $.ajax({
                type:'post',
                url:'agregarRutinas.php',
                data:data,
                dataType:'json',
                success:function(datos){
                    $('#textDescRutinaID').val(datos.ejercicios);
                    $('#tituloRutinaID').val(datos.nombre);

                    //$("#editarRutinaID").prop("readonly", false);
                   // $("#borrarRutinaID").prop("disabled", false);
                    $('#id_rutina').val(id_rutina);
                }
            });


        });
        /*
        $("#editarRutinaID").on("click", function(event){
            var estado = $(this).data("estado");

            if(estado == 'apagado'){
                $(this).data("estado",'encendido');
                $("#textDescRutinaID").prop("disabled", false);
                $("#tituloRutinaID").prop("disabled", false);

            }else{
                $(this).data("estado",'apagado');
                $("#textDescRutinaID").prop("disabled", true);
                $("#tituloRutinaID").prop("disabled", true);
            }
            event.preventDefault();
        });
        */
        $("#borrarRutinaID").on("click", function(){
            $('#textDescRutinaID').val('');
            $('#tituloRutinaID').val('');
            $('#id_rutina').val('-1');

            event.preventDefault();
        });

        $("#tipoRecord").change(function(){
            var texto = $(this).find('option:selected').text();
            if(texto =='Peso'){
                $("#tipoUPeso").prop("disabled", false);
            }else{
                $("#tipoUPeso").prop("disabled", true);
                $("#tipoUPeso option:eq(0)").prop("selected",true);
            }

        });
    });
</script>


</body>
</html>
