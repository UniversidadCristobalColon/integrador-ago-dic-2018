<?php

                    try {

                        require_once('../../../scripts/config.php');

                        $correcto= isset($_GET['success']);
                        $repetido= isset($_GET['repetido']);
                        $_SESSION['user'] = 4;

                        $record = "SELECT * FROM `tipousuario`";
                        $resultado3 = $db->query($record);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Archivos JS -->
    <script src="../../../js/base.js"></script>
    <script src="../../../js/validar.js"></script>




</head>

<body>

<?php require_once '../../../scripts/navbar.php' ?>

<main role="main" class="container">

    <form action="guardarbase.php" method="post" onsubmit="return validar()">

        <h2>Registro de Usuario</h2>
        <?php
        if($correcto == 1){?>
            <div id="anuncio" class="alert alert-success mb-3"> ¡El usuario ha sido registrado correctamente!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="location.href='index.php'" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <?php $correcto=0; }?>
        <?php
        if($repetido == 1){?>
            <div  id="anuncio"  class="alert alert-warning mb-3">¡Intentalo de nuevo! El nombre de usuario ya existe.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php $repetido=0; }?>

        <div class="row mb-3">
            <div class="col-md-12">
                <input type="submit" name="guardar" value="Guardar" class="btn btn-success">
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nombre completo</label>
                <input type="text" name="nombre" class="form-control" maxlength="100" required>
            </div>

            <div class="col-md-6">
                <label>Nombre usuario</label>
                <input type="text" name="nombrecorto" class="form-control" maxlength="50" required>
            </div>

        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="email">Email <span class="text-muted"></span></label>
                <input type="text" class="form-control" maxlength="45" name="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>


            <div class="col-md-4">
                <label>Celular</label>
            <input type="text" name="celular" class="form-control" maxlength="13" required>
            </div>
            <div class="col-md-4">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control" maxlength="13" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Contraseña</label>
                <input type="password" name="contrasena" min="5" max="10" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label>Repetir contraseña</label>
                <input type="password" name="contrasena2" min="5" max="10"  class="form-control" required>

            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
                <label>Seleccione el día de pago:</label>
                <select type="int" name="dia_pago" class="form-control" required>
                    <option value="" selected="selected"></option>
                    <option value="1">1</option> <option value="2">2</option> <option value="3">3</option> <option value="4">4</option> <option value="5">5</option>
                    <option value="6">6</option> <option value="7">7</option> <option value="8">8</option> <option value="8">9</option> <option value="8">10</option>
                    <option value="11">11</option> <option value="12">12</option> <option value="13">13</option> <option value="14">14</option> <option value="15">15</option>
                    <option value="16">16</option> <option value="17">17</option> <option value="18">18</option> <option value="19">19</option> <option value="20">20</option>
                    <option value="21">21</option> <option value="22">22</option> <option value="23">23</option> <option value="24">24</option> <option value="25">25</option>
                    <option value="26">26</option> <option value="27">27</option> <option value="28">28</option> <option value="29">29</option> <option value="30">30</option> <option value="31">31</option>
                </select>

            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12">
            <label>Seleccione tipo de usuario:</label>
            <select name="tipo" class="form-control" required>
                <?php while($rec = $resultado3->fetch_assoc() ) { ?>
                    <option value="<?php echo $rec['id_tipo_usuario']; ?>"><?php echo $rec['desc_tipo_usuario']; ?></option>
                <?php  } ?>
            </select>
            </div>
        </div>
    </form>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

