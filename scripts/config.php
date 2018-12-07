<?php
session_start();

/*error_reporting(E_ALL);
ini_set('display_errors', 'on');*/

define('BASE', '//' . $_SERVER['HTTP_HOST'] . '/');

$db = mysqli_connect("35.225.5.28", "sarx_user", "oBSH6d4RicpMR8Ja", "sarx_db");

if (!$db) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

mysqli_set_charset($db, 'utf8');


////CODIFICACION//

//$codifica1 = base64_encode($cadena);
//$decodifica2 = base64_decode($codifica1);

////// FUNCIONES PARA CALCULAR LOGROS
function muestralogros($id_usuario){
    global $db;

    if(!empty($id_usuario)){
        $sql = "SELECT * FROM logros where id_logro not in (select id_logro from logrosclientes where id_usuario = $id_usuario)";
        $res = mysqli_query($db, $sql);
        if($res){
            while($l = mysqli_feth_assoc($res)){
                $id_logro = $l["id_logro"];
                switch($id_logro){
                    case 1:
						echo "<div class=\"col-lg-4 col-sm-6 text-center mb-4\">
									<img src=\"../../img/".$l['imagen']."; ?>.png\" class=\"rounded-circle img-fluid d-block mx-auto\">
								  <h3>";

                        break;
                    case 2:
						echo "<div class=\"col-lg-4 col-sm-6 text-center mb-4\">
									<img src=\"../../img/".$l['imagen'].".png\" class=\"rounded-circle img-fluid d-block mx-auto\">
								  <h3>";
    
                        break;
                    case 3:
						echo "<div class=\"col-lg-4 col-sm-6 text-center mb-4\">
									<img src=\"../../img/".$l['imagen'].".png\" class=\"rounded-circle img-fluid d-block mx-auto\">
								  <h3>";
   
                        break;
                    case 4:
						echo "<div class=\"col-lg-4 col-sm-6 text-center mb-4\">
									<img src=\"../../img/".$l['imagen'].".png\" class=\"rounded-circle img-fluid d-block mx-auto\">
								  <h3>";
        
                        break;
                    case 5:
						echo "<div class=\"col-lg-4 col-sm-6 text-center mb-4\">
									<img src=\"../../img/".$l['imagen'].".png\" class=\"rounded-circle img-fluid d-block mx-auto\">
								  <h3>";
                    
                        break;
                    case 6:
						echo "<div class=\"col-lg-4 col-sm-6 text-center mb-4\">
									<img src=\"../../img/".$l['imagen'].".png\" class=\"rounded-circle img-fluid d-block mx-auto\">
								  <h3>";
                       
                        break;
                }
            }
        }
    }
}
////// FUNCIONES PARA CALCULAR LOGROS
//////////////////////////////////////////////////////////////////////////
function logros($id_usuario){
    global $db;

    if(!empty($id_usuario)){
        $sql = "SELECT * FROM logros where id_logro not in (select id_logro from logrosclientes where id_usuario = $id_usuario)";
        $res = mysqli_query($db, $sql);
        if($res){
            while($f = mysqli_feth_assoc($res)){
                $id_logro = $f["id_logro"];

                switch($id_logro){
                    case 1:
                        logro1($id_usuario);
                        break;
                    case 2:
                        logro2($id_usuario);
                        break;
                    case 3:
                        logro3($id_usuario);
                        break;
                    case 4:
                        logro4($id_usuario);
                        break;
                    case 5:
                        logro5($id_usuario);
                        break;
                    case 6:
                        logro6($id_usuario);
                        break;
                }
            }
        }
    }
}

function logro1($id_usuario){
    //logro; Asiste a 100 clases
    $id_logro = 1;
    global $db;
    $sql = "select count(id_asistencia) from asistencias where id_usuario = $id_usuario";
    $res = mysqli_query($db, $sql);
    if($res){
        $f = mysqli_fetch_array($res);
        $cantidad = $f[0];
        if($cantidad >= 100){
            $ins = "insert into logrosclientes (id_logrocliente, id_usuario, id_logro, fecha_creacion) values (null, $id_usuario, $id_logro, NOW())";
            $res = mysqli_query($db, $ins);
            if($res){
                return true;
            }
        }
    }

    return false;
}

function logro2($id_usuario){
    //logro; Asiste a 500 clases
    global $db;
    $id_logro = 2;
    $sql = "select count(id_asistencia) from asistencias where id_usuario = $id_usuario";
    $res = mysqli_query($db, $sql);
    if($res){
        $f = mysqli_fetch_array($res);
        $cantidad = $f[0];
        if($cantidad >= 500){
            $ins = "insert into logrosclientes (id_logrocliente, id_usuario, id_logro, fecha_creacion) values (null, $id_usuario, $id_logro, NOW())";
            $res = mysqli_query($db, $ins);
            if($res){
                return true;
            }
        }
    }

    return false;
}

function logro3($id_usuario){
    //logro: Registra 20 records de levantamiento de peso
    global $db;
    $id_logro = 3;
    $sql = "select count(id_record) from records where id_usuario = $id_usuario and id_tipo_record = 1";
    $res = mysqli_query($db, $sql);
    if($res){
        $f = mysqli_fetch_array($res);
        $cantidad = $f[0];
        if($cantidad >= 20){
            $ins = "insert into logrosclientes (id_logrocliente, id_usuario, id_logro, fecha_creacion) values (null, $id_usuario, $id_logro, NOW())";
            $res = mysqli_query($db, $ins);
            if($res){
                return true;
            }
        }
    }

    return false;
}

function logro4($id_usuario){
    //logro: Registra 20 records de tiempo
    global $db;
    $id_logro = 4;
    $sql = "select count(id_record) from records where id_usuario = $id_usuario and id_tipo_record = 3";
    $res = mysqli_query($db, $sql);
    if($res){
        $f = mysqli_fetch_array($res);
        $cantidad = $f[0];
        if($cantidad >= 20){
            $ins = "insert into logrosclientes (id_logrocliente, id_usuario, id_logro, fecha_creacion) values (null, $id_usuario, $id_logro, NOW())";
            $res = mysqli_query($db, $ins);
            if($res){
                return true;
            }
        }
    }

    return false;
}

function logro5($id_usuario){
    //logro: Registra 20 records de repeticiones
    global $db;
    $id_logro = 5;
    $sql = "select count(id_record) from records where id_usuario = $id_usuario and id_tipo_record = 2";
    $res = mysqli_query($db, $sql);
    if($res){
        $f = mysqli_fetch_array($res);
        $cantidad = $f[0];
        if($cantidad >= 20){
            $ins = "insert into logrosclientes (id_logrocliente, id_usuario, id_logro, fecha_creacion) values (null, $id_usuario, $id_logro, NOW())";
            $res = mysqli_query($db, $ins);
            if($res){
                return true;
            }
        }
    }

    return false;
}

function logro6($id_usuario){
    //logro: Sé miembro activo durante un año
    global $db;
    $id_logro = 6;
    $sql = "select fecha_creacion from usuarios where id_usuario = $id_usuario";
    $res = mysqli_query($db, $sql);
    if($res){
        $f = mysqli_fetch_array($res);
        $creacion = $f[0];
        if(!empty($creacion)) {

            $date1 = new DateTime($creacion);
            $date2 = new DateTime();

            $diferencia = $date2->diff($date1)->format("%a");

            if ($diferencia >= 365) {
                $ins = "insert into logrosclientes (id_logrocliente, id_usuario, id_logro, fecha_creacion) values (null, $id_usuario, $id_logro, NOW())";
                $res = mysqli_query($db, $ins);
                if ($res) {
                    return true;
                }
            }
        }
    }

    return false;
}

function fechaConDia($fecha){
	setlocale(LC_TIME, 'es_MX');
	return !empty($fecha) ? strftime("%A %e de %B de %Y",strtotime($fecha)) : '';
}

?>
