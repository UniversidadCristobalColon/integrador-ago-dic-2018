<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');

define('BASE', '//' . $_SERVER['HTTP_HOST'] . '/');

$db = mysqli_connect("35.225.5.28", "sarx_user", "oBSH6d4RicpMR8Ja", "sarx_db");
//$db = mysqli_connect('localhost', 'root','root','sarx_db');

if (!$db) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

////CODIFICACION//

//$codifica1 = base64_encode($cadena);
//$decodifica2 = base64_decode($codifica1);


?>
