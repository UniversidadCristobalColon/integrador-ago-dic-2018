<?php
session_start();

define('BASE', '//' . $_SERVER['HTTP_HOST'] . '/int2/');

$db = mysqli_connect("35.225.5.28", "sarx_user", "oBSH6d4RicpMR8Ja", "sarx_db");

if (!$db) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>