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
            while($l = mysqli_fetch_assoc($res)){
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
            while($f = mysqli_fetch_assoc($res)){
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
            $creacion = substr($creacion,0,10);

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

//////////////////////////////////////////////

class rc4{
    var $sTempUN = "";
    var $sTempPW = "";
    var $sbox = array();
    var $KEY = array();
    var $sUser = "";
    var $sPassw = "";
    function RC4Initialize($strPwd){
        $tempSwap = 0;
        $i = 0;
        $b = 0;
        $intLength = 0;
        $intLength = strlen($strPwd);

        for($i = 0; $i <= 255; $i++){ // For a = 0 To 255
            $this->KEY[$i] = ord(substr($strPwd,$i%$intLength,1));
            $this->sbox[$i] = $i;
        }
        $b = 0;

        for($i = 0; $i <= 255; $i++){ // For a = 0 To 255
            $b = ($b + $this->sbox[$i] + $this->KEY[$i])%256;
            $tempSwap = $this->sbox[$i];
            $this->sbox[$i] = $this->sbox[$b];
            $this->sbox[$b] = $tempSwap;
        }
    }

    function Salaa($plaintxt, $key){
        $this->RC4Initialize($key);
        $temp = 0;
        $a = 0;
        $i = 0;
        $j = 0;
        $k;
        $cipherby = 0;
        $cipher = "";

        for($a = 0; $a < strlen($plaintxt); $a++){
            $i = ($i + 1)%256;
            $j = ($j + $this->sbox[$i])%256;
            $temp = $this->sbox[$i];
            $this->sbox[$i] = $this->sbox[$j];
            $this->sbox[$j] = $temp;
            $k = $this->sbox[($this->sbox[$i] + $this->sbox[$j])%256];
            $cipherby = ord(substr($plaintxt,$a,1)) ^ $k;
            $cipher = $cipher.chr($cipherby);
        }
        return $cipher;
    }

    function StringToHexString($b){
        $sb="";
        for($i = 0; $i < strlen($b); $i++){
            $tmpb = $b;
            $v = ord(substr($tmpb,$i,1)) & 0xFF;
            //print("V:".$v."<br>");
            if($v < 16){
                $sb = $sb.'0';
            }
            $sb = $sb.dechex($v);
            //print("<br>V:".$v);
            //print("<br>tmp:".substr($tmpb,$i,1));
            //print("<br>SB:".dechex($v));
        }
        return $sb;
    }

    // DES-ENCRIPTADO
    function HexStringToString($s){
        $Result = "";
        $len = strlen($s)/2;

        for($i=0; $i < $len; $i++){
            $index = $i * 2;
            //print("<br>v".intval(substr($s,$index,2),16));
            $v = intval(substr($s,$index,2),16);
            $Result = $Result.chr($v);
        }
        return $Result;
    }
    function Avain(){
    }
}

define("RC4_SALT", "b2c4299d3176df34fea9fd745eb2b0bc39480ac5");

$rc4 = new rc4();

function encript($str){
    global $rc4;
    return $rc4->StringToHexString($rc4->Salaa($str,RC4_SALT));
}

function decript($str){
    global $rc4;
    return $rc4->Salaa($rc4->HexStringToString($str),RC4_SALT);
}
?>
